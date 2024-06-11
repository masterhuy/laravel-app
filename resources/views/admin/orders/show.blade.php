@extends('admin.layouts.app')
@section('title', 'Show order')
@section('content')
    <div class="card py-4 px-4">
        <h3>Show order</h3>

        <div>
            <h5><b>Customer order info:</b></h5>
            <div class="form-group">
                <label>Customer Name: {{ $order->customer_name }}</label>
            </div>

            <div class="form-group">
                <label>Customer Email: {{ $order->customer_email }}</label>
            </div>

            <div class="form-group">
                <label>Customer Phone: {{ $order->customer_phone }}</label>
            </div>

            <div class="form-group">
                <label>Customer Address: {{ $order->customer_address }}</label>
            </div>

            <div class="form-group">
                <label>Note: {{ $order->note }}</label>
            </div>

            <div class="form-group">
                <label>Payment: {{ $order->payment }}</label>
            </div>

            <div class="form-group">
                <label>Tax: {{ $order->tax }}$</label>
            </div>

            <div class="form-group">
                <label>Total: {{ $order->total }}$</label>
            </div>

            <h5><b>Product order info:</b></h5>
            @foreach ($productOrders as $productOrder )
                @if($productOrder->order_id == $order->id)
                    <div class="form-group">
                        <label>Product name: {{ $productOrder->product_name }}</label>
                    </div>

                    <div class="form-group">
                        <label>Product quantity: {{ $productOrder->product_quantity }}</label>
                    </div>

                    <div class="form-group">
                        <label>Product price: {{ $productOrder->product_price }}</label>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection
