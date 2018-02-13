<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/13/18
 * Time: 5:50 AM
 */
?>
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="title m-b-md">
        Dashboard
    </div>
    {{--<div class="links">--}}
        {{--<a href="/shop">Go to Store</a>--}}
    {{--</div>--}}
</div>
<br>
<div class="table-responsive" align="center">
    <table class="table" style="text-align: center;">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Stock</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $products = DB::table('products')->whereStoreId(1)->get();
        ?>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
