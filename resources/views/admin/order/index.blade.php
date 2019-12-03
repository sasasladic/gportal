@extends('admin.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="data_table display js-exportable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Order no</th>
            <th>Client</th>
            <th>Username</th>
            <th>Server</th>
            <th>Status</th>
            <th>Created at</th>
            <th style="width: 90px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $single)
            <tr>
                <td>{{ $single->id }}</td>
                <td>{{ $single->order_no }}</td>
                <td>{{ $single->user->first_name . " " . $single->user->last_name}}</td>
                <td>{{ $single->user->username}}</td>
                <td>{{ $single->server->name }}</td>
                <td>
                    <form id="status_form" class="status_form" action="" method="post" style="width: 70px;">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <select class="changeStatus" name="changeStatus">
                            @foreach($all_statuses as $status)
                                <option class="{{ $single->id }}" value="{{$status->id}}"
                                        @if($single->order_status_id == $status->id) selected @endif>{{$status->name}}</option>
                            @endforeach
                        </select>
                        <input class="projectId" type="hidden" name="projectId" value=""/>
                    </form>
                </td>
                {{--                <td>{{ $single->order_status->name }}</td>--}}
                <td>{{ date("d.m.Y H:i", strtotime($single->created_at)) }}</td>
                <td>
                    <a href="show/{{ $single->id }}"><i class="material-icons">visibility</i></a>
                    <a href="toPDF/{{ $single->id }}"><i class="material-icons">move_to_inbox</i></a>
                    {{--                    <a href="edit/{{ $single->id}}"><i class="material-icons">edit</i></a>--}}
                    {{--                    <a href="remove/{{ $single->id }}"><i class="material-icons">delete_outline</i></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
