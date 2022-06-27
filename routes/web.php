<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;

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
Route::get('/', function () { return view('auth.login'); });


Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register'])->name('register');

Route::get('password/forget',  function () { 
	return view('pages.forgot-password'); 
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');



	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	Route::get('/dashboard', function () { 
		return view('dashboard'); 
	})->name('dashboard');

	//only those have manage_user permission will get access
	
	Route::get('/users', [UserController::class,'index']);
	Route::get('/user/get-list', [UserController::class,'getUserList']);
		Route::get('/user/create', [UserController::class,'create']);
		Route::post('/user/create', [UserController::class,'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class,'edit']);
		Route::post('/user/update', [UserController::class,'update']);
		Route::get('/user/delete/{id}', [UserController::class,'delete']);


	//only those have manage_role permission will get access
	
		Route::get('/roles', [RolesController::class,'index']);
		Route::get('/role/get-list', [RolesController::class,'getRoleList']);
		Route::post('/role/create', [RolesController::class,'create']);
		Route::get('/role/edit/{id}', [RolesController::class,'edit']);
		Route::post('/role/update', [RolesController::class,'update']);
		Route::get('/role/delete/{id}', [RolesController::class,'delete']);



	//only those have manage_permission permission will get access
	
		Route::get('/permission', [PermissionController::class,'index']);
		Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class,'create']);
		Route::get('/permission/update', [PermissionController::class,'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);





	Route::get('/state', [App\Http\Controllers\State::class,'index']);
	Route::post('/state/create',[App\Http\Controllers\State::class,'create']);
	Route::get('state/get-list', [App\Http\Controllers\State::class,'getStateList']);
	Route::get('/state/edit/{id}', [App\Http\Controllers\State::class,'edit']);
	Route::post('/state/update', [App\Http\Controllers\State::class,'update']);
	Route::get('/state/delete/{id}', [App\Http\Controllers\State::class,'delete']);
	Route::get('/area', [App\Http\Controllers\AreaController::class,'index']);
	Route::post('/area/create',[App\Http\Controllers\AreaController::class,'create']);
	Route::get('/area/edit/{id}', [App\Http\Controllers\AreaController::class,'edit']);
	Route::post('/area/update', [App\Http\Controllers\AreaController::class,'update']);
	Route::get('/area/delete/{id}', [App\Http\Controllers\AreaController::class,'delete']);


	Route::get('/addunit', [App\Http\Controllers\UnitController::class,'index']);
//Route::get('/register', function () { return view('pages.register'); });
Route::post('/unit/create',[App\Http\Controllers\UnitController::class,'create']);
Route::get('/unit/edit/{id}', [App\Http\Controllers\UnitController::class,'edit']);
Route::post('/unit/update', [App\Http\Controllers\UnitController::class,'update']);
Route::get('/unit/delete/{id}', [App\Http\Controllers\UnitController::class,'delete']);
Route::get('/addjob', [App\Http\Controllers\JobController::class,'addjob']);
Route::post('/job/create',[App\Http\Controllers\JobController::class,'create']);
Route::get('/jobs', [App\Http\Controllers\JobController::class,'index']);
Route::get('job/get-list', [App\Http\Controllers\JobController::class,'getjoblist']);
Route::get('/job/edit/{id}', [App\Http\Controllers\JobController::class,'edit']);
Route::post('/job/update', [App\Http\Controllers\JobController::class,'update']);
Route::get('/job/delete/{id}', [App\Http\Controllers\JobController::class,'delete']);
Route::get('/qulification', [App\Http\Controllers\QulificationController::class,'index'])->name('qulification');
Route::get('qulification/create', [App\Http\Controllers\QulificationController::class,'create']);
Route::post('qulification/store', [App\Http\Controllers\QulificationController::class,'store']);
Route::get('qulification/edit/{id}', [App\Http\Controllers\QulificationController::class,'edit']);
Route::post('qulification/update', [App\Http\Controllers\QulificationController::class,'update']);
Route::get('/qlufication/delete/{id}', [App\Http\Controllers\QulificationController::class,'delete']);
Route::get('/degree', [App\Http\Controllers\DegreeControl::class,'index']);
Route::get('degree/create', [App\Http\Controllers\DegreeControl::class,'create']);
Route::post('degree/store', [App\Http\Controllers\DegreeControl::class,'store']);
Route::get('/degree/delete/{id}', [App\Http\Controllers\DegreeControl::class,'delete']);
Route::get('degree/edit/{id}', [App\Http\Controllers\DegreeControl::class,'edit']);
Route::post('degree/update', [App\Http\Controllers\DegreeControl::class,'update']);
Route::get('/currency', [App\Http\Controllers\CurrencyController::class,'index']);
Route::get('currency/create', [App\Http\Controllers\CurrencyController::class,'create']);
Route::post('currency/store', [App\Http\Controllers\CurrencyController::class,'store']);
Route::get('currency/edit/{id}', [App\Http\Controllers\CurrencyController::class,'edit']);
Route::post('currency/update', [App\Http\Controllers\CurrencyController::class,'update']);
Route::get('/currency/delete/{id}', [App\Http\Controllers\CurrencyController::class,'delete']);
Route::get('/experience', [App\Http\Controllers\ExperienceControll::class,'index']);
Route::get('experience/create', [App\Http\Controllers\ExperienceControll::class,'create']);
Route::post('experience/store', [App\Http\Controllers\ExperienceControll::class,'store']);
Route::get('experience/edit/{id}', [App\Http\Controllers\ExperienceControll::class,'edit']);
Route::post('experience/update', [App\Http\Controllers\ExperienceControll::class,'update']);
Route::get('/experience/delete/{id}', [App\Http\Controllers\ExperienceControll::class,'delete']);
Route::get('/language', [App\Http\Controllers\LanguageControll::class,'index']);
Route::get('language/create', [App\Http\Controllers\LanguageControll::class,'create']);
Route::post('language/store', [App\Http\Controllers\LanguageControll::class,'store']);
Route::get('language/edit/{id}', [App\Http\Controllers\LanguageControll::class,'edit']);
Route::post('language/update', [App\Http\Controllers\LanguageControll::class,'update']);
Route::get('/language/delete/{id}', [App\Http\Controllers\LanguageControll::class,'delete']);
Route::get('/salary', [App\Http\Controllers\SalaryControl::class,'index']);
Route::get('salary/create', [App\Http\Controllers\SalaryControl::class,'create']);
Route::post('salary/store', [App\Http\Controllers\SalaryControl::class,'store']);
Route::get('salary/get-list', [App\Http\Controllers\SalaryControl::class,'getSalary']);
Route::get('salary/edit/{id}', [App\Http\Controllers\SalaryControl::class,'edit']);




Route::get( '/language/{lang}',[App\Http\Controllers\LanguageController::class,'switchLang']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
