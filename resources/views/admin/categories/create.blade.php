@extends('admin.layouts.app')
@section('title', 'Create Category')
@section('content')
    <div class="card py-4 px-4">
        <h3>Create category</h3>

        <div>
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Parent Category</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Select parent category</option>
                        @foreach ($parentCategories as $item )
                            <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

