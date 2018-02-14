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

//    echo print_r($products, true) . "</br>";

//    @TODO: COMPLETE PARSING THE RESPONSE DATA AND BEGIN UPDATING TO USE VIEWS.
    $product_array = array();

    foreach ($products as $product) {

        $product_array['id'] = $product['id'];
        $product_array['storeId'] = $store_id;
        $product_array['product_name'] = $product['title'];

        foreach ($product['variants'] as $variant) {

            $product_array['sku'] = $variant['sku'];
            $product_array['price'] = $variant['price'];
            $product_array['stock'] = $variant['inventory_quantity'];
            $product_array['variant'] = $variant['title'];
            $product_array['variant_id'] = $variant['id'];
            $product_array['create_date'] = $variant['created_at'];
//            echo print_r($variant, true);
        }
        echo print_r($product_array, true);
        Product::create([
                'id'            => $product_array['id'],
                'store_id'      => $store_id,
                'name'          => $product_array['product_name'],
                'sku'           => $product_array['sku'],
                'quantity'      => $product_array['stock'],
                'price'         => $product_array['price'],
                'variant_name'  => $product_array['variant'],
                'product_id'    => $product_array['variant_id'],
                'created_at'    => $product_array['create_date']
        ]);
    }

});

Route::get('/vend', function () {

    $store_id = 2;

    $client = new Client();

//    PRODUCTS API URL: https://domain_prefix.vendhq.com/api/products
//    $redirect_uri = 'https://stockrus.vendhq.com/api/products';

    $redirect_uri = 'https://stitchlite.dev/zend';

    $client_id = 'AsEzMOtBQAaEk8seNFk2CpcyXahfVo2D';

//    $url = 'https://secure.vendhq.com/connect?response_type=code&client_id={' . $client_id . '}&redirect_uri={' . $redirect_uri . '}&state={state}';

    $resp = $client->request('get', $url);

    echo $resp->getStatusCode();

    echo $resp->getHeaderLine('content-type');

    echo $resp->getBody();
});