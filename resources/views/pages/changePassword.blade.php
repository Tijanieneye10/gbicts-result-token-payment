@extends('layouts.main')
@section('pagename', 'Change Password')
@section('pagedesc', 'Change your Password')


@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Change Password</h5>
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
                <form action="{{ route('changePassword') }}" method="POST">
                    @csrf
                    <div class="col-md-6 form-group">
                        <input type="password" class="form-control mb-1" name="oldPassword"
                            placeholder="Enter Old Password">
                        @error('oldPassword')
                        <x-alert name="oldPassword" :message="$message" />
                        @enderror
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                        @error('password')
                        <x-alert name="password" :message="$message" />
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirm Password">
                    </div>
                    <div class="col-md-6 form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
