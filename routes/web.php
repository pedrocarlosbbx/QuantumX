<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailControllerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\DiscussionCommentController;
use App\Http\Controllers\CuratedArticleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SavedArticleController;
use App\Http\Controllers\RecommendedArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDetailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('user_detail', UserDetailController::class);
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('article_categories', ArticleCategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('article_tags', ArticleTagController::class);
Route::resource('comments', CommentController::class);
Route::resource('discussions', DiscussionController::class);
Route::resource('discussion_comments', DiscussionCommentController::class);
Route::resource('curated_articles', CuratedArticleController::class);
Route::resource('searches', SearchController::class);
Route::resource('saved_articles', SavedArticleController::class);
Route::resource('recommended_articles', RecommendedArticleController::class);
Route::resource('dashboards', DashboardController::class);