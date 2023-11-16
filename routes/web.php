<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UnggulController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;

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
//     return view('dashboard');
// });
// Route::get('/about',function(){
//     return view('admin.about');
// })->name('about.index');

Route::get('/', [DashboardController::class, 'index']);




// Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
// Route::put('/about', [AboutController::class, 'update'])->name('about.update');
// Route::get('/about', [AboutController::class, 'show'])->name('about.show');

// Route::get('/blog/create',function(){
//     return view('admin.blogs.create');
// })->name('blog.create');
// Route::get('/blog/update',function(){
//     return view('admin.blog.update');
// })->name('blog.update');

// Route::get('/blog', [BlogController::class,'show']);

Route::resource('blogs', BlogController::class);
Route::resource('portofolios', PortofolioController::class);
Route::resource('fiturs', FiturController::class);
Route::resource('teams', TeamController::class);
Route::resource('prices', PriceController::class);
Route::resource('abouts', AboutController::class);
Route::resource('kategoris', KategoriController::class);
Route::resource('services', ServiceController::class);
Route::resource('ungguls', UnggulController::class);
Route::post('/upload-image', [AboutController::class, 'uploadImage'])->name('about.uploadImage');

// Route::get('/team', [TeamController::class, 'index'])->name('team.index');