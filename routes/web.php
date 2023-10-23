<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['guest'])->group(function () {
    Route::get("/", [AuthController::class,"index"])->name("login");
    Route::post("/", [AuthController::class,"auth"])->name("login-auth");

});

Route::middleware(['auth','role:admin|apoteker'])->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dahboard');

    //account setting
    Route::get('/akun', [DashboardController::class,'akun'])->name('akun-setting');
    Route::post('/akun', [DashboardController::class,'upload_foto'])->name('upload-foto');
    Route::post('/akun/update', [DashboardController::class,'update'])->name('update-akun');

    //CRUD obat
    Route::get('/obat', [ObatController::class, 'index'])->name('index-obat');
    Route::get('/dataobat', [ObatController::class, 'datatables'])->name('data-obat');
    Route::get('/obatbyid/{id}', [ObatController::class, 'get_dataobat_by_id'])->name('data-obat-byid');
    Route::post('/dataobat/create', [ObatController::class, 'create'])->name('create-obat');
    Route::post('/dataobat/update', [ObatController::class, 'update'])->name('update-obat');
    Route::post('/dataobat/delete', [ObatController::class, 'delete'])->name('delete-obat');

});


Route::middleware(['auth','role:admin'])->group(function () {
    //Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('index-pengguna');
    Route::get('/pengguna/role/{id}', [PenggunaController::class, 'role'])->name('role-pengguna');
    Route::post('/pengguna/role', [PenggunaController::class, 'give_permission'])->name('permission-pengguna');
    
});
Route::middleware(['auth'])->group(function () {
    //logout
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
    
});
