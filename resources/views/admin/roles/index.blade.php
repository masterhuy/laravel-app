@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
    @endif

    <h3>Role list</h3>
    <div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Display Name</th>
                <th>Action</th>
            </tr>

            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $role->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="id-{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete role {{ $role->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}" style="display: inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $roles->links() }}
    </div>
</div>


@endsection
