@extends('admin.layouts.app')
@section('title', 'Create Users')
@section('content')
    <div class="card py-4 px-4">
        <h3>Create user</h3>

        <div>
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class=" input-group-static col-5 mb-4">
                        <label>Image</label>
                        <input type="file" accept="image/*" name="image" id="image-input" class="form-control">

                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <img src="" id="show-image" alt="" style="max-width: 100px">
                    </div>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control">

                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                    @error('email')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Password</label>
                    <input type="text" value="{{ old('password') }}" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Phone</label>
                    <input type="text" value="{{ old('phone')}}" name="phone" class="form-control">
                    @error('phone')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Address</label>
                    <input type="text" value="{{ old('address') }}" name="address" class="form-control">
                    @error('address')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Gender</label>
                    <input type="text" value="{{ old('gender') }}" name="gender" class="form-control">
                    @error('gender')
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
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image-input").change(function() {
                readURL(this);
                console.log("aa")
            });
        })
    </script>
@endsection