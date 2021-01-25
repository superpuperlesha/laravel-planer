<?php
namespace App\Services;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Wmtable{
	public $fromto;
	public $from;
	public $to;
	public $periodls;
	public $sopt_huurs_day;

	function __construct(){
		$this->fromto = $this->getMyFromTo();
		$this->sopt_huurs_day = $this->sopt_huurs_day();
		list($this->from, $this->to, $this->periodls) = $this->getFromTo($this->fromto);
	}

	public static function startdeltask(){
		$_POST['userid']  = $_POST['userid']  ?? 0;
		$_POST['dc_date'] = $_POST['dc_date'] ?? time();
		$_POST['taskid']  = $_POST['taskid']  ?? 0;
		$users = DB::table('users')->select('usr_id', 'usr_work')->where('usr_id', '=', $_POST['userid'])->get();

		if(isset($users[0]->usr_id) && $users[0]->usr_id==$_POST['userid']){
			if(strlen($users[0]->usr_work)>1){
				$ttarr = unserialize($users[0]->usr_work);
			}else{
				$ttarr = [];
			}

			//===delete task===
			if( isset($ttarr[$_POST['dc_date']][$_POST['taskid']]) ){
				unset($ttarr[$_POST['dc_date']][$_POST['taskid']]);
			}
			ksort($ttarr);
			DB::table('users')->where('usr_id', $_POST['userid'])->update(['usr_work'=>serialize($ttarr)]);
			return self::getCellData($_POST['dc_date'], $_POST['userid']);
		}else{
			return '<h6>User not faund! ['.$_POST['userid'].']</h6>';
		}
	}

	public static function startCellInfo(){
		$_POST['userid']  = $_POST['userid']  ?? 0;
		$_POST['dc_date'] = $_POST['dc_date'] ?? time();

		$users = DB::table('users')->select('usr_id', 'usr_work')->where('usr_id', '=', $_POST['userid'])->get();

		if(isset($users[0]->usr_id) && $users[0]->usr_id==$_POST['userid']){
			return self::getCellData($_POST['dc_date'], $_POST['userid']);
		}else{
			return '<h6>User not faund! ['.$_POST['userid'].']</h6>';
		}
	}

	//===FILTER TABLE - CELL with task list===
	public static function getCellData($dc_date, $userid){
		$res='';
		$users = DB::table('users')->select('usr_id', 'usr_work')->where('usr_id', '=', $userid)->get();
		list($from, $to, $periodls) = self::getFromTo(date('d.m.Y', $dc_date).'-'.date('d.m.Y', $dc_date));

		if(strlen($users[0]->usr_work)>1){
			$ttarr = unserialize($users[0]->usr_work);
		}else{
			$ttarr = [];
		}

		foreach($periodls as $date){
			//if(!eslf::isWeekend(date('N', $date))){
				$res.='<table class="table table-hover">
						<tr>
							<th class="text-center">Task name</th>
							<th class="text-center">Hours</th>
							<th class="text-center">Delete</th>
						</tr>';
				foreach($ttarr[$date] as $taskkey=>$task){
					$res.='<tr>
							<td>'.self::getTaskName($taskkey).'</td>
							<td class="text-center">'.$task.'</td>
							<td class="text-center"><i class="fa fa-times text-danger tt_cell_action_del" data-cell-user="'.$userid.'" data-cell-date="'.$date.'" data-cell-taskid="'.$taskkey.'"></i></td>
						</tr>';
				}
				$res.='</table>';
			//}
		}
		return $res;
	}

	public static function getUsers($orderField='usr_first_name'){
		return DB::table('users')->where('usr_role_id', 2)->orderBy($orderField, 'asc')->leftJoin('users_positions', 'users.usr_pos_id', '=', 'users_positions.pos_id')->get();
    }

	public static function getTasks(){
		return DB::table('usr_tasks')->orderBy('task_name')->get();
    }

    public static function getPositions(){
        return DB::table('users_positions')->orderBy('pos_name')->get();
    }

    public static function delUser($userID){
        DB::table('users')->where('usr_id', '=', $userID)->delete();
        return true;
    }

	public static function createTask(){
		$_POST['taskname'] = $_POST['taskname'] ?? '';
		$res['txt']='';
		$res['txttl']='';
		$res['err']=0;
		if(strlen($_POST['taskname'])>3){
			DB::table('usr_tasks')->insert(['task_name'=>$_POST['taskname']]);
			$res['txt']='<h6>Task added! <i class="fa fa-check text-success" aria-hidden="true"></i></h6>';
			//$res['txttl']=View::make('tasks')->render();
		}else{
			$res['txt']='<h6>Task name cannot be less than 3 characters! <i class="fa fa-check text-danger" aria-hidden="true"></i></h6>';
		}
		$res['err']=0;
		return json_encode($res);
    }

	public static function setMyFromTo($fromTo){
		DB::table('users')->where('usr_id', 1)->update(['usr_fromto'=>$fromTo]);
    }

	static function getMyFromTo(){
		$fromto = $_POST['fromto'] ?? '';
		if(!$fromto){
			$fromto = DB::table('users')->where('usr_id', 1)->value('usr_fromto');
			if(!$fromto){
				$fromto = '01.'.date('m.Y').'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')).'.'.date('m.Y');
			}
		}
		self::setMyFromTo($fromto);
		return $fromto;
	}

	public static function getTaskName($taskkey){
		$task = DB::table('usr_tasks')->select('task_name')->where('task_id', $taskkey)->get();
		return $task[0]->task_name ?? 'Task not faund.';
    }

	public static function getCellDataSimple($periodls){
		$res=[0=>'', 1=>''];
		foreach($periodls as $taskkey=>$task){
			if($task>0){
				$res[0].='<div class=\'text-left\'><b>'.self::getTaskName($taskkey).'</b>&nbsp;:&nbsp;'.$task.'h;<br/></div>';
				$res[1] = ($res[1] ?$res[1].'/'.$task :$task);
			}
		}
		return $res;
	}

	public static function checkPlanFeatures($arrDatePlan){
		$res = true;
		if(!is_array($arrDatePlan)){$arrDatePlan=[];}

		$today = strtotime(date('Y-m-d', time()));
		$hpd = 8;
		foreach($arrDatePlan as $arrDatePlanIKey=>$arrDatePlanI){
			if($arrDatePlanIKey >= $today){
				if( array_sum($arrDatePlanI) > $hpd ){
					return false;
				}
			}
		}
		return $res;
	}

	static function getFromTo($fromto){
		$fromto = explode('-', $fromto);

		$from   = explode('.', $fromto[0]);
		$from   = strtotime($from[2].'-'.$from[1].'-'.$from[0]);

		$to     = explode('.', $fromto[1]);
		$to     = strtotime($to[2].'-'.$to[1].'-'.$to[0]);

		$tmp = new \DateTime(date('Y-m-d', $to));
		$tmp = $tmp->modify('+1 day');
		$period = new \DatePeriod(
			new \DateTime(date('Y-m-d', $from)),
			new \DateInterval('P1D'),
			$tmp
		);
		$periodls = [];
		foreach($period as $key=>$value){
			$periodls[] = $value->getTimestamp();
		}

		return [0=>$from, 1=>$to, 2=>$periodls];
	}

	static function isWeekend($weekday){
		//return((int)$weekday >= (int)get_field('sopt_days_week', 'option')+1 ?true :false);
		return((int)$weekday > 6 ?true :false);
	}


	static function sopt_huurs_day(){
		$res = DB::table('option')->select('o_val')->where('o_name', 'sopt_huurs_day')->limit(1)->get();
		return $res[0]->o_val;
	}


	static function startaddnewtask(){
		$res=['err'=>0, 'txt'=>''];
		$_POST['taskname']  = $_POST['taskname']  ?? '';
		$_POST['taskname'] = htmlspecialchars(strip_tags($_POST['taskname']));

		if(strlen($_POST['taskname'])>3){
			DB::table('usr_tasks')->insertOrIgnore(['task_name'=>$_POST['taskname']]);
			$res['txt']='<h6>Task added! <i class="fa fa-check text-success" aria-hidden="true"></i></h6>';
			$res['err']=0;
		}else{
			$res['txt']='<h6>Task name > 3 chars! <i class="fa fa-ban text-danger" aria-hidden="true"></i></h6>';
			$res['err']=1;
		}
		echo json_encode($res);
	}



	static function startplannedtime(){
		$_POST['userid'] = (int)$_POST['userid'] ?? 0;

		$users = DB::table('users')->select('usr_id', 'usr_work')->where('usr_id', '=', $_POST['userid'])->get();
		if(isset($users[0]->usr_id) && $users[0]->usr_id==$_POST['userid']){
			list($from, $to, $periodls) = self::getFromTo($_POST['stfromto']);
			if(strlen($users[0]->usr_work)>1){
				$ttarr = unserialize($users[0]->usr_work);
			}else{
				$ttarr = [];
			}


			foreach($periodls as $value){
				if(!self::isWeekend(date('N', $value))){
					if($_POST['dayplan']>0){
						$ttarr[$value][$_POST['taskid']] = $_POST['dayplan'];
					}else{
						unset($ttarr[$value][$_POST['taskid']]);
					}
				};
			}

			ksort($ttarr);
			DB::table('users')->where('usr_id', $_POST['userid'])->update(['usr_work'=>serialize($ttarr)]);
			return view('ajaxtable');
		}else{
			echo'User not faund! ['.$_POST['userid'].']';
		}
	}

}
