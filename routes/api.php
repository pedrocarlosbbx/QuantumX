<?php

use App\Http\Controllers\user\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\TagController;
use App\Http\Controllers\user\ArticleTagController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\DiscussionController;
use App\Http\Controllers\user\DiscussionCommentController;
use App\Http\Controllers\user\CuratedArticleController;
use App\Http\Controllers\user\RecommendedArticleController;
use App\Http\Controllers\user\SavedArticleController;
use App\Http\Controllers\user\UserDetailController;
use App\Http\Controllers\user\SearchController;
use App\Http\Controllers\user\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute yang hanya bisa diakses oleh pengguna dengan peran admin
});

Route::group(['prefix' => 'user/articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'user/categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'user/tags'], function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'store']);
    Route::get('/{id}', [TagController::class, 'show']);
    Route::put('/{id}', [TagController::class, 'update']);
    Route::delete('/{id}', [TagController::class, 'destroy']);
});

Route::group(['prefix' => 'user/article-tags'], function () {
    Route::get('/', [ArticleTagController::class, 'index']);
    Route::post('/', [ArticleTagController::class, 'store']);
    Route::get('/{id}', [ArticleTagController::class, 'show']);
    Route::put('/{id}', [ArticleTagController::class, 'update']);
    Route::delete('/{id}', [ArticleTagController::class, 'destroy']);
});

Route::group(['prefix' => 'user/comments'], function () {
    Route::get('/', [CommentController::class, 'index']);
    Route::post('/', [CommentController::class, 'store']);
    Route::get('/{id}', [CommentController::class, 'show']);
    Route::put('/{id}', [CommentController::class, 'update']);
    Route::delete('/{id}', [CommentController::class, 'destroy']);
});

Route::group(['prefix' => 'user/discussions'], function () {
    Route::get('/', [DiscussionController::class, 'index']);
    Route::post('/', [DiscussionController::class, 'store']);
    Route::get('/{id}', [DiscussionController::class, 'show']);
    Route::put('/{id}', [DiscussionController::class, 'update']);
    Route::delete('/{id}', [DiscussionController::class, 'destroy']);
});

Route::group(['prefix' => 'user/discussion-comments'], function () {
    Route::get('/', [DiscussionCommentController::class, 'index']);
    Route::post('/', [DiscussionCommentController::class, 'store']);
    Route::get('/{id}', [DiscussionCommentController::class, 'show']);
    Route::put('/{id}', [DiscussionCommentController::class, 'update']);
    Route::delete('/{id}', [DiscussionCommentController::class, 'destroy']);
});

Route::group(['prefix' => 'user/curated-articles'], function () {
    Route::get('/', [CuratedArticleController::class, 'index']);
    Route::post('/', [CuratedArticleController::class, 'store']);
    Route::get('/{id}', [CuratedArticleController::class, 'show']);
    Route::put('/{id}', [CuratedArticleController::class, 'update']);
    Route::delete('/{id}', [CuratedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'user/recommended-articles'], function () {
    Route::get('/', [RecommendedArticleController::class, 'index']);
    Route::post('/', [RecommendedArticleController::class, 'store']);
    Route::get('/{id}', [RecommendedArticleController::class, 'show']);
    Route::put('/{id}', [RecommendedArticleController::class, 'update']);
    Route::delete('/{id}', [RecommendedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'user/saved-articles'], function () {
    Route::get('/', [SavedArticleController::class, 'index']);
    Route::post('/', [SavedArticleController::class, 'store']);
    Route::get('/{id}', [SavedArticleController::class, 'show']);
    Route::put('/{id}', [SavedArticleController::class, 'update']);
    Route::delete('/{id}', [SavedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'user/user-details'], function () {
    Route::get('/', [UserDetailController::class, 'index']);
    Route::post('/', [UserDetailController::class, 'store']);
    Route::get('/{id}', [UserDetailController::class, 'show']);
    Route::put('/{id}', [UserDetailController::class, 'update']);
    Route::delete('/{id}', [UserDetailController::class, 'destroy']);
});

Route::group(['prefix' => 'user/searches'], function () {
    Route::get('/', [SearchController::class, 'index']);
    Route::post('/', [SearchController::class, 'store']);
    Route::get('/{id}', [SearchController::class, 'show']);
    Route::put('/{id}', [SearchController::class, 'update']);
    Route::delete('/{id}', [SearchController::class, 'destroy']);
});

Route::group(['prefix' => 'user/dashboards'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/', [DashboardController::class, 'store']);
    Route::get('/{id}', [DashboardController::class, 'show']);
    Route::put('/{id}', [DashboardController::class, 'update']);
    Route::delete('/{id}', [DashboardController::class, 'destroy']);
});