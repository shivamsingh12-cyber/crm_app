<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/login', [AdminController::class,'login'])->name('login');

Route::group(['middleware'=>'auth'],function(){

    Route::any('/home', [AdminController::class,'dashboard']);
    Route::any('/logout', [AdminController::class,'logout']);

    Route::group(["prefix"=>'leads'],function(){
        Route::any('/add-leads', [AdminController::class,'add_lead']);
        Route::any('/manage-leads', [AdminController::class,'manage_lead']);
        Route::any('/delete-lead/{id}', [AdminController::class,'delete_lead']);
        Route::any('/edit-lead/{id}', [AdminController::class,'edit_lead']);
        Route::any('/view-lead/{id}', [AdminController::class,'view_lead']);
        Route::any('/convert-lead/{id}', [AdminController::class,'convert_lead']);
    });

    Route::group(["prefix"=>'accounts'],function(){
        Route::any('/manage-accounts', [AdminController::class,'manage_accounts']);
        Route::any('/add-account', [AdminController::class,'add_account']);
        Route::any('/edit-account/{id}', [AdminController::class,'edit_account']);
        Route::any('/delete-account/{id}', [AdminController::class,'delete_account']);
    });
    Route::group(["prefix"=>'deals'],function(){
        Route::any('/manage-deals', [AdminController::class,'manage_deals']);
    });
    Route::group(["prefix"=>'contacts'],function(){
        Route::any('/manage-contacts', [AdminController::class,'manage_contacts']);
         Route::any('/add-contact', [AdminController::class,'add_contact']);
         Route::any('/edit-contact/{id}', [AdminController::class,'edit_contact']);
         Route::any('/delete-contact/{id}', [AdminController::class,'delete_contact']);
    });
});
