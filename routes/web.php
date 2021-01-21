<?php
use Illuminate\Support\Facades\Route;
use App\Services\Wmtable;
use App\Http\Controllers\WmAJAXController;

Route::get('/', function () {
	$Wmtable = new Wmtable();
    return view('home', ['Wmtable'=>$Wmtable]);
});

Route::get('auth', function () {
	return view('auth');
});


Route::post('ajaxRequest.table',    [WmAJAXController::class, 'ajaxRequestTable']);
Route::post('ajaxRequest.form1',    [WmAJAXController::class, 'ajaxRequestForm1']);
Route::post('ajaxRequest.setplan',  [WmAJAXController::class, 'ajaxRequestSetplan']);
Route::post('ajaxRequest.cellinfo', [WmAJAXController::class, 'ajaxRequestCellinfo']); 
Route::post('ajaxRequest.deltask',  [WmAJAXController::class, 'ajaxRequestDellTask']); 
Route::post('ajaxRequest.admusers', [WmAJAXController::class, 'ajaxRequestAdminUsers']); 