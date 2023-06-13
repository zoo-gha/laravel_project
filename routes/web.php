<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDeatailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SearchController;

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
//la page par défaut est le login
Route::get('/', function () {
    return view('auth.login');
});

//la page d'accueil d'admin après l'authentification
Route::get('/dashboard',[HomeController::class, 'index'])->middleware(['auth', 'verified', 'isadmin'])->name('dashboard');

//la page d'accueil de l'utilisateur après l'authentification
Route::get('/home', [HomeController::class, 'index'])->name('home');

//la page d'accueil d'admin après l'authentification
Route::get('/adminhome', function() {
    return view('admin.adminhome');
})->middleware(['auth', 'verified', 'isadmin'])->name('adminhome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('isadmin')->group(function () {
    //les url vers les op CRUD du product
    Route::resource('/products', ProductController::class);
    Route::get('/products/{product}', [ProductController::class, 'destroy']);

    //les url vers les op CRUD du Catégorie du produit
    Route::resource('/categories', CategoryController::class);
    Route::get('categories/{category}', [CategoryController::class, 'destroy']);

    //les url vers les op CRUD du Catégorie du blog
    Route::resource('/blogCategories', BlogCategoryController::class);
    Route::get('blogCategories/{blogCategory}', [BlogCategoryController::class, 'destroy']);
    //les url vers les op CRUD du blog
    Route::resource('/blogs', BlogController::class);
    Route::get('/blogs/{blog}', [BlogController::class, 'destroy']);

    //les url vers les op CRUD des users (consolter la list, et aussi modifier pour avoir un utilisateur)
    Route::resource('/users', UserController::class);
    Route::get('/users/{user}', [UserController::class, 'destroy']);
});


//la page shopping
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{category}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/item/{product}', [ShopController::class, 'showItem'])->name('shop.item');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [ShopController::class, 'showCart'])->name('cart.index');
Route::get('/cart/remove/{id}', [ShopController::class, 'remove'])->name('cart.remove');

//CHECKOUT PAGES
Route::get('/checkout', [StripeController::class, 'order'])->name('checkout');
Route::post('/order/checkout', [StripeController::class, 'passeOrder'])->name('order.checkout');

//la page about us
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

//BLOG pages client
Route::get('/Ecriture/blogs/all', 'App\Http\Controllers\Client\BlogController@index')->name('blogs.show');
Route::get('/Ecriture/blogs/{blogcategory}', 'App\Http\Controllers\Client\BlogController@show')->name('blogs.shows');

Route::get('/Ecriture/blogs/show/{blog}', 'App\Http\Controllers\Client\BlogController@showItem')->name('blog.showitem');









//les routes pour op CRUD pour les commandes
Route::get('/order/checkout', [CommandeController::class, 'voir'])->name('contact.voir');
Route::get('/orders/list', [CommandeController::class, 'index'])->name('orders.list');
Route::get('/orders/{commande}/edit', [CommandeController::class, 'edit'])->name('orders.edit');
Route::put('/orderS/{commande}/update', [CommandeController::class, 'update'])->name('orders.update');
Route::get('/orderS/{commande}', [CommandeController::class, 'destroy'])->name('orders.destroy');

//les routes pour op CRUD pour les messages
Route::get('/contact', [MessageController::class, 'create'])->name('contact.voir');
Route::resource('/messages', MessageController::class);
Route::get('/message/{message}/show', [MessageController::class, 'voir'])->name('message.show');
Route::get('/messages/{message}', [MessageController::class, 'destroy']);

Route::get('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
