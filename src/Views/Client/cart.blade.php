@extends('layouts.masterr')

@section('title')
    Reader
@endsection

@section('namepage')
    Cart
@endsection



@section('content')
    @if (!empty($_SESSION['cart']) || !empty($_SESSION['cart-' . $_SESSION['user']['id']]))
        <div class="col-md-8 mb-2 mt-2">
            <table width="700" height="300" align="center" border="1">
                <thead>
                    <tr align="center">
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                       
                    @endphp

                    @foreach ($cart as $item)
                        <tr align="center">
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <img src="{{ asset($item['img_thumbnail']) }}" width="100px" alt="">
                            </td>
                            <td>
                                @php
                                    $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                    if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                    }
                                @endphp
                                <a class="btn btn-danger" href="{{ $url }}">-</a>

                                {{ $item['quantity'] }}

                                @php
                                    $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                    if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                    }
                                @endphp
                                <a class="btn btn-primary" href="{{ $url }}">+</a>
                            </td>
                            <td>
                                {{ $item['price_sale'] ?: $item['price_regular'] }}
                            </td>
                            <td>
                                {{ $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']) }}
                            </td>
                            <td>
                                @php
                                    $url = url('cart/remove') . '?productID=' . $item['id'];

                                    if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                    }
                                @endphp
                                <a onclick="return confirm('Có chắn không?')"
                                    href="{{ $url }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-md-4 mb-2 mt-2">
            <form action="{{ url('order/checkout') }}" method="POST">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name"
                        value="{{ $_SESSION['user']['name'] ?? null }}" placeholder="Enter name" name="user_name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email"
                        value="{{ $_SESSION['user']['email'] ?? null }}" placeholder="Enter email" name="user_email">
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone"
                        value="{{ $_SESSION['user']['phone'] ?? null }}" placeholder="Enter phone" name="user_phone">
                </div>
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address"
                        value="{{ $_SESSION['user']['address'] ?? null }}" placeholder="Enter address" name="user_address">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endif
@endsection
