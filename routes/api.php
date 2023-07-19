<?php

use App\Http\Controllers\user\ArticleCategoryController;
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

Route::group(['prefix' => 'user'], function () {
    // Rute untuk ArticleController
    Route::apiResource('articles', ArticleController::class);

    // Rute untuk CategoryController
    Route::apiResource('categories', CategoryController::class);

    // Rute untuk TagController
    Route::apiResource('tags', TagController::class);

    // Rute untuk ArticleTagController
    Route::apiResource('article-tag', ArticleTagController::class);

    // Rute untuk ArticleCategoryController
    Route::apiResource('article-category', ArticleCategoryController::class);

    // Rute untuk CommentController
    Route::apiResource('comments', CommentController::class);

    // Rute untuk DiscussionController
    Route::apiResource('discussions', DiscussionController::class);

    // Rute untuk DiscussionCommentController
    Route::apiResource('discussion-comments', DiscussionCommentController::class);

    // Rute untuk CuratedArticleController
    Route::apiResource('curated-articles', CuratedArticleController::class);

    // Rute untuk RecommendedArticleController
    Route::apiResource('recommended-articles', RecommendedArticleController::class);

    // Rute untuk SavedArticleController
    Route::apiResource('saved-articles', SavedArticleController::class);

    // Rute untuk UserDetailController
    Route::apiResource('user-details', UserDetailController::class);

    // Rute untuk SearchController
    Route::apiResource('searches', SearchController::class);

    // Rute untuk DashboardController
    Route::apiResource('dashboards', DashboardController::class);
});