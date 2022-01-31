<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ApplayController;
use App\Http\Controllers\CatogryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterEmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CompanyMiddleware;
use Illuminate\Support\Facades\Route;

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

//landing page controller route
Route::get('/',LandingPageController::class)->name('landingpage.index');
Route::get('/search/jobs',[SearchController::class,'__invoke'])->name('search.index');
//End landing page controller route

//job controller
Route::get('/job/{id}',[JobController::class,'show'])
->middleware('auth')
->name('job.show');
//end job controller

//catogry controller route
Route::get('/catogry/{id}/jobs',[CatogryController::class,'show'])->name('cat.show');
Route::get('/catogrys',[CatogryController::class,'index'])->name('cats');
//end catogry controller route

Auth::routes();

//register employee route
Route::get('/register/employee',[RegisterEmployeeController::class,'create'])
->name('employee.register.create');
Route::post('/register/employee',[RegisterEmployeeController::class,'store'])
->name('employee.register.store');
//end register employee route

// company controller route
  Route::group(['middleware' => ['auth:web','CompanyMiddleware']],function() {
    Route::get('/company/profile',[CompanyController::class,'profile'])->name('company.profile');
    Route::put('/company/profile',[CompanyController::class,'updateProfile'])->name('company.updateProfile');
    Route::post('/company/logo',[CompanyController::class,'logo'])->name('company.logo');
    Route::post('/company/CoverPhoto',[CompanyController::class,'coverPhoto'])->name('company.coverPhoto');
    Route::get('/company/CompanyJobs',[CompanyController::class,'CompanyJobs'])->name('company.CompanyJobs');
    Route::get('/company/JobsApplay',[CompanyController::class,'applayEmployee'])->name('company.JobsApplay');
    Route::get('/company/job/{id}',[CompanyController::class,'editJob'])->name('company.editJob');
    Route::put('/company/job/{id}',[CompanyController::class,'updateJob'])->name('company.updateJob');
    Route::get('/company/create/job',[CompanyController::class,'createJob'])->name('company.createJob');
    Route::post('/company/create/job',[CompanyController::class,'StoreJob'])->name('company.StoreJob');
    Route::delete('/company/job/delete/{id}',[CompanyController::class,'deleteJob'])->name('company.delteJob');
    Route::post('/company/Accept/job',[CompanyController::class,'AcceptEmployeeApplay'])->name('accept.emplyee.applay');
  });
//end company controller route


// employee controller route
Route::group(['middleware' => ['auth:web','EmployeeMiddleware']],function() {
  Route::get('/employee/profile',[EmployeeController::class,'profile'])->name('employee.profile');
  Route::put('/employee/profile',[EmployeeController::class,'updateProfile'])->name('employee.updateProfile');
  Route::post('/employee/image',[EmployeeController::class,'image'])->name('employee.image');
  Route::post('/employee/cv',[EmployeeController::class,'cv'])->name('employee.cv');
  Route::post('/employee/coverphoto',[EmployeeController::class,'coverPhoto'])->name('employee.coverphoto');
  Route::get('/employee/job/applay',[EmployeeController::class,'ApplayJobsEmployee'])->name('employee.jobapplay');
  Route::delete('/employee/delete/applay/{id}',[EmployeeController::class,'DeleteJobApplay'])->name('employee.deleteApplay');
  Route::get('/employee/job/Accept',[EmployeeController::class,'AcceptJobEmployee'])->name('employee.acceptjobemployee');
  Route::get('/download/{file}',[EmployeeController::class,'DownloadCv'])->name('employee.downloadcv');
});
  //end controller route

//about us , contact us controller route
Route::get('/aboutus',AboutUsController::class)->name('aboutus');
Route::get('/contactus',ContactUsController::class)->name('contactus');
//end about us , contact us controller route

//profiles of employee and comapny
Route::get('/profile/{id}',ProfileController::class)->name('profile');
//end profiles of employee and company


//Start Applay Job
Route::post('/Applay/Job',[ApplayController::class,'store'])
->middleware(['auth','EmployeeMiddleware'])
->name('applay.job');
//End Applay Job




