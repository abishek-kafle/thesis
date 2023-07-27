<?php

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CkeditorFileUploadController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Front\FrontController;

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

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/policy', [FrontController::class, 'policy'])->name('front.policy');
Route::get('/thesis/{slug}', [FrontController::class, 'thesis'])->name('front.thesis');
Route::get('/thesis/detail/{slug}', [FrontController::class, 'thesis_detail'])->name('front.thesis_detail');
Route::get('/notice', [FrontController::class, 'notice'])->name('front.notice');
Route::get('/notice-detail/{slug}', [FrontController::class, 'notice_detail'])->name('front.notice_detail');
Route::get('/news', [FrontController::class, 'news'])->name('front.news');
Route::get('/news-detail/{slug}', [FrontController::class, 'news_detail'])->name('front.news_detail');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blog');
Route::get('/blogs/{slug}', [FrontController::class, 'blog_detail'])->name('front.blog_detail');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/display/file/{file}', [FrontController::class, 'display'])->name('display.file');
Route::get('/display-notice/{file}', [FrontController::class, 'display_notice'])->name('display.notice');
Route::get('/download/file/{filename}', [FrontController::class, 'download'])->name('download.file');
Route::get('/download/notice/{file}', [FrontController::class, 'download_notice'])->name('download.notice');

Route::prefix('/admin')->group(function(){
    Route::match(['get', 'post'], '/login', [AdminLoginController::class, 'adminLogin'])->name('adminLogin');
    Route::group(['middleware' => 'admin'], function(){
        // Dashboard
        Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('adminDashboard');
        // Profile
        Route::get('/profile', [AdminLoginController::class, 'profile'])->name('adminProfile');
        // Admin Profile Update
        Route::post('/profile/update/{id}', [AdminLoginController::class, 'profileUpdate'])->name('profileUpdate');
        // Change Password
        Route::get('/change-password', [AdminLoginController::class, 'changePassword'])->name('changePassword');
        Route::post('/update-password/{id}', [AdminLoginController::class, 'updatePassword'])->name('updatePassword');

        // Categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/add', [CategoryController::class, 'add'])->name('category.add');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

        // Thesis
        Route::get('/thesis', [ThesisController::class, 'index'])->name('thesis.index');
        Route::get('/thesis/add', [ThesisController::class, 'add'])->name('thesis.add');
        Route::post('/thesis/store', [ThesisController::class, 'store'])->name('thesis.store');
        Route::get('/thesis/edit/{id}', [ThesisController::class, 'edit'])->name('thesis.edit');
        Route::post('/thesis/update/{id}', [ThesisController::class, 'update'])->name('thesis.update');
        Route::get('/thesis/delete/{id}', [ThesisController::class, 'delete'])->name('thesis.delete');
        Route::get('/upload/thesis/{id}', [ThesisController::class, 'upload'])->name('thesis.upload');
        Route::post('/thesis/file/upload/{id}', [ThesisController::class, 'fileUpload'])->name('thesis.file.store');
        Route::get('/thesis/file/view/{file}', [ThesisController::class, 'view_file'])->name('thesis.file.view');
        Route::get('/thesis/file/delete/{id}', [ThesisController::class, 'delete_file'])->name('thesis.file.delete');

        // Blogs
        Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/add', [BlogController::class, 'add'])->name('blog.add');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

        // Notices
        Route::get('/notices', [NoticeController::class, 'index'])->name('notice.index');
        Route::get('/notice/add', [NoticeController::class, 'add'])->name('notice.add');
        Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
        Route::get('/notice/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
        Route::post('/notice/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
        Route::get('/notice/delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');

        // News
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news/add', [NewsController::class, 'add'])->name('news.add');
        Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::get('/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

        // About
        Route::get('/about', [AboutController::class, 'index'])->name('about.index');
        Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');

        // Privacy Policy
        Route::get('/policy', [PolicyController::class, 'index'])->name('policy.index');
        Route::post('/policy/update/{id}', [PolicyController::class, 'update'])->name('policy.update');

        // Info
        Route::get('/info', [InfoController::class, 'index'])->name('info.index');
        Route::post('/info/update/{id}', [InfoController::class, 'update'])->name('info.update');

        // Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');

        // Social Media
        Route::get('/socialmedia', [SocialmediaController::class, 'index'])->name('socialmedia.index');
        Route::post('/socialmedia/update/{id}', [SocialmediaController::class, 'update'])->name('socialmedia.update');

        // Theme
        Route::get('/theme', [ThemeController::class, 'index'])->name('theme.index');
        Route::post('/theme/update/{id}', [ThemeController::class, 'update'])->name('theme.update');

        // Ckeditor
        Route::post('ckeditor', [CkeditorFileUploadController::class, 'store'])->name('ckeditor.upload');
    });
    Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('adminLogout');
});
