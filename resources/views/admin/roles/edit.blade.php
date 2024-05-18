@extends('admin.layouts.app')
@section('title', 'Edit Roles '.$role->name)
@section('content')
    <div class="card py-4 px-4">
        <h3>Edit role</h3>
        <div>
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') ?? $role->name}}" name="name" class="form-control">

                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Display Name</label>
                    <input type="text" value="{{ old('display_name') ?? $role->display_name}}" name="display_name" class="form-control">
                    @error('display_name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label name="group" class="ms-0">Group</label>
                    <select name="group" class="form-control" value={{ $role->group }}>
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>

                    @error('group')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Permission</label>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-5">
                                <h4>{{ $groupName }}</h4>
                                <div>
                                    @foreach ($permission as $item)
                                        <div class="form-check">
                                            <input
                                                id="customCheck-{{ $item->id }}"
                                                class="form-check-input"
                                                name="permission_ids[]"
                                                type="checkbox"
                                                value="{{ $item->id }}"
                                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                            >
                                            <label class="custom-control-label" for="customCheck-{{ $item->id }}">{{ $item->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-submit btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
