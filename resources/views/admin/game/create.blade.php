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
                    Create game
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('game.create') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label>Image</label>
                                <input id="image_media" name="image" type="file"
                                       accept=".jfif,.jpg,.jpeg,.png,.gif" class="custom-file-input">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">videogame_asset</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Game name"
                                           autocomplete="off" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Short name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">games</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="short_name" class="form-control"
                                           placeholder="Short name for game"
                                           autocomplete="off" value="{{ old('short_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Slots per month</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">view_week</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="slot_per_month" class="form-control"
                                           placeholder="Price of slot per month"
                                           autocomplete="off" value="{{ old('slot_per_month') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
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
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
