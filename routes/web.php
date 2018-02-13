<?php

use GuzzleHttp\Client;
use App\Product;

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shopify', function() {

    $store_id = 1;

    $client = new Client();

    $url = 'https://cd196a6392509b0f9cf21e209644b638:3de9cd9370bcdf3b5e2c4846ed792896@stockrus.myshopify.com/admin/products.json';

    $resp = $client->request('get', $url);

//    echo $resp->getStatusCode();

//    echo $resp->getHeaderLine('content-type');

    $body = json_decode($resp->getBody(), true);

    $products = $body["products"];

//    echo print_r($products, true);

//    @TODO: COMPLETE PARSING THE RESPONSE DATA AND BEGIN UPDATING TO USE VIEWS.
    $product_array = array();

    foreach ($products as $product) {

        $product_id = $product['id'];
        echo "Product ID :: " . $product_id;

        foreach ($product['variants'] as $variant) {

            echo print_r($variant, true);
        }
//        Product::create([
//            'id'        => $product['id'],
//            'store_id'  => $store_id,
//            'name'      => $product['title'],
//            'sku'       => $product['variants']['sku'],
//            'quantity'  => $product['variants']['inventory_quantity'],
//            'price'     => $product['variants']['price'],
//            'created_at'=> $product['variants']['created_at']
//        ]);
    }

});

Route::get('/vend', function () {

    $store_id = 2;

    $client = new Client();

//    $redirect_uri = 'https://stockrus.vendhq.com/api/products';

    $redirect_uri = 'https://stitchlite.dev/zend';

    $client_id = 'AsEzMOtBQAaEk8seNFk2CpcyXahfVo2D';

    $url = 'https://secure.vendhq.com/connect?response_type=code&client_id={' . $client_id . '}&redirect_uri={' . $redirect_uri . '}&state={state}';

    $resp = $client->request('get', $url);

    echo $resp->getStatusCode();

    echo $resp->getHeaderLine('content-type');

    echo $resp->getBody();
});