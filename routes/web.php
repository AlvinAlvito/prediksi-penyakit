<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\BobotController;

// Halaman Index
Route::get('/', [DiagnosaController::class, 'form'])->name('index');
Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
Route::get('/hasil/{id}', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');


// Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');
// ===================
// Proses Login Manual
// ===================
Route::post('/', function (Request $request) {
    $username = $request->username;
    $password = $request->password;

    if ($username === 'admin' && $password === '123') {
        session(['is_admin' => true]);
        return redirect('/admin');
    }

    return back()->withErrors(['login' => 'Username atau Password salah!']);
})->name('login.proses');

// ===================
// Logout
// ===================
Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect('/');
})->name('logout');

// ===================
// Dashboard Admin
// ===================
Route::get('/admin', function () {
    if (!session('is_admin')) {
        return redirect('/');
    }
    return view('admin.index');
})->name('dashboard');

// ===================
// CRUD Penyakit
// ===================
Route::get('/admin/data-penyakit', function () {
    if (!session('is_admin')) return redirect('/');
    return app(PenyakitController::class)->index();
})->name('penyakit.index');

Route::post('/admin/data-penyakit', function (Request $request) {
    if (!session('is_admin')) return redirect('/');
    return app(PenyakitController::class)->store($request);
})->name('penyakit.store');

Route::delete('/admin/data-penyakit/{id}', function ($id) {
    if (!session('is_admin')) return redirect('/');
    return app(PenyakitController::class)->destroy($id);
})->name('penyakit.destroy');


// ===================
// CRUD Gejala
// ===================
Route::get('/admin/data-gejala', function () {
    if (!session('is_admin')) return redirect('/');
    return app(GejalaController::class)->index();
})->name('gejala.index');

Route::post('/admin/data-gejala', function (Request $request) {
    if (!session('is_admin')) return redirect('/');
    return app(GejalaController::class)->store($request);
})->name('gejala.store');

Route::delete('/admin/data-gejala/{id}', function ($id) {
    if (!session('is_admin')) return redirect('/');
    return app(GejalaController::class)->destroy($id);
})->name('gejala.destroy');

// ===================
// CRUD Bobot
// ===================
Route::get('/admin/data-bobot', function () {
    if (!session('is_admin')) return redirect('/');
    return app(BobotController::class)->index();
})->name('bobot.index');

Route::post('/admin/data-bobot', function (Request $request) {
    if (!session('is_admin')) return redirect('/');
    return app(BobotController::class)->store($request);
})->name('bobot.store');

Route::delete('/admin/data-bobot/{id}', function ($id) {
    if (!session('is_admin')) return redirect('/');
    return app(BobotController::class)->destroy($id);
})->name('bobot.destroy');

// ===================
// CRUD Diagnosa
// ===================
Route::get('/admin/data-diagnosa', function () {
    if (!session('is_admin')) return redirect('/');
    return app(DiagnosaController::class)->index();
})->name('admin.diagnosa.index');

Route::post('/admin/data-diagnosa', function (Request $request) {
    if (!session('is_admin')) return redirect('/');
    return app(DiagnosaController::class)->store($request);
})->name('admin.diagnosa.store');

Route::delete('/admin/data-diagnosa/{id}', function ($id) {
    if (!session('is_admin')) return redirect('/');
    return app(DiagnosaController::class)->destroy($id);
})->name('admin.diagnosa.destroy');

Route::get('/admin/data-diagnosa/{id}/edit', function ($id) {
    if (!session('is_admin')) return redirect('/');
    return app(DiagnosaController::class)->edit($id);
})->name('admin.diagnosa.edit');

Route::put('/admin/data-diagnosa/{id}', function (Request $request, $id) {
    if (!session('is_admin')) return redirect('/');
    return app(DiagnosaController::class)->update($request, $id);
})->name('admin.diagnosa.update');


