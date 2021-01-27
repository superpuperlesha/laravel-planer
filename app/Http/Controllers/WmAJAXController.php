<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Response;
use App\Services\Wmtable;

class WmAJAXController extends Controller{
	public function ajaxRequestTable(Request $request){
		return view('ajaxtable');
    }

    public function ajaxRequestAdminUserOrder(Request $request){
        Wmtable::userOrder($request->userArr);
    }

	public function ajaxRequestForm1(Request $request){
		return Wmtable::startaddnewtask();
    }

    public function ajaxRequestAdminUserViewLog(Request $request){
        $logs = Wmtable::getlogs();
        return view('ajaxlogs', ['logs'=>$logs]);
    }

	public function ajaxRequestSetplan(Request $request){
		return Wmtable::startplannedtime();
    }

	public function ajaxRequestCellinfo(Request $request){
		return Wmtable::startCellInfo();
    }

    public function ajaxRequestAdminUserSaveCellDay(Request $request){
        $usrID    = $request->usrID ?? 0;
        $cDate    = $request->cDate ?? time();
        $tasksArr = $request->tasksArr ?? [];
        $hoursArr = $request->hoursArr ?? [];
        $tasksArr = (array)$tasksArr;
        $hoursArr = (array)$hoursArr;

        Wmtable::saveCellDay($request->usrID, $request->cDate, $request->tasksArr, $request->hoursArr);

        return view('ajaxtable');
    }

	public function ajaxRequestDellTask(Request $request){
		return Wmtable::startdeltask();
    }

    public function ajaxRequestAdminUsers(Request $request){
        $users = Wmtable::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }

    public function ajaxRequestAdminUserAdd(Request $request){
        $request->validate([
            'tt_admin_aduser_fname'    => 'required|string|max:64',
            'tt_admin_aduser_lname'    => 'required|string|max:64',
            'tt_admin_aduser_email'    => 'string|email|max:64',
            'tt_admin_aduser_position' => 'required|integer',
        ]);

        User::create([
            'usr_first_name' => $request->tt_admin_aduser_fname,
            'usr_last_name'  => $request->tt_admin_aduser_lname,
            'usr_email'      => $request->tt_admin_aduser_email,
            'usr_pos_id'     => $request->tt_admin_aduser_position,
            'usr_work'       => '',
            'usr_role_id'    => 2,
        ]);

        $users = Wmtable::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }

    public function ajaxRequestAdminUserDel(Request $request){
        $request->validate([
            'iserID'=>'required|integer',
        ]);

        Wmtable::delUser($request->iserID);

        $users = Wmtable::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }

    public function ajaxRequestAdminUserGetEdit(Request $request){
        $request->validate([
            'iserID'=>'required|integer',
        ]);

        $user = Wmtable::getUserInfo($request->iserID);
        $positions = Wmtable::getPositions();
        return view('ajaxusergform', ['user'=>$user, 'positions'=>$positions]);
    }

    public function ajaxRequestAdminUserSaveEdit(Request $request){
        $request->validate([
            'user_id'=>'required|integer',
        ]);
        if(!$request->user_email){$request->user_email='';}
        Wmtable::setUserInfo($request->user_id, $request->user_fname, $request->user_lname, $request->user_email, $request->user_posid);

        $users = Wmtable::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }

}
