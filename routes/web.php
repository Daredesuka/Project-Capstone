<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HistoryReportController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UsersController;
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



// Auth::routes();
Route::get('/', [DashboardController::class, 'welcome']);

Route::get('user/home', [FrontendController::class, 'home'])->name('user_home');
Route::get('user/report/add', [FrontendController::class, 'add_report'])->name('add_report');
Route::post('user/report/save', [FrontendController::class, 'save_report'])->name('save_report');
Route::get('user/report', [FrontendController::class, 'report'])->name('report');
Route::get('user/report/detail/{id}', [FrontendController::class, 'detail_report'])->name('detail_report');

Route::get('admin/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logoutt');
Route::group(['middleware' => ['auth', 'checkRole:1'], 'prefix' => 'admin'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UsersController::class);
    Route::get('users/delete/{id}', [UsersController::class, 'destroy']);
    Route::get('users/edit/{id}', [UsersController::class, 'edit']);
    Route::post('users/update/{id}', [UsersController::class, 'update']);
    Route::delete('users/selected-users', [UsersController::class, 'deleteCheckedStudents'])->name('users.deleteSelected');
    Route::resource('reports', ReportController::class);
    Route::get('reports/delete/{id}', [ReportController::class, 'destroy']);
    Route::get('reports/{id}', [ReportController::class, 'detail']);
    Route::get('reports/show/{id}', [ResponseController::class, 'show']);
    Route::post('reports/save/{id}', [ResponseController::class, 'save']);
    Route::delete('reports/selected-reports', [ReportController::class, 'deleteCheckedStudents'])->name('reports.deleteSelected');

    Route::get('hreport/day', [HistoryReportController::class, 'day']);
    Route::get('hreport/day/search', [HistoryReportController::class, 'day_search']);
    Route::get('hreport/day/cetakpdf', [HistoryReportController::class, 'day_pdf']);
});

Route::group(['middleware' => ['auth', 'checkRole:1,2'], 'prefix' => 'admin'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('reports', ReportController::class);
    Route::get('reports/{id}', [ReportController::class, 'detail']);
    Route::get('reports/show/{id}', [ResponseController::class, 'show']);
    Route::post('reports/save/{id}', [ResponseController::class, 'save']);
});
Route::get('/home', 'HomeController@index')->name('home');