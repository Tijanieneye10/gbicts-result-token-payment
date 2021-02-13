@extends('layouts.main')
@section('pagename', 'View Users')
@section('pagedesc', 'All Users')
@section('tags')
<!-- Datatable css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>All Users</h5>
        </div>
        <div class="card-body vendor-table">

            @if ($users->count())
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>School</th>
                        <th>Role</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->school}}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->price }}</td>
                        <td>
                            <form action="{{ route('deleteToken', $user) }}" method="POST" class="pull-left pr-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger"> <i class="fa fa-trash-o"></i></button>
                            </form>
                            <a href="{{ route('editUser', $user) }}"> <button class="text-primary"> <i
                                        class="fa fa-edit"></i></button></a>
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
