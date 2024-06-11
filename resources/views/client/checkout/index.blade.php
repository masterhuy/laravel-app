@extends('client.layouts.app')
@section('title', 'Checkout')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">

        @if (session('message'))
            <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
        @endif

        <form action="{{ route('order') }}" class="row px-xl-5" method="post">
            @csrf
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" name="customer_name" type="text" placeholder="John">
                            @error('customer_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="customer_email" type="text" placeholder="example@email.com">
                            @error('customer_email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" name="customer_phone" type="text" placeholder="+123 456 789">
                            @error('customer_phone')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="customer_address" type="text" placeholder="123 Street">
                            @error('customer_address')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Note</label>
                            <input class="form-control" name="note" type="text" placeholder="Note">
                            @error('note')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal" value="Paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="Direct Check">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="Bank Transfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            @if(Cart::total() > 0)
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>

                        @foreach($cartContents as $item)
                            <div>
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->name }}</p>
                                    <p>x{{ $item->qty }}</p>
                                </div>
                                <p>${{ $item->price }}</p>
                            </div>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ Cart::subtotal(); }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tax</h6>
                            <h6 class="font-weight-medium">${{ Cart::tax(); }}</h6>
                            <input type="hidden" name="tax" value="{{ Cart::tax() }}">
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{ Cart::total(); }}</h5>
                            <input type="hidden" name="total" value="{{ Cart::total() }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Checkout End -->

@endsection
