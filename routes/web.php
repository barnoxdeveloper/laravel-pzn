<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/andre', function () {
    return "Hello Andre";
});

Route::redirect('/youtube', '/andre');

Route::fallback(function (){
    return '404 By Andre';
});

Route::view('/hello', 'hello', ['name' => 'Andre']);

Route::get('/hello-again', function () {
    return view('hello', ['name' => 'Andre']);
});

Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'Andre']);
});

Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
})->name('product.detail');

Route::get('/products/{id}/items/{item}', function ($productId, $itemId) {
    return "Product $productId, Item $itemId";
})->name('product.item.detail');

Route::get('/categories/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

Route::get('/users/{id?}', function ($userId = '404') {
    return "User $userId";
})->name('user.detail');

Route::get('conflict/{name}', function ($name) {
    return "Conflict $name";
});

Route::get('conflict/andre', function () {
    return "Conflict Andre Elm";
});

Route::get('/produk/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/produk-redirect/{id}', function ($id) {
    return to_route('product.detail', ['id' => $id]);
});
