@extends('layouts.main')
@section('pagename', 'My Tokens')
@section('pagedesc', 'All my tokens')
@section('tags')
<!-- Datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>My Tokens</h5>
        </div>
        <div class="card-body vendor-table">
            @if ($myTokens->count())
            <table class="display table-responsive" id="basic-1" style="width:100% !important">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Tokens </th>
                        <th>Used by</th>
                        <th>Purchased On</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($myTokens as $token)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $token->cards }}</td>
                        <td>{{ $token->used_by ?? 'Still Available' }}</td>
                        <td>{{ $token->created_at->diffForHumans() }}</td>
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
<script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables/custom-basic.js') }}"></script>
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
