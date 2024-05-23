@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
    @endif

    <h3>Products list</h3>
    <div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sale</th>
                <th>Action</th>
            </tr>

            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img width="100" height="100" src={{ $product->images->count() > 0 ? asset('upload/' . $product->images->first()->url) : 'upload/default.png'}} /></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->sale }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $product->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="id-{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete product {{ $product->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('products.destroy', $product->id) }}" id="form-delete{{ $product->id }}" style="display: inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-delete btn-danger">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>
</div>


@endsection
