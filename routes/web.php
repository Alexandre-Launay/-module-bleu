<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ArticleController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminCategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Routes to access client comments as guest user (index, show)
 * Routes to access client articles as authenticated user (create, store, edit, update, destroy)
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('client.articles.index');
Route::get('/articles/ajout-article', [ArticleController::class, 'create'])->name('client.articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('client.articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('client.articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('client.articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('client.articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('client.articles.destroy');

/**
 * Routes to access client comments as authenticated user
 */
Route::resource('/comments', CommentController::class)->only(['store', 'update', 'destroy']);

/**
 * Route to access the admin dashboard
 */
Route::get('/admin', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * Routes to access admin categories
 */
Route::resource('/admin/categories', AdminCategoryController::class)->only(['index', 'store', 'update', 'destroy']);
Route::get('/admin/categories/', [AdminCategoryController::class, 'index'])->name('admin.categories.index');

/**
 * Routes to access admin articles
 */
Route::prefix('/admin/articles')->name('admin.articles.')->group(function () {
    Route::get('/', [AdminArticleController::class, 'indexVisibleWithoutTrashed'])->name('index');
    Route::get('/pending', [AdminArticleController::class, 'indexPendingValidation'])->name('pending');
    Route::get('/trashed', [AdminArticleController::class, 'indexOnlyTrashed'])->name('trashed');
    Route::get('/{article}', [AdminArticleController::class, 'editVisibility'])->name('editVisibility');
    Route::put('/{article}', [AdminArticleController::class, 'update'])->name('update');
    Route::delete('/{article}', [AdminArticleController::class, 'destroy'])->name('destroy');
    Route::patch('/{article}', [AdminArticleController::class, 'restore'])->name('restore');
});

/**
 * Routes to access admin comments
 */
Route::prefix('/admin/comments')->name('admin.comments.')->group(function () {
    Route::get('/', [AdminCommentController::class, 'indexWithoutTrashed'])->name('index');
    Route::get('/trashed', [AdminCommentController::class, 'indexOnlyTrashed'])->name('indexOnlyTrashed');
    Route::delete('{comment}', [AdminCommentController::class, 'destroy'])->name('destroy');
    Route::patch('{comment}', [AdminCommentController::class, 'restore'])->name('restore');
});

require __DIR__ . '/auth.php';
