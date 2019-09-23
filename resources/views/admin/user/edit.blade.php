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
                    Edit user {{$data->first_name}} {{ $data->last_name }}
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('user.update',$data->id) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="row ">
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>First name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" autocomplete="off"
                                   value="{{ $data->first_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Last name</label>
                                    <input type="text" id="lastname" name="last_name" class="form-control" autocomplete="off"
                                   value="{{ $data->last_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">

                            <div class="form-group">
                                <div class="form-line">
                                    <label>Username</label>
                                    <input type="text" id="username" name="username" class="form-control" autocomplete="off"
                                   value="{{ $data->username }}">
                                </div>
                             </div>
                        </div>
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                       autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Pin code</label>
                                    <input type="text" id="pin_code" name="pin_code" class="form-control" autocomplete="off"
                                   value="{{ $data->pin_code }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Country</label>
                                    <input type="text" id="country" name="country" class="form-control" autocomplete="off"
                                           value="{{ $data->country }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Ip address</label>
                                    <input type="text" id="ip_address" name="ip_address" class="form-control" autocomplete="off"
                                   value="{{ $data->ip_address }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-10">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control show-tick" data-live-search="true">
                                        <option disabled value="">Select role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                    @if($role->id == $data->role_id) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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