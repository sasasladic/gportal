@extends('admin.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="data_table display js-exportable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>IP address</th>
            <th>SSH port</th>
            <th>SSH username</th>
            <th>Location</th>
            <th>Created at</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->name }}</td>
                <td>{{ $single->ip_address }}</td>
                <td>{{ $single->ssh_port  }}</td>
                <td>{{ $single->ssh_username }}</td>
                <td>{{ $single->location->address }}</td>
                <td>{{ date("d.m.Y H:i", strtotime($single->created_at)) }}</td>
                <td>
                    <a href="edit/{{ $single->id}}"><i class="material-icons">edit</i></a>
                    <a href="remove/{{ $single->id }}"><i class="material-icons">delete_outline</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
