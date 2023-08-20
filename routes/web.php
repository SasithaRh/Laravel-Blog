<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\BlogPageController;
use App\Http\Controllers\Home\ContactController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy' )->name('admin.logout');
    Route::get('/admin/profile', 'profile' )->name('admin.profile');
    Route::get('/edit/profile', 'editprofile' )->name('edit.profile');
    Route::post('/store/profile', 'stroreprofile' )->name('strore.profile');
    Route::get('/change/password', 'changepassword' )->name('change.password');
    Route::post('/update/password', 'updatepassword' )->name('update.password');
    Route::post('/update/password', 'updatepassword' )->name('update.password');

});
});
Route::middleware(['auth'])->group(function () {
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'homeslider' )->name('home.slide');
      Route::post('/update/slider', 'updateslider' )->name('update.slider');

});
});


Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'aboutpage' )->name('about.page');
    Route::get('/about', 'homeabout' )->name('home.about');
    Route::get('/about/image', 'multi_image' )->name('multi.image');
    Route::get('/about/all_image', 'all_multi_image' )->name('all.image');
    Route::get('/image/edit/{id}', 'editmultiimage' )->name('edit.multi.image');
    Route::get('/image/delete/{id}', 'deletemultiimage' )->name('delete.multi.image');

    Route::post('/update/multi/image','updatemultimage' )->name('update.multi.image');
     Route::post('/update/about', 'updateabout' )->name('update.about');
    Route::post('/store/images', 'storemultiimage' )->name('store.multi.image');

});



Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio', 'allportfolio' )->name('all.portfolio');
    Route::get('/add/portfolio', 'addportfolio' )->name('add.portfolio');
    Route::post('/store/portfolio', 'storeportfolio' )->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'editportfolio' )->name('edit.portfolio');
    Route::get('/portfolio/delete/{id}', 'deleteportfolio' )->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'portfoliodetails' )->name('portfolio.details');
    Route::get('/home/portfolio', 'homeportfolio' )->name('home.portfolio'); 
});

Route::middleware(['auth'])->group(function () {
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog', 'allblog' )->name('all.blog');
    Route::get('/add/blog_category', 'addblog_category' )->name('add.blog_category');
    Route::post('/store/category', 'storeblog_category' )->name('store.blog_category');
    Route::get('/edit/blogcategorys/{id}', 'editblogcategorys' )->name('edit.blogcategorys');
    Route::get('/category/delete/{id}', 'deleteblogcategorys' )->name('delete.blogcategorys');
    Route::post('/category/update', 'updatecategory' )->name('update.category');
});
});

Route::controller(BlogPageController::class)->group(function(){
    Route::get('/all/blog/page', 'allblogpage' )->name('all.blog_page');
    Route::get('/add/blog', 'addblog' )->name('add.blog');
    Route::post('/store/blog', 'storeblog' )->name('store.blog');
    Route::get('/edit/blog/{id}', 'editblog' )->name('edit.blog');
    Route::get('/blog/delete/{id}', 'deleteblog_page' )->name('delete.blog_page');
    Route::post('/blog/update', 'updateblog' )->name('update.blog');
    Route::get('/blog/details/{id}', 'blogdetails' )->name('blog-details');
    Route::get('/category/blog/{id}', 'categoryblog' )->name('category.blog');
    Route::get('/home/blog', 'homeblog' )->name('home.blog');
});


Route::controller(ContactController::class)->group(function(){
    Route::get('/contact/page', 'contactpage' )->name('contact');
    Route::get('/contact/message', 'contactmessage' )->name('contact.message');
    // Route::post('/store/blog', 'storeblog' )->name('store.blog');
    // Route::get('/edit/blog/{id}', 'editblog' )->name('edit.blog');
    Route::get('/contact/delete/{id}', 'deletecontact' )->name('delete.contact');
     Route::post('/contact/store', 'Storecontact' )->name('Store.contact');
    // Route::get('/blog/details/{id}', 'blogdetails' )->name('blog-details');
    // Route::get('/category/blog/{id}', 'categoryblog' )->name('category.blog');
    // Route::get('/home/blog', 'homeblog' )->name('home.blog');
});

require __DIR__.'/auth.php';
