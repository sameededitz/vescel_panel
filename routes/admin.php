<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'verifyRole:admin']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin-home');

    Route::get('/categories', [CategoryController::class, 'categories'])->name('all-categories');

    Route::post('/add-category', [CategoryController::class, 'storeCategory'])->name('add-category');

    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'editCategory'])->name('edit-category');

    Route::put('/update-category/{category}', [CategoryController::class, 'updateCategory'])->name('update-category');

    Route::delete('/delete-category/{category}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

    Route::get('/subcategory/{category:slug}', [SubCategoryController::class, 'subcategory'])->name('all-sub-categories');

    Route::post('/add-subcategory', [SubCategoryController::class, 'addSubCategory'])->name('add-subcategory');

    Route::get('/subcategory/{category:slug}/{subcategory:slug}/edit', [SubCategoryController::class, 'editSubCategory'])->name('edit-subcategory');

    Route::put('/update-subcategory/{subcategory:slug}', [SubCategoryController::class, 'updateSubCategory'])->name('update-subcategory');

    Route::delete('/delete-subcategory/{subcategory}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete-subcategory');

    Route::get('/products', [ProductController::class, 'products'])->name('all-products');

    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add-product');

    Route::get('/product/{product:slug}/edit', [ProductController::class, 'editProduct'])->name('edit-product');

    Route::delete('/product/{product:slug}/delete', [ProductController::class, 'deleteProduct'])->name('delete-product');

    Route::get('/orders', [OrderController::class, 'orders'])->name('all-orders');
    Route::get('/orders/{order}', [OrderController::class, 'orderDetails'])->name('order-details');

    Route::get('/customers', [AdminController::class, 'AllUsers'])->name('all-users');
    Route::get('/add-user', [AdminController::class, 'addUser'])->name('add-user');
    Route::get('/edit-user/{user}', [AdminController::class, 'editUser'])->name('edit-user');
    Route::delete('/delete-user/{user}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/adminUsers', [AdminController::class, 'allAdmins'])->name('all-admins');

    Route::get('/signup', [AdminController::class, 'addAdmin'])->name('add-admin');

    Route::get('/edit-admin/{user}', [AdminController::class, 'editAdmin'])->name('edit-admin');

    Route::delete('/delete-admin/{user}', [AdminController::class, 'deleteAdmin'])->name('delete-admin');
});
