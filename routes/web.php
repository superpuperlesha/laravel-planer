<?php
use Illuminate\Support\Facades\Route;
use App\Services\Wmtable;
use App\Http\Controllers\WmAJAXController;

Route::get('/', function () {
	$Wmtable = new Wmtable();
    return view('maintable', ['Wmtable'=>$Wmtable]);
});

Route::post('ajaxRequest.table',        [WmAJAXController::class, 'ajaxRequestTable']);
Route::post('ajaxRequest.form1',        [WmAJAXController::class, 'ajaxRequestForm1']);
Route::post('ajaxRequest.setplan',      [WmAJAXController::class, 'ajaxRequestSetplan']);
Route::post('ajaxRequest.cellinfo',     [WmAJAXController::class, 'ajaxRequestCellinfo']);
Route::post('ajaxRequest.deltask',      [WmAJAXController::class, 'ajaxRequestDellTask']);
Route::post('ajaxRequest.admusers',     [WmAJAXController::class, 'ajaxRequestAdminUsers']);
Route::post('ajaxRequest.admuseradd',   [WmAJAXController::class, 'ajaxRequestAdminUserAdd']);
Route::post('ajaxRequest.admuserdel',   [WmAJAXController::class, 'ajaxRequestAdminUserDel']);
Route::post('ajaxRequest.admusergedit', [WmAJAXController::class, 'ajaxRequestAdminUserGetEdit']);
Route::post('ajaxRequest.admusersedit', [WmAJAXController::class, 'ajaxRequestAdminUserSaveEdit']);

Route::get('/register',   'Auth\AuthController@register')->name('register');
Route::post('/register',  'Auth\AuthController@storeUser');
Route::get('/login',      'Auth\AuthController@login')->name('login');
Route::post('/login',     'Auth\AuthController@authenticate');
Route::get('logout',      'Auth\AuthController@logout')->name('logout');
Route::get('/home',       'Auth\AuthController@home')->name('home');


