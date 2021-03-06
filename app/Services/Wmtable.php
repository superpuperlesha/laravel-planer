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

    public static function userOrder($userArr){
        $i=0;
	    foreach($userArr as $userID){
            $i++;
            DB::table('users')->where('usr_id', $userID)->update(['usr_order'=>$i]);
        }
    }

    public static function getlogs(){
        return DB::table('users_log')
            ->select('users_log.*', 'u1.usr_first_name as usr_srs_fname', 'u1.usr_last_name as usr_srs_lname', 'u2.usr_first_name as usr_dest_fname', 'u2.usr_last_name as usr_dest_lname')
            ->leftJoin('users as u1', 'log_usr_src',  '=', 'u1.usr_id')
            ->leftJoin('users as u2', 'log_usr_desr', '=', 'u2.usr_id')
            ->limit(200)
            ->orderByDesc('log_id')
            ->get();
    }

    public static function setlogs($usrSrc, $usrDest, $title, $content){
        return DB::table('users_log')->insert([ ['log_usr_src'=>$usrSrc, 'log_usr_desr'=>$usrDest, 'log_title'=>$title, 'log_content'=>$content] ]);
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

    public static function saveCellDay($usrID, $cDate, $tasksArr, $hoursArr){
	    if(is_array($tasksArr)) {
            $user = self::getUserInfo($usrID);
            if (strlen($user->usr_work) > 1) {
                $ttarr = unserialize($user->usr_work);
            } else {
                $ttarr = [];
            }

            for ($i = 0; $i < count($tasksArr); $i++) {
                if (isset($ttarr[$cDate][$tasksArr[$i]])) {
                    $taskList[] = self::getTaskName($tasksArr[$i]) . ' (from: ' . $ttarr[$cDate][$tasksArr[$i]] . 'h to ' . $hoursArr[$i] . 'h)';
                    if ($hoursArr[$i] == 0) {
                        unset($ttarr[$cDate][$tasksArr[$i]]);
                    } else {
                        $ttarr[$cDate][$tasksArr[$i]] = $hoursArr[$i];
                    }
                }
            }
            ksort($ttarr);
            DB::table('users')->where('usr_id', $usrID)->update(['usr_work' => serialize($ttarr)]);

            $taskList = implode('<br/>', $taskList);
            $t = 'Set plan to day';
            $c = '<span class="text-warning font-weight-bold">Name: </span>' . $user->usr_first_name . ' ' . $user->usr_last_name . '<br/><span class="text-warning font-weight-bold">Email: </span>' . $user->usr_email . '<br/> <span class="text-warning font-weight-bold">Cell date:</span> ' . date('d.m.Y', $cDate) . ' <br/><span class="text-warning font-weight-bold">Task list:</span><br/> ' . $taskList;
            //WM_LOG(get_current_user_id(), $usrID, $t, $c);
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
				$res.='<table class="table table-hover" id="tt_user_cell_taskhours">
						<tr>
							<th class="text-center">Task name</th>
							<th class="text-center">Hours</th>
							<th class="text-center">Delete</th>
						</tr>';
				foreach($ttarr[$date] as $taskkey=>$task){
					$res.='<tr>
							<td>'.self::getTaskName($taskkey).'</td>
							<td class="text-center"><input type="number" min="0" max="24" step="1" value="'.(int)$task.'" class="tt_user_cell_taskhours_list" data-taskid="'.(int)$taskkey.'"></td>
							<td class="text-center"><i class="fa fa-times text-danger tt_cell_action_del" data-cell-user="'.$userid.'" data-cell-date="'.$date.'" data-cell-taskid="'.$taskkey.'"></i></td>
						</tr>';
				}
				$res .='</table>
                        <input type="hidden" id="tt_user_cell_taskhours_usrid" value="'.$userid.'">
			            <input type="hidden" id="tt_user_cell_taskhours_cdate" value="'.$dc_date.'">';
			//}
		}
		return $res;
	}

	public static function getUsers($orderField='usr_order'){
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


    static function getUserInfo($user_id){
        $res = DB::table('users')->where('usr_id', '=', $user_id)->get();
        return $res[0];
    }


    static function setUserInfo($user_id, $user_fname, $user_lname, $user_email, $user_posid){
        DB::table('users')->where('usr_id', $user_id)->update(['usr_first_name'=>$user_fname, 'usr_last_name'=>$user_lname, 'usr_email'=>$user_email, 'usr_pos_id'=>$user_posid]);
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

		$users = DB::table('users')->where('usr_id', '=', $_POST['userid'])->get();
		if(isset($users[0]->usr_id) && $users[0]->usr_id==$_POST['userid']){
            if(!$_POST['stfromto']){
                $_POST['stfromto'] = date('d.m.Y').'-'.date('d.m.Y');
            }
            if(!substr_count($_POST['stfromto'], '-')){
                $_POST['stfromto'] .= '-'.$_POST['stfromto'];
            }

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

            self::setlogs(1, $_POST['userid'], 'Set plan to: '.$users[0]->usr_first_name.' '.$users[0]->usr_last_name, '<span class="text-warning font-weight-bold">Planned:</span> '.$_POST['stfromto'].'<br/>'.'<span class="text-warning font-weight-bold">Task:</span> '.self::getTaskName($_POST['taskid']).'('.$_POST['dayplan'].'h)' );
			return view('ajaxtable');
		}else{
			echo'User not faund! ['.$_POST['userid'].']';
		}
	}

}
