<?php

use Illuminate\Http\Request;
use App\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/api/sync', function (Request $request) {

    // This will be used to sync the data from Shopify and Vend.
});

Route::middleware('auth:api')->get('api/products', function () {

    // Will return the list of products.
    $products = Product::all();

    foreach ($products as $product)
    {
        return $product;
    }

});

Route::middleware('auth:api')->get('api/products/{id}', function ($id) {

    // Will return the specified stitch lite item.
    $product = Product::findOrFail($id);

    return $product;
});