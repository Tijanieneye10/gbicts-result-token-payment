@extends('layouts.main')
@section('pagename', 'View Tokens')
@section('pagedesc', 'All Tokens')
@section('tags')
<!-- Datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Token Details</h5>
        </div>
        <div class="card-body vendor-table">
            <div class="col-md-6">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
                @endif
                <form action="{{ route('storeToken') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Enter Number to generate"
                            aria-label="Enter Number to generate" aria-describedby="basic-addon2" name="tokenNumber">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Generate Token</button>
                        </div>
                    </div>
                </form>
            </div>


            @if ($getTokens->count())
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Token </th>
                        <th>User</th>
                        <th>Time</th>
                        <th>Term</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getTokens as $token)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $token->card_no }}</td>
                        <td>{{ $token->card_user ?? 'Null' }}</td>
                        <td>{{ $token->card_time ?? 'Null' }}</td>
                        <td>{{ $token->term ?? 'Null' }}</td>
                        <td>{{ $token->session ?? 'Null' }}</td>
                        <td>{{ $token->status ?? 'Null' }}</td>
                        <td>
                            <form action="{{ route('deleteToken', $token) }}" method="POST" class="pull-left pr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger"> <i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/custom-basic.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{-- Show alert if deleted successfully --}}
@if(session()->has('deleted'))
<script>
    Swal.fire(
            'Success!',
            'Deleted successfully',
            'success'
            )
</script>
@endif

@endpush
