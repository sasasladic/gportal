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
                    Edit user: {{$data->first_name}} {{ $data->last_name }}
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('user.update',$data->id) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="row clearfix">
                        <div class="col-md-12" style="text-align: center">
                            <div class="input-group">
                                <img src="{{$data->image->path}}" alt="{{$data->image->alt}}" class="avatar img-circle
                         img-thumbnail" style="height: 210px;width: 220px;">
                                <h6>Upload a different photo...</h6>
                                <input id="image_media" name="image" type="file"
                                       accept=".jfif,.jpg,.jpeg,.png,.gif" class="text-center center-block file-upload">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>First name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="first_name" class="form-control" placeholder="First name"
                                           autocomplete="off" value="{{ $data->first_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Last name</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last name"
                                           autocomplete="off" value="{{ $data->last_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <b>Email Address</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="email" class="form-control email"
                                           placeholder="Ex: example@example.com" disabled value="{{ $data->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>Password</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                <div class="form-line">
                                    <input type="password" name="password" autocomplete="off" placeholder="********"
                                           class="form-control key">
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
                                           placeholder="Username" value="{{ $data->username }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control show-tick" data-live-search="true">
                                        <option selected value="">Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}"
                                                        @if($role->id == $data->role_id) selected @endif>{{ $role->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Pin code</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">fiber_pin</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="pin_code" class="form-control" autocomplete="off"
                                           placeholder="Ex: XXX-XXXX" value={{$data->pin_code}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <b>IP Address</b>
                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">computer</i>
                                            </span>
                                <div class="form-line">
                                    <input type="text" name="ip_address" class="form-control ip"
                                           placeholder="Ex: 255.255.255.255" value={{$data->ip_address}}>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <b>Country</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">outlined_flag</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" name="country" class="form-control"
                                           placeholder="Ex: Germany, Spain etc." value={{$data->country}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                </form>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('.bootstrap-select').click(function() {
            console.log(123);
        });
    });
</script>

@endsection
