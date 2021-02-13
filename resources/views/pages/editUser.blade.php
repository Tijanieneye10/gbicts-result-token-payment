@extends('layouts.main')
@section('pagename', 'Edit User')
@section('pagedesc', 'Edit User Information')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit User Information</h5>
        </div>
        <div class="card-body vendor-table">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
                @endif
 
                <form action="{{ route('updateUser', $user) }}" method="POST">
                    @csrf
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-1" name="name" value="{{ $user->name }}">
                            @error('name')
                            <x-alert name="name" :message="$message" />
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                            @error('lastname')
                            <x-alert name="lastname" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                            <x-alert name="email" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="school" value="{{ $user->school }}">
                            @error('school')
                            <x-alert name="school" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price" value="{{ $user->price }}">
                            @error('price')
                            <x-alert name="price" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                            <x-alert name="phone" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select name="role" id="" class="form-control">
                                <option vvalue="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="">Select User Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Standard">Standard</option>
                            </select>
                            @error('role')
                            <x-alert name="role" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
