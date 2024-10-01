<?php
use App\Http\Controllers\AdminController;
Route::group(['middleware'=>'admin'],function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
});