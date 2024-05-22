@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('content')
    <div class="card py-4 px-4">
        <h3>Edit category</h3>

        <div>
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') ?? $category->name }}" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                @if($category->children->count() == 0)
                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Parent Category</label>
                    <select name="parent_id" class="form-control" value="{{ $category->parent_id }}">
                        <option value="">Select parent category</option>
                        @foreach ($parentCategories as $item )
                            <option value="{{ $item->id }}" {{ old('parent_id') ?? $category->parent_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

