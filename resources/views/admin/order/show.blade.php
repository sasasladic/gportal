@extends('admin.master')

@section('content')
    <div class="col-xs-12 col-sm-12">
        <div class="card profile-card">
            <div class="card card-about-me">
                <div class="body">
                    <h2>Order by {{$data->user->first_name . ' ' . $data->user->last_name}}</h2>
                    <hr>
                    <ul>
                        <li>
                            <div class="title" style="font-size: 15px;">
                                <i class="material-icons">toc</i> Server: {{$data->server->name}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">games</i>
                                Game
                            </div>
                            <div class="content" style="font-size: 15px;">
                                {{$data->server->mod->game->name}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">usb</i>
                                Mod
                            </div>
                            <div class="content">
                                {{$data->server->mod->name}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">edit</i>
                                Status
                            </div>
                            <div class="content">
                                {{$data->order_status->name}}
                            </div>
                        </li>
                        <li>
                            <div class="title">
                                <i class="material-icons">money</i> Price: 1999 {{config('constants.currency')}}
                            </div>
                            <div class="content">
                                <span style="margin-right: 100px">Payment slip</span>
                                <img src="{{$data->image->path}}" width="420" height="250" alt="{{$data->image->alt}}">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
