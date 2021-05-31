<?php

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

Route::view('/', 'welcome');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::post('company/data-table-filter', [\App\Http\Controllers\CompanyController::class, 'dataTableFilter'])->name('company.dataTableFilter');
    Route::resource('company', \App\Http\Controllers\CompanyController::class);

    Route::get('employee', \App\Http\Controllers\DashboardController::class)->name('employee.index');
});