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

	public function ajaxRequestForm1(Request $request){
		return Wmtable::startaddnewtask();
    }

	public function ajaxRequestSetplan(Request $request){
		return Wmtable::startplannedtime();
    }

	public function ajaxRequestCellinfo(Request $request){
		return Wmtable::startCellInfo();
    }

	public function ajaxRequestDellTask(Request $request){
		return Wmtable::startdeltask();
    }

    public function ajaxRequestAdminUsers(Request $request){
        $users = new Wmtable();
        $users = $users::getUsers('usr_order');
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

        $users = new Wmtable();
        $users = $users::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }

    public function ajaxRequestAdminUserDel(Request $request){
        $request->validate([
            'iserID'=>'required|integer',
        ]);

        Wmtable::delUser($request->iserID);
        $users = new Wmtable();
        $users = $users::getUsers('usr_order');
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

        $user = Wmtable::setUserInfo($request->user_id, $request->user_fname, $request->user_lname, $request->user_email, $request->user_posid);
        $users = new Wmtable();
        $users = $users::getUsers('usr_order');
        return view('ajaxusers', ['users'=>$users]);
    }



}
