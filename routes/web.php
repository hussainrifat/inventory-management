<?php

use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user= user::all();
    return view('dashboard',compact("user"));
})->name('dashboard');

Route::get('/category/all',[categoryController::class,'viewCategory'])->name('all.category');

Route::Post('/category/add',[categoryController::class,'addCategory'])->name('store.category');
Route::get('/category/edit/{id}',[categoryController::class,'editCategory']);
Route::Post('/category/update/{id}',[categoryController::class,'updateCategory']);
Route::get('/category/edit/{id}',[categoryController::class,'editCategory']);
Route::get('/category/delete/{id}',[categoryController::class,'deleteCategory']);
Route::get('/category/restore/{id}',[categoryController::class,'restoreCategory']);
Route::get('/category/pdelete/{id}',[categoryController::class,'pdeleteCategory']);

