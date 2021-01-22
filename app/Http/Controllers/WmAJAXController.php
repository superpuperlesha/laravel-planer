<?php
namespace App\Http\Controllers;
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
}