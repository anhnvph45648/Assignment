@extends('layouts.masterr')

@section('title')
    Reader
@endsection

@section('namepage')
    Shop
@endsection

@section('content')
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">

                <span class="badge badge-primary">NEW</span>
                <a href="{{ url('products/' . $product['id']) }}">
                    <img src="{{ asset($product['img_thumbnail']) }}" alt="" height="200px"
                        class="card-img-top rounded-0">
                </a>
                <div class="card-body">
                    <h4 class="text-uppercase mb-3">
                        <a href="{{ url('products/' . $product['id']) }}">
                            {{ $product['name'] }}
                        </a>
                    </h4>

                    <p class="h4">
                        {{ $product['price_regular'] }}
                    </p>


                    <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" class="btn btn-primary">
                        ADD TO CART
                    </a>


                </div>

            </div>
        </div>
    @endforeach
    <nav>
        <ul class="pagination">
            <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                <a class="page-link " href="{{ url('?page=' . $page - 1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            @for ($i = 1; $i <= $totalPage; $i++)
                <li class="page-item {{ $i == $page ? 'avtive' : '' }}">
                    <a class="page-link" href="{{ url('?page=' . $i) }}" >
                      {{ $i }}
                    </a>
                </li>
            @endfor

            <li class="page-item {{ $page ==  $totalPage ? 'disabled' : ''}}">
                    <a class="page-link " href="{{ url('?page=' . $page + 1) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
@endsection
