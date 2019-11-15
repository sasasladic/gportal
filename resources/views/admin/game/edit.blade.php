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
                    Edit game: {{$data->name}} {{ $data->short_name }}
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('game.update',$data->id) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="row clearfix">
                        <div class="col-md-12" style="text-align: center">
                            <div class="input-group">
                                <img src="{{$data->image->path}}" alt="{{$data->image->alt}}"
                                     style="height: 400px;width: 800px;">
                                <h6>Upload a different photo...</h6>
                                <input id="image_media" name="image" type="file"
                                       accept=".jfif,.jpg,.jpeg,.png,.gif" class="text-center center-block file-upload">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">videogame_asset</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="First name"
                                           autocomplete="off" value="{{ $data->name }}">
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
                                    <input type="text" name="short_name" class="form-control" placeholder="Last name"
                                           autocomplete="off" value="{{ $data->short_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Slot per mont</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">view_week</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="short_name" class="form-control" placeholder="Last name"
                                           autocomplete="off"
                                           value="{{ $data->slot_per_month }} €">
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
