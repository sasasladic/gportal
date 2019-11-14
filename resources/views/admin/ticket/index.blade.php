@extends('admin.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="data_table display js-exportable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Created at</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->title }}</td>
                <td>{{ $single->user->first_name . ' ' .$single->user->last_name}}</td>
                <td>{{ $single->priority}}</td>
                <td>@if( $single->status)<span style="color: darkgreen">Active</span>@else<span style="color: darkred"> Closed </span>@endif
                </td>
                <td>{{ date("d.m.Y H:i", strtotime($single->created_at)) }}</td>
                <td>
                    <a href="show/{{ $single->id }}"><i class="material-icons">visibility</i></a>
                    {{--                    <a href="remove/{{ $single->id }}"><i class="material-icons">delete_outline</i></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
