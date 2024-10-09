<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
// route user
// route user
Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);          // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      // menampilkan data user dalam json untuk datables
    Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); //Menampilkan halaman form tambah
    Route::post('/ajax', [UserController::class, 'store_ajax']);  // Menyimpan data user baru ajax
    Route::put('/{id}', [UserController::class, 'show']);     // menyimpan perubahan data user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
//route level
Route::group(['prefix' =>'level'],function(){
Route::get('/',[LevelController::class,'index']);
Route::post('/list',[LevelController::class, 'list']);
Route::get('/create',[LevelController::class,'create']);
Route::post('/',[LevelController::class,'store']);
Route::get('/{id}',[LevelController::class,'show']);
Route::get('/{id}/edit',[LevelController::class,'edit']);
Route::put('/{id}',[LevelController::class,'update']);
Route::delete('/{id}',[LevelController::class,'destroy']);
});
//route kategori
// Route::group(['prefix' =>'kategori'],function(){
// Route::get('/',[KategorisController::class,'index']);
// Route::post('/list',[KategorisController::class, 'list']);
// Route::get('/create',[KategorisController::class,'create']);
// Route::post('/',[KategorisController::class,'store']);
// Route::get('/{id}',[KategorisController::class,'show']);
// Route::get('/{id}/edit',[KategorisController::class,'edit']);
// Route::put('/{id}',[KategorisController::class,'update']);
// Route::delete('/{id}',[KategorisController::class,'destroy']);
// });
// // //route barang
// Route::group(['prefix' =>'barang'],function(){
// Route::get('/',[BarangController::class,'index']);
// Route::post('/list',[BarangController::class, 'list']);
// Route::get('/create',[BarangController::class,'create']);
// Route::post('/',[BarangController::class,'store']);
// Route::get('/{id}',[BarangController::class,'show']);
// Route::get('/{id}/edit',[BarangController::class,'edit']);
// Route::put('/{id}',[BarangController::class,'update']);
// Route::delete('/{id}',[BarangController::class,'destroy']);
// });
// // //route supplier
// Route::group(['prefix' =>'supplier'],function(){
// Route::get('/',[SupplierController::class,'index']);
// Route::post('/list',[SupplierController::class, 'list']);
// Route::get('/create',[SupplierController::class,'create']);
// Route::post('/',[SupplierController::class,'store']);
// Route::get('/{id}',[SupplierController::class,'show']);
// Route::get('/{id}/edit',[SupplierController::class,'edit']);
// Route::put('/{id}',[SupplierController::class,'update']);
// Route::delete('/{id}',[SupplierController::class,'destroy']);
// });