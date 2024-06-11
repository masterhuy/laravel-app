<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Products list')
@section('content')
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            @include('client.shop.sidebar')

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('search') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search by name">
                                    <button type="submit" class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" data-sort="latest">Latest</a>
                                    <a class="dropdown-item" data-sort="price_asc">Price asc</a>
                                    <a class="dropdown-item" data-sort="price_desc">Price desc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="row product-list">
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1 product-item" data-date="{{ $item->created_at }}" data-price="{{ $item->price }}">
                                <div class="card border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100"
                                            src="{{ $item->images->count() > 0 ? asset('upload/' . $item->images->first()->url) : '/upload/default.png' }}"
                                            alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $item->name }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>${{ $item->price }}</h6>
                                            <h6 class="item-muted ml-2"><del>${{ $item->price }}</del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('client.product.show', $item->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" type="number" name="quantity" value="1" min="1">
                                            <button type="submit" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('.dropdown-item').on('click', function() {
            var sortValue = $(this).data('sort');

            if (sortValue == 'latest') {
                $("#triggerId").text('Lastest');
            }else if((sortValue == 'price_asc')){
                $("#triggerId").text('Price asc');
            }else if((sortValue == 'price_desc')){
                $("#triggerId").text('Price desc')
            }

            sortProducts(sortValue);
        });

        function sortProducts(sortValue) {
            var products = $('.product-item');
            if (sortValue == 'latest') {
                products.sort(function(a, b) {
                    // return $(b).data('date') - $(a).data('date');
                    var dateA = new Date($(a).data('date'));
                    var dateB = new Date($(b).data('date'));
                    return dateA - dateB;
                });
            } else if (sortValue === 'price_asc') {
                products.sort(function(a, b) {
                    return $(a).data('price') - $(b).data('price');
                });
            } else if (sortValue === 'price_desc') {
                products.sort(function(a, b) {
                    return $(b).data('price') - $(a).data('price');
                });
            }
            $('.product-list').html(products);
        }
    });
</script>
@endsection
