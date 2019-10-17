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
            <th>Game</th>
            <th>Description</th>
            <th>Link</th>
            <th>Default map</th>
            <th>Created at</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->name }}</td>
                <td>{{ $single->game->name }}</td>
                <td>{{ $single->description  }}</td>
                <td>{{ $single->link }}</td>
                <td>{{ $single->default_map }}</td>
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
