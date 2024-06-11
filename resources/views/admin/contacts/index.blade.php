@extends('admin.layouts.app')
@section('title', 'Contacts')
@section('content')

<div class="card py-4 px-4">

    @if (session('message'))
        <div class="js-alert alert alert-success alert-dismissible text-white">{{ session('message') }}</div>
    @endif

    <h3>Contacts list</h3>
    <div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
    </div>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>

            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#id-{{ $contact->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="id-{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to delete contact {{ $contact->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" id="form-delete{{ $contact->id }}" style="display: inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-delete btn-danger" data-id={{ $contact->id }}>Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $contacts->links() }}
    </div>
</div>


@endsection
