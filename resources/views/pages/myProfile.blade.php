@extends('layouts.main')
@section('pagename', 'My Profile')
@section('pagedesc', 'View Profile')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Profile</h5>
        </div>
        <div class="card-body vendor-table">
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Fullname: <strong>{{ auth()->user()->fullname }}</strong></li>
                    <li class="list-group-item">Email: <strong>{{ auth()->user()->email }}</strong></li>
                    <li class="list-group-item">School: <strong>{{ auth()->user()->school }}</strong></li>
                    <li class="list-group-item">Amount charged: <strong>{{ auth()->user()->price }}</strong></li>
                    <li class="list-group-item">Phone Number: <strong>{{ auth()->user()->phone }}</strong></li>
                    <li class="list-group-item">Role: <strong>{{ auth()->user()->role }}</strong></li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
