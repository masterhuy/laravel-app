@extends('admin.layouts.app')
@section('title', 'Edit Contact')
@section('content')
    <div class="card py-4 px-4">
        <h3>Edit contact</h3>

        <div>
            <form action="{{ route('contacts.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') ?? $contact->name }}" name="name" class="form-control">

                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Email</label>
                    <input type="email" value="{{ old('email') ?? $contact->email }}" name="email" class="form-control">
                    @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Phone</label>
                    <input type="text" value="{{ old('phone') ?? $contact->phone }}" name="phone" class="form-control">
                    @error('phone')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Message</label>
                    <input type="text" value="{{ old('message') ?? $contact->message }}" name="message" class="form-control">
                    @error('message')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

        })
    </script>
@endsection
