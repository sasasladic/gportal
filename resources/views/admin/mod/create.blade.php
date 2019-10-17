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
                    Create mod
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('mod.create') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Mod name"
                                           autocomplete="off" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Game</b>
                            <div class="input-group">
                            <span class="input-group-addon">
                                                <i class="material-icons">games</i>
                                            </span>
                                <div class="form-line">
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
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <b>Description</b>
                            <div class="input-group">
                                <div class="form-line">
                                    <textarea name="description"
                                              class="form-control"
                                              style="height: 250px;">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Default map</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">map</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="default_map" class="form-control" autocomplete="off"
                                           placeholder="Default map" value="{{ old('default_map') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Link</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">link</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="link" class="form-control" placeholder="Link"
                                           autocomplete="off" value="{{ old('link') }}">
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