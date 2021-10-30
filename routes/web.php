<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageResizeController;

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

Route::get('/', function () {
    return view('welcome');
});

//Category routes
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
//Category Edit route
Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
//Update route
Route::post('/category/update/{id}',[CategoryController::class,'Update']);
//Softdelete route
Route::get('softdelete/category/{id}',[CategoryController::class,'Softdelete']);
//Restore deleted item route
Route::get('category/restore/{id}',[CategoryController::class,'Restore']);
//Permenantly delete category  item route
Route::get('pdelete/category/{id}',[CategoryController::class,'Pdelete']);

//Brand Route
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
//Brand add and store route
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
//Brand edit route
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
//Brand update route
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
//Brand delete route
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

 
Route::get('resizeImage', [ImageResizeController::class, 'resizeImage']);
Route::post('resizeImagePost', [ImageResizeController::class, 'resizeImagePost'])->name('resizeImagePost');







Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
     $users = DB::table('users')->get();
    /*  $users = User::all(); */
    return view('dashboard',compact('users'));
})->name('dashboard');
