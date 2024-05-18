@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <h5 class="text-primary">{{ session('message') }}</h5>
    @endif


    <h1>
        Role list
    </h1>
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
                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}" style="display: inline-block" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $roles->links() }}
    </div>

</div>


@endsection
