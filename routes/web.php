<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roomcontroller;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\TypeModel;
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
Route::get("/", function(){
    $dataType = TypeModel::all();
        return view("front.pages.index")->with(["type" => $dataType]);
});
Route::get("/contact", function(){
    return view("front.pages.contact");
});
Route::resource('/room', Roomcontroller::class);
Route::post('/transaction/room',[TransactionController::class, "CreateTransaction"])->name("transaction.create");
Route::get('/transaction/validasi/{id}/{UID}',[TransactionController::class, "validasi"])->name("transaction.validasi");
Route::put('/transaction/validasi/{id}/upload',[TransactionController::class, "uploadvalidasi"])->name("transaction.uploadpic");

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/', AdminController::class);
    Route::resource('/type', TypeController::class);
    Route::resource('/room', AdminRoomController::class);
    Route::get('/transaction', [TransactionController::Class,"index"])->name("transaction.index");
    Route::delete('/transaction/{id}', [TransactionController::Class,"destroy"])->name("transaction.destroy");
    Route::get('/transaction/{id}/edit', [TransactionController::Class,"edit"])->name("transaction.edit");
    Route::put('/transaction/{id}', [TransactionController::Class,"update"])->name("transaction.update");
    Route::get("/transaction/changeStatus/{id}/{status}",[TransactionController::class, "changeStatus"])->name("transaction.changeStatus");
    Route::get("/room/changeStatus/{id}/{status}",[AdminRoomController::class, "changeStatus"])->name("room.changeStatus");
    Route::get("/auth/logout",[AdminController::class, "logout"])->name("auth.logout");
});
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

