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
                    Edit machine: {{$data->name}}
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('machine.update',$data->id) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Machine name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" autocomplete="off"
                                           placeholder="Name" value="{{ $data->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Location</label>
                                    <select name="location_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}"
                                                    @if($location->id == $data->location_id) selected @endif>{{ $location->city }}, {{ $location->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>IP Address</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">computer</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="ip_address" class="form-control ip"
                                           placeholder="Ex: 255.255.255.255" value="{{ $data->ip_address }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>SSH port</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">outlined_flag</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="ssh_port" class="form-control"
                                           placeholder=":port" value="{{ $data->ssh_port }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Root username</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">computer</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="root_username" class="form-control ip"
                                           placeholder="Root username" value="{{ $data->root_username }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Root password</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">outlined_flag</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="root_password" class="form-control"
                                           placeholder="********" value="{{ $data->root_password }}">
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
