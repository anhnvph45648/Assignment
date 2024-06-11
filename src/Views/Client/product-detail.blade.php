@extends('layouts.masterr')

@section('title')
Reader
@endsection

@section('content')


<div class="">
    <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden" style="display: flex">

        <span class="badge badge-primary">NEW</span>
        <img src="{{ asset($product['img_thumbnail']) }}" alt="" height="320px" width="200px" class="card-img-top rounded-0">
        <div class="card-body">

            <p class="h4">{{ $product['price'] }}</p>

            <form action="{{ url('cart/add') }}" method="get">
                <input type="hidden" name="productID" value="{{ $product['id'] }}">
            </form>

        </div>

    </div>
</div>
<div class="col m-4" style="margin-left: 200px;">
    <form action="{{ url('cart/add') }}" method="get">
        <div style="width: 400px; height: 200px;">
        <input type="hidden" name="productID" value="{{ $product['id'] }}">
            <h4><?= $product['name'] ?></h4><br>

            <h5 style="color: red; ">Giá:<?= $product['price_regular'] ?></h5>

            Size: <select class="form-select">

                <option value="1">S</option>

                <option value="2">M</option>

                <option value="3">L</option>

            </select><br>

            <p>Số Lượng:</p>
            <input type=" number" min="1" name="quantity" value="1" style="  width: 30px;">
            
            <p class="border border-light-subtle" style="margin-top:30px;">

                <?= $product['overview'] ?>

            </p><br>
            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
    </form>
</div>
@endsection