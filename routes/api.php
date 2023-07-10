<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\DiscussionCommentController;
use App\Http\Controllers\CuratedArticleController;
use App\Http\Controllers\RecommendedArticleController;
use App\Http\Controllers\SavedArticleController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;

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

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'store']);
    Route::get('/{id}', [TagController::class, 'show']);
    Route::put('/{id}', [TagController::class, 'update']);
    Route::delete('/{id}', [TagController::class, 'destroy']);
});

Route::group(['prefix' => 'article-tags'], function () {
    Route::get('/', [ArticleTagController::class, 'index']);
    Route::post('/', [ArticleTagController::class, 'store']);
    Route::get('/{id}', [ArticleTagController::class, 'show']);
    Route::put('/{id}', [ArticleTagController::class, 'update']);
    Route::delete('/{id}', [ArticleTagController::class, 'destroy']);
});

Route::group(['prefix' => 'comments'], function () {
    Route::get('/', [CommentController::class, 'index']);
    Route::post('/', [CommentController::class, 'store']);
    Route::get('/{id}', [CommentController::class, 'show']);
    Route::put('/{id}', [CommentController::class, 'update']);
    Route::delete('/{id}', [CommentController::class, 'destroy']);
});

Route::group(['prefix' => 'discussions'], function () {
    Route::get('/', [DiscussionController::class, 'index']);
    Route::post('/', [DiscussionController::class, 'store']);
    Route::get('/{id}', [DiscussionController::class, 'show']);
    Route::put('/{id}', [DiscussionController::class, 'update']);
    Route::delete('/{id}', [DiscussionController::class, 'destroy']);
});

Route::group(['prefix' => 'discussion-comments'], function () {
    Route::get('/', [DiscussionCommentController::class, 'index']);
    Route::post('/', [DiscussionCommentController::class, 'store']);
    Route::get('/{id}', [DiscussionCommentController::class, 'show']);
    Route::put('/{id}', [DiscussionCommentController::class, 'update']);
    Route::delete('/{id}', [DiscussionCommentController::class, 'destroy']);
});

Route::group(['prefix' => 'curated-articles'], function () {
    Route::get('/', [CuratedArticleController::class, 'index']);
    Route::post('/', [CuratedArticleController::class, 'store']);
    Route::get('/{id}', [CuratedArticleController::class, 'show']);
    Route::put('/{id}', [CuratedArticleController::class, 'update']);
    Route::delete('/{id}', [CuratedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'recommended-articles'], function () {
    Route::get('/', [RecommendedArticleController::class, 'index']);
    Route::post('/', [RecommendedArticleController::class, 'store']);
    Route::get('/{id}', [RecommendedArticleController::class, 'show']);
    Route::put('/{id}', [RecommendedArticleController::class, 'update']);
    Route::delete('/{id}', [RecommendedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'saved-articles'], function () {
    Route::get('/', [SavedArticleController::class, 'index']);
    Route::post('/', [SavedArticleController::class, 'store']);
    Route::get('/{id}', [SavedArticleController::class, 'show']);
    Route::put('/{id}', [SavedArticleController::class, 'update']);
    Route::delete('/{id}', [SavedArticleController::class, 'destroy']);
});

Route::group(['prefix' => 'user-details'], function () {
    Route::get('/', [UserDetailController::class, 'index']);
    Route::post('/', [UserDetailController::class, 'store']);
    Route::get('/{id}', [UserDetailController::class, 'show']);
    Route::put('/{id}', [UserDetailController::class, 'update']);
    Route::delete('/{id}', [UserDetailController::class, 'destroy']);
});

Route::group(['prefix' => 'searches'], function () {
    Route::get('/', [SearchController::class, 'index']);
    Route::post('/', [SearchController::class, 'store']);
    Route::get('/{id}', [SearchController::class, 'show']);
    Route::put('/{id}', [SearchController::class, 'update']);
    Route::delete('/{id}', [SearchController::class, 'destroy']);
});

Route::group(['prefix' => 'dashboards'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/', [DashboardController::class, 'store']);
    Route::get('/{id}', [DashboardController::class, 'show']);
    Route::put('/{id}', [DashboardController::class, 'update']);
    Route::delete('/{id}', [DashboardController::class, 'destroy']);
});