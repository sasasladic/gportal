@extends('admin.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card">
            <div class="header">
                <h2>
                    Create server
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('server.create') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Client</label>
                                    <select name="user_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select user</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"
                                                    @if($user->id == old('user_id')) selected @endif>{{ $user->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Machine</label>
                                    <select name="machine_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select machine</option>
                                        @foreach($machines as $machine)
                                            <option value="{{ $machine->id }}"
                                                    @if($machine->id == old('machine_id')) selected @endif>{{ $machine->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Game</label>
                                    <select name="game_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select game</option>
                                        @foreach($games as $game)
                                            <option value="{{ $game->id }}"
                                                    @if($game->id == old('game_id')) selected @endif>{{ $game->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Mod</label>
                                    <select name="mod_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select game</option>
                                        @foreach($mods as $mod)
                                            <option value="{{ $mod->id }}"
                                                    @if($mod->id == old('mod_id')) selected @endif>{{ $mod->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <b>Server Name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">desktop_windows</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Server name"
                                           autocomplete="off" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Port</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">golf_course</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="port" class="form-control" placeholder=":port"
                                           autocomplete="off" value="{{ old('port') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Slots</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">view_week</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="slots" class="form-control" placeholder="Number of slots"
                                           autocomplete="off" value="{{ old('slots') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <b>Username</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" autocomplete="off"
                                           placeholder="Username" value="{{ old('username') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <b>Password</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">fiber_pin</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="password" class="form-control" autocomplete="off"
                                           placeholder="*****" value="{{ old('password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Expires on</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                <div class="form-line">
                                    <input type="date" name="expire_on" class="form-control"
                                           autocomplete="off"
                                           placeholder="Choose date" value="{{ old('expire_on') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection