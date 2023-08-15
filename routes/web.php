<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/MyCourse', function () {
    return view('welcome');
})->name('welcome');

Route::get('/MyCourse/lembagas', [MyCourseController::class,'lembagaHome'])->name('lembagas.home');
Route::get('/MyCourse/lembagas/create', [MyCourseController::class,'lembagaCreate'])->name('lembagas.create');
Route::post('/MyCourse/lembagas', [MyCourseController::class,'lembagaStore'])->name('lembagas.store');
Route::get('/MyCourse/lembagas/{lembaga}', [MyCourseController::class,'lembagaShow'])->name('lembagas.show');

Route::post('/MyCourse/lembagas/komentar', [MyCourseController::class,'komentarStore'])->name('komentars.store');


Route::get('/MyCourse/customers/create', [MyCourseController::class,'customersCreate'])->name('customers.create');
Route::post('/MyCourse/lembagas/customer', [MyCourseController::class,'customersStore'])->name('customers.store');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admins', [HomeController::class, 'Adm'])->name('admins');
Route::get('admins/lembaga', [HomeController::class, 'AdminLembaga'])->name('admins.lembaga');
Route::get('admins/customer', [HomeController::class, 'AdminCustomer'])->name('admins.customer');
Route::get('admins/customer/detail/{customer}', [HomeController::class, 'AdminCustomerDetail'])->name('admins.customerDetails');
Route::get('admins/lembaga/detail/{lembaga}', [HomeController::class, 'AdminLembagaDetail'])->name('admins.lembagaDetails');

Route::get('/approve/{id}', [HomeController::class, 'approve'])->name('admins.approve');
Route::get('/decline/{id}', [HomeController::class, 'decline'])->name('admins.decline');

Route::get('/check/{id}', [HomeController::class, 'checked'])->name('admins.checked');
