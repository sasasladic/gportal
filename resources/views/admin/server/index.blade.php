@extends('admin.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="data_table display js-exportable">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Machine</th>
            <th>Server</th>
            <th>Game</th>
            <th>Mod</th>
            <th>Port</th>
            <th>Slots</th>
            <th>Username</th>
            <th>Expires on</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->user->username }}</td>
                <td>{{ $single->name }}</td>
                <td>{{ $single->machine->name }}</td>
                <td>{{ $single->mod->game->name }}</td>
                <td>{{ $single->mod->name }}</td>
                <td>{{ $single->port }}</td>
                <td>{{ $single->slots }}</td>
                <td>{{ $single->username }}</td>
                <td>{{ date("d.m.Y", strtotime($single->expire_on))  }}</td>
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
