<?php

use App\Actions\Brand\ListBrand;
use App\Actions\Carousel\GetCarousel;
use App\Actions\Category\ListCategory;
use App\Actions\DeleteMedia;
use App\Actions\Product\ListProduct;
use App\Actions\Product\ListProductsByCategory;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Models\Carousel;
use App\Models\Inbox;
use App\Models\ProductImage;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/lang/{locale}',function(string $locale){
    session()->forget('lang');
    session()->put('lang',$locale);
    return redirect()->back();
});

Route::group(['prefix' => ''], function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('shop', ShopController::class);
    Route::get('/show-cart/address', [OrderController::class, 'create'])->name('address');
    Route::resource('order', OrderController::class);
    Route::post('/contactUs/send', [InboxController::class,'store'])->name('send-comment');
    Route::post('/shop/send', [ShopController::class,'addComment'])->name('add-review');
    Route::get('/contactUs',function(){
        $categories = ListCategory::execute();
        return view('support.contact',compact('categories'));
    });
});


Route::post('/shop/', [ShopController::class, 'filter'])->name('filter.products');
Route::get('/add-to-cart/{id}/', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/decrement-to-cart/{id}', [CartController::class, 'decrementToCart'])->name('cart.decrease');
Route::get('/show-cart', [CartController::class, 'index'])->name('cart.show');
Route::delete('remove-from-cart/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

Route::get('/add-to-fav/{id}/', [WishlistController::class, 'addFav'])->name('wishlist.add');
Route::resource('wishlist', WishlistController::class);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('invoice', OrderController::class);
    Route::resource('role', RoleController::class);
    Route::resource('gallery', ProductImageController::class);
    Route::resource('productView', ProductViewController::class);
    Route::resource('carousel', CarouselController::class);
    Route::resource('inbox', InboxController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
