@extends('admin.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="data_table display js-exportable">
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
            <th>Country</th>
            <th>Pin Code</th>
            <th>Role</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->first_name }}</td>
                <td>{{ $single->last_name }}</td>
                <td>{{ $single->username }}</td>
                <td>{{ $single->email }}</td>
                <td>@if( $single->status ==1  )<a href="#"><i class="material-icons">check</i></a>@else
                        <a href="#"><i class="material-icons">close</i></a>@endif</td>
                <td>{{ $single->country }}</td>
                <td>{{ $single->pin_code }}</td>
                <td>{{ $single->role['name'] }}</td>
                <td>
                    <a href="edit/{{ $single->id}}"><i class="material-icons">edit</i></a>
                    <a href="remove/{{ $single->id }}"><i class="material-icons">delete_outline</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{ $data->appends(request()->except('page'))->links() }}--}}
@endsection
