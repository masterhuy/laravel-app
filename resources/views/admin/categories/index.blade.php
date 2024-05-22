@extends('admin.layouts.app')
@section('title', 'Categories')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
    @endif

    <h3>Categories list</h3>
    <div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Action</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $category->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="id-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete category {{ $category->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('categories.destroy', $category->id) }}" id="form-delete{{ $category->id }}" style="display: inline-block" method="post">
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
        {{ $categories->links() }}
    </div>
</div>


@endsection
