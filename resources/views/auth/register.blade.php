@extends('layouts.main')
@section('pagename', 'Create User')
@section('pagedesc', 'Add a new user')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Register User</h5>
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
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-1" name="name" placeholder="Enter Firstname">
                            @error('name')
                                    <x-alert name="name" :message="$message" />
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname">
                            @error('lastname')
                                     <x-alert name="lastname" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                            @error('email')
                                    <x-alert name="email" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="school" placeholder="Enter School Name">
                            @error('school')
                                    <x-alert name="school" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price" placeholder="Enter Token Price for School">
                            @error('price')
                                    <x-alert name="price" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number">
                            @error('phone')
                                    <x-alert name="phone" :message="$message" />
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select name="role" id="" class="form-control">
                                <option value="">Select User Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Standard">Standard</option>
                            </select>
                            @error('role')
                                    <x-alert name="role" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register User</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection



