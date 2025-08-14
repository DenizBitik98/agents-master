<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AgentController;
use \App\Http\Controllers\SaleRailwayController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\OrdersController;
use \App\Http\Controllers\BalanceController;
use \App\Http\Controllers\TicketController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RailwayRoutesController;
use App\Http\Controllers\StationAliasController;
use App\Http\Controllers\ManualReturnController;
use App\Http\Controllers\ExporttoFtpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('searchTrain'));
});

Route::any('agents',[AgentController::class, 'list'])->name('agents');
/*Route::any('agents/list', [AgentController::class, 'list'])->name('agentsList');*/
Route::get('agents/create',[AgentController::class, 'create']);
Route::get('agents/edit',[AgentController::class, 'edit']);
Route::post('agents/save',[AgentController::class, 'store']);
Route::get('agents/blockAgent', [AgentController::class, 'blockAgent'])->name('blockAgent');
Route::get('agents/unBlockAgent', [AgentController::class, 'unBlockAgent'])->name('unBlockAgent');

Route::get('railway/searchStation',[SaleRailwayController::class, 'searchStation'])->name('railwaySearch');
Route::get('railway/getStationsVersion',[SaleRailwayController::class, 'getStationsVersion'])->name('getStationsVersion');
Route::get('railway/getStations',[SaleRailwayController::class, 'getStations'])->name('getStations');
Route::get('railway/getStationsCount',[SaleRailwayController::class, 'getStationsCount'])->name('getStationsCount');

Route::any('railway/search60Result/{dcs}/{acs}',[SaleRailwayController::class, 'search60Result'])->name('search60Result');
Route::any('railway/searchResult/{id}',[SaleRailwayController::class, 'searchResult'])->name('searchResult');

Route::get('railway/searchTrain',[SaleRailwayController::class, 'searchTrain'])->name('searchTrain');
Route::get('railway/trainRoute',[SaleRailwayController::class, 'trainRoute'])->name('trainRoute');

Route::get('railway/searchTrainResult',[SaleRailwayController::class, 'searchTrainResult'])->name('searchTrainResult');
Route::get('railway/searchCarsResult',[SaleRailwayController::class, 'searchCarsResult'])->name('searchCarsResult');
Route::any('railway/buy',[SaleRailwayController::class, 'buy'])->name('railwaysBuy');
Route::any('railway/confirm',[SaleRailwayController::class, 'confirm'])->name('confirmReservation');
Route::post('railway/cancel',[SaleRailwayController::class, 'cancel'])->name('cancelReservation');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*Orders*/

Route::any('orders', [OrdersController::class, 'railwayOrders'])->name('orders');
Route::get('order/info', [OrdersController::class, 'ordersInfo'])->name('ordersInfo');
Route::any('order/get/tickets', [OrdersController::class, 'getTicketsForOrder'])->name('getTicketsForOrder');
Route::any('orders/export', [OrdersController::class, 'exportOrders'])->name('exportOrders');

/*Balance*/
Route::get('agent/balance', [BalanceController::class, 'agentBalanceListAdmin'])->name('agentBalance');
Route::any('agent/balance/transaction', [BalanceController::class, 'transaction'])->name('admin_agent_balance_process');
Route::any('agent/balance/agent', [BalanceController::class, 'agentBalanceList'])->name('agentBalanceList');

/*Ticket*/
Route::any('railway/ticket/html', [TicketController::class, 'html'])->name('ticketHtml');
Route::any('railway/ticket/pdf', [TicketController::class, 'pdf'])->name('ticketPdf');
Route::get('railway/ticket/passenger/pdf', [TicketController::class, 'passengerTicketsPdf'])->name('passengerTicketsPdf');
Route::any('railway/ticket/order/all', [TicketController::class, 'orderTicketsAll'])->name('orderTicketsAll');
Route::any('railway/ticket/order/pdf', [TicketController::class, 'orderTicketsPdf'])->name('orderTicketsPdf');
Route::any('railway/ticket/send/to/email', [TicketController::class, 'sendTicketsToEmail'])->name('sendTicketsToEmail');
Route::any('railway/ticket/rules', [TicketController::class, 'rules'])->name('rules');

/*Return*/
Route::get('returns', [OrdersController::class, 'returnsOrders'])->name('returnList');
Route::any('railway/ticket/return', [TicketController::class, 'return'])->name('ticketReturn')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::any('railway/ticket/return/confirm', [TicketController::class, 'returnConfirm'])->name('ticketReturnConfirm')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::any('railway/ticket/invoiceHtml', [TicketController::class, 'invoiceHtml'])->name('ticketInvoiceHtml');
Route::any('railway/ticket/invoicePdf', [TicketController::class, 'invoicePdf'])->name('ticketInvoicePdf');

/*user*/
Route::any('user/changePassword', [AgentController::class, 'changePassword'])->name('changePassword');
Route::post('user/changePasswordSave', [AgentController::class, 'changePasswordSave'])->name('changePasswordSave');
Route::any('user/changeSettings', [AgentController::class, 'changeSettings'])->name('changeSettings');
Route::any('user/changeSettings/save', [AgentController::class, 'changeSettingsSave'])->name('changeSettingsSave');

/*user list*/
Route::any('users/list', [UserController::class, 'list'])->name('userList');
Route::any('users/create', [UserController::class, 'create'])->name('userCreate');
Route::post('users/save', [UserController::class, 'store'])->name('userSave');
Route::get('users/edit', [UserController::class, 'edit'])->name('userEdit');
Route::post('users/edit/save', [UserController::class, 'saveEditUser'])->name('saveEditUser');
Route::get('users/blockUser', [UserController::class, 'blockUser'])->name('blockUser');
Route::get('users/unBlockUser', [UserController::class, 'unBlockUser'])->name('unBlockUser');
Route::get('users/changePassword', [UserController::class, 'changePasswordToUser'])->name('changePasswordToUser');
Route::post('users/changePasswordSave', [UserController::class, 'changePasswordToUserSave'])->name('changePasswordToUserSave');

/*user list*/
Route::any('profiles/list', [ProfilesController::class, 'list'])->name('profileList');
Route::any('profiles/create', [ProfilesController::class, 'create'])->name('profileCreate');
Route::any('profiles/store', [ProfilesController::class, 'store'])->name('profileSave');
Route::any('profiles/edit', [ProfilesController::class, 'edit'])->name('profileEdit');
Route::any('profiles/searchProfiles', [ProfilesController::class, 'searchProfiles'])->name('profileSearch');
Route::post('/profiles/search', [ProfilesController::class, 'searchProfilesNew'])->name('searchProfilesNew');


Route::get('/get/announsement', [\App\Http\Controllers\AnnouncementController::class, 'getAnnouncement'])->name('getAnnouncement');
Route::post('/create/announcement', [\App\Http\Controllers\AnnouncementController::class, 'createAnnoucement'])->name('create.announcement');
Route::get('/create/announcement', [\App\Http\Controllers\AnnouncementController::class, 'createView'])->name('create.announcement.view');
Route::put('/edit/{id}', [\App\Http\Controllers\AnnouncementController::class, 'edit'])->name('edit.announcement');
Route::delete('/delete/{id}', [\App\Http\Controllers\AnnouncementController::class, 'delete'])->name('delete.announcement');

/*send route pdf to email*/
Route::any('routePdf2/{id}/{dcs}/{acs}', [RailwayRoutesController::class, 'routePdf2'])->name('routePdf2');
Route::any('sendRailwayRoutesToEmail2/{id}/{dcs}/{acs}', [RailwayRoutesController::class, 'sendRailwayRoutesToEmail2'])->name('sendRailwayRoutesToEmail2');

Route::post('railway/route/pdf', [RailwayRoutesController::class, 'routePdf'])->name('routePdf');
Route::any('route/send/to/email', [RailwayRoutesController::class, 'sendRailwayRoutesToEmail'])->name('sendRailwayRoutesToEmail');


Route::get('/stations/stati3', StationAliasController::class .'@stati3')->name('stati3');
Route::get('/stations/station2', StationAliasController::class .'@station2')->name('station2');
Route::get('/stations/index', StationAliasController::class .'@index')->name('stations.index');
Route::get('/stations/create', StationAliasController::class . '@create')->name('stations.create');
Route::post('/stations/store', StationAliasController::class .'@store')->name('stations.store');
Route::get('/stations/{post}', StationAliasController::class .'@show')->name('stations.show');
Route::get('/stations/{post}/edit', StationAliasController::class .'@edit')->name('stations.edit');
Route::put('/stations/{post}', StationAliasController::class .'@update')->name('stations.update');
Route::delete('/stations/{post}', StationAliasController::class .'@destroy')->name('stations.destroy');

Route::any('/mreturns/update2', ManualReturnController::class .'@update2')->name('mreturns.update2');
Route::get('/mreturns/index', ManualReturnController::class .'@index')->name('mreturns.index');
Route::get('/mreturns/create', ManualReturnController::class . '@create')->name('mreturns.create');
Route::post('/mreturns/store', ManualReturnController::class .'@store')->name('mreturns.store');
Route::get('/mreturns/{post}', ManualReturnController::class .'@show')->name('mreturns.show');
Route::get('/mreturns/{post}/edit', ManualReturnController::class .'@edit')->name('mreturns.edit');
Route::put('/mreturns/{post}', ManualReturnController::class .'@update')->name('mreturns.update');
Route::delete('/mreturns/{post}', ManualReturnController::class .'@destroy')->name('mreturns.destroy');

Route::get('/exporttoftp/searchAgent', ExporttoFtpController::class .'@searchAgent')->name('searchAgent');
Route::get('/exporttoftp/index', ExporttoFtpController::class .'@index')->name('exporttoftp.index');
Route::get('/exporttoftp/create', ExporttoFtpController::class . '@create')->name('exporttoftp.create');
Route::post('/exporttoftp/store', ExporttoFtpController::class .'@store')->name('exporttoftp.store');
Route::get('/exporttoftp/{post}', ExporttoFtpController::class .'@show')->name('exporttoftp.show');
Route::get('/exporttoftp/{post}/edit', ExporttoFtpController::class .'@edit')->name('exporttoftp.edit');
Route::put('/exporttoftp/{post}', ExporttoFtpController::class .'@update')->name('exporttoftp.update');
Route::delete('/exporttoftp/{post}', ExporttoFtpController::class .'@destroy')->name('exporttoftp.destroy');

Route::get('/testBuy', [SaleRailwayController::class, 'testBuy'])->name('testBuy');
