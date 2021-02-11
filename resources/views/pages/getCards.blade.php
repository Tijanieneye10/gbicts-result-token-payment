@extends('layouts.main')
@section('pagename', 'Buy Tokens')
@section('pagedesc', 'Get Tokens for result checking')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Token Details</h5>
        </div>
        <div class="card-body vendor-table">
            <div class="col-md-12">
                <x-status type="success" />
                <form action="{{ route('tokens.store') }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <div class="col-md-6">
                            <input type="number" class="form-control mb-1" name="token"
                                placeholder="Specify Number of Tokens">
                            @error('token')
                            <x-alert name="token" :message="$message" />
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
