    <?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index'])->middleware('auth');
Route::prefix('cart')->group(function (){
    Route::get('/',[CartController::class,'index'])->name('cart.list');
    Route::get('{id}/addToCart',[CartController::class,'addToCart'])->name('cart.add');
    Route::get('/update/{id}',[CartController::class,'updateQuantityProduct'])->name('cart.updateQuantity');
    Route::get('/update-cart',[CartController::class,'updateCart'])->name('cart.update');
    Route::get('delete',[CartController::class,'deleteCart'])->name('cart.delete');
});
Route::get('{id}/detail',[HomeController::class,'showDetail'])->name('showDetail');
require __DIR__.'/auth.php';
