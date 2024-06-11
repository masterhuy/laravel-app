@extends('admin.layouts.app')
@section('title', 'Orders')
@section('content')

    <div class="card py-4 px-4">

        @if (session('message'))
            <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
        @endif

        <h3>Orders list</h3>
        <div>
            <form action="{{ route('orders.selected.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <table class="table table-hover">
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Note</th>
                        <th>Payment</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($orders as $order)
                        <tr>
                            <td><input type="checkbox" name="order_ids[]" value="{{ $order->id }}"></td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_email }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>$ {{ $order->tax }}</td>
                            <td>$ {{ $order->total }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Show</a>
                                {{-- <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $order->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $orders->links() }}

                <button type="submit" class="btn btn-primary">Delete selected</button>
            </form>

            @foreach ($orders as $order)
            <!-- Modal -->
            <div class="modal fade" id="id-{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete this order?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('orders.destroy', $order->id) }}" id="form-delete{{ $order->id }}" style="display: inline-block" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-delete btn-danger">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
