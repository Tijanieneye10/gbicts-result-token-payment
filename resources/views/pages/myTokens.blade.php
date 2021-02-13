@extends('layouts.main')
@section('pagename', 'My Tokens')
@section('pagedesc', 'All my tokens')
@section('tags')
<!-- Datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
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
                        <th>Status</th>
                        <th>Purchased</th>
                        <th>Mark as Sold</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($myTokens as $token)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $token->cards }}</td>
                        <td>{{ $token->used_by ?? 'Not used' }}</td>
                        <td>{{ $token->sold ?? 'Not sold yet' }}</td>
                        <td>{{ $token->created_at->diffForHumans() }}</td>
                        @can('updateSoldTime', $token)
                        <td><a href="{{ route('tokens.show', $token) }}"><span class="badge badge-primary"> Mark as
                                    Sold</span></a></td>
                        @endcan
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
