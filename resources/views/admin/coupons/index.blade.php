@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
    @endif

    <h3>Coupons list</h3>
    <div>
        <a href="{{ route('coupons.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Value (%)</th>
                <th>Expery Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td>{{ $coupon->expery_date }}</td>
                    {{-- <td>{{ $coupon->status == 0 ? '<span class="alert alert-success">Ready</span>' : '<span class="alert alert-danger">Used</span>'}}</td> --}}
                    <td>
                        @if($coupon->status == 0)
                            <span class="alert alert-success">Ready</span>
                        @else
                            <span class="alert alert-danger">Used</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $coupon->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="id-{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete coupon {{ $coupon->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('coupons.destroy', $coupon->id) }}" id="form-delete{{ $coupon->id }}" style="display: inline-block" method="post">
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
        {{ $coupons->links() }}
    </div>
</div>


@endsection
