<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::post('user/login',[LoginController::class,'userlogin'])->name('user.login');
Route::get('user/logout',[LoginController::class,'logout'])->name('logout');
// Route::post('user/login',[CrudController::class,'userlogin'])->name('user.login');


Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/register',[AdminController::class,'registerform'])->name('register.form');
Route::post('admin/register',[AdminController::class,'saveregister'])->name('saveregister');
Route::get('admin/login',[AdminController::class,'login_form'])->name('login.form');
Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');
Route::group(['middleware'=>'admin'],function(){
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
});
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('create',[CrudController::class,'create'])->name('create');