@extends('admin.layouts.app')
@section('title', 'Edit Coupon')
@section('content')
    <div class="card py-4 px-4">
        <h3>Edit coupon</h3>

        <div>
            <form action="{{ route('coupons.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') ?? $coupon->name }}" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Type</label>
                    <select name="type" class="form-control" value="">
                        <option value="">Select type</option>
                        <option value="money" {{ old('type') ?? $coupon->type == 'money' ? 'selected' : '' }}>Money</option>
                    </select>
                    @error('type')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Value (%)</label>
                    <input type="number" value="{{ old('value') ?? $coupon->value }}" name="value" class="form-control">
                    @error('value')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Expery date</label>
                    <input type="date" value="{{ old('expery_date') ?? date("Y-m-d",strtotime($coupon->expery_date)) }}" name="expery_date" class="form-control">
                    @error('expery_date')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-groups input-group-static mb-4">
                    <label>Status</label>
                    <div>
                        <span>Ready</span>
                        <input type="radio" name="status" class="form-controls" {{ $coupon->status == 0 ? 'checked' : '' }} value="0">
                    </div>
                    <div>
                        <span>Used</span>
                        <input type="radio" name="status" class="form-controls" {{ $coupon->status == 1 ? 'checked' : '' }} value="1">
                    </div>
                    @error('status')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

