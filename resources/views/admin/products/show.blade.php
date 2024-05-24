@extends('admin.layouts.app')
@section('title', 'Show product')
@section('content')
    <div class="card py-4 px-4">
        <h3>Show product</h3>

        <div>
            <div class="row">
                <div class="col-12">
                    <label>Image:</label>
                </div>
                <div class="col-12">
                    <img src="{{ $product->images->count() > 0 ? asset('upload/' . $product->images->first()->url) : 'upload/default.png' }}" id="show-image" alt="" style="max-width: 100px">
                </div>
            </div>

            <div class="form-group">
                <label>Name: {{ $product->name }}</label>
            </div>

            <div class="form-group">
                <label>Description : {{ strip_tags($product->description) }}</label>
            </div>

            <div class="form-group">
                <label>Price: {{ $product->price }} $</label>
            </div>

            <div class="form-group">
                <label>Sale: {{ $product->sale }} $</label>
            </div>

            <div class="form-group">
                @if ($product->details->count() > 0)
                    @foreach ($product->details as $detail)
                        <label>Size: {{ $detail->size }} - quantity: {{ $detail->quantity }}</label>
                    @endforeach
                @else
                    <p>There is no size</p>
                @endif
            </div>

            <div class="form-group pd-categories">
                <label name="group">
                    Category:
                    @foreach ($categories as $item )
                        @if($product->categories->contains('id', $item->id)) <span>{{ $item->name }}</span> @endif
                    @endforeach
                </label>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        let sizes = [{
            id: Date.now(),
            size: 'M',
            quantity: 1
        }];
    </script>
    <script src="{{ asset('admin/assets/js/product/product.js') }}"></script>
@endsection
