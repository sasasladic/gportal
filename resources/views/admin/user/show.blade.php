@extends('admin.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row" style="background-color: #fdfdfd;">
            <div class="col-sm-10" style="margin-bottom: 15px;"><h1
                        style="margin-left: 75px;">{{$data->first_name . ' ' . $data->last_name}} <a
                            href="{{route('user.edit',$data->id)}}"><i class="material-icons"
                                                                       style="font-size: 30px;">edit</i></a>
                </h1></div>
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                         alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>
                <br>


                <div class="panel panel-default">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                    <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
                </div>


                <ul class="list-group">
                    <li class="list-group-item text-muted" style="background-color: #f5f5f5;">Activity <i
                                class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Status</strong></span> @if( $data->status ==1  )
                            <span style="color: darkgreen">Active</span> @else
                            <span style="color: darkred">Not active</span> @endif</li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Servers</strong></span> {{count($servers)}}
                    </li>
                    <li class="list-group-item text-right"><span
                                class="pull-left"><strong>Tickets</strong></span> {{count($data->tickets)}}
                    </li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
                                class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>

            </div><!--/col-3-->
            <div class="col-sm-9" style="background:#fdfdfd ">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Settings</a></li>
                    <li><a data-toggle="tab" href="#servers">Servers</a></li>
                    <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name"
                                           placeholder="first name" value="{{$data->first_name}}" disabled>
                                </div>
                            </div>
                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name"
                                           placeholder="last name" value="{{$data->last_name}}" disabled>
                                </div>
                            </div>

                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="enter phone" value="{{$data->email}}" disabled>
                                </div>
                            </div>

                            <div class="formGroup">
                                <div class="col-xs-6">
                                    <label for="username"><h4>Username</h4></label>
                                    <input type="text" class="form-control" name="username"
                                           placeholder="enter mobile number" value="{{$data->username}}" disabled>
                                </div>
                            </div>
                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="role"><h4>Role</h4></label>
                                    <input type="text" class="form-control" name="role"
                                           placeholder="you@email.com" value="{{$data->role->name}}" disabled>
                                </div>
                            </div>
                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="pin_code"><h4>Pin code</h4></label>
                                    <input type="text" class="form-control" name="pin_code" placeholder="somewhere"
                                           value="{{$data->pin_code}}" disabled>
                                </div>
                            </div>
                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="ip_address"><h4>IP address</h4></label>
                                    <input type="text" class="form-control" name="ip_address"
                                           placeholder="password" value="{{$data->ip_address}}" disabled>
                                </div>
                            </div>
                            <div class="formGroup">

                                <div class="col-xs-6">
                                    <label for="country"><h4>Country</h4></label>
                                    <input type="text" class="form-control" name="country"
                                           placeholder="password2" value="{{$data->country}}" disabled>
                                </div>
                            </div>
                            {{--                            <div class="formGroup">--}}
                            {{--                                <div class="col-xs-8">--}}
                            {{--                                    <a href="{{route('user.edit',$data->id)}}"--}}
                            {{--                                       class="btn btn-primary btn-lg m-t-15 waves-effect"--}}
                            {{--                                       style="margin-top: 41px;width: 75px;"><i class="material-icons">edit</i> Edit</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </form>
                    </div>

                    <div class="tab-pane" id="servers">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Game</th>
                                <th>Mod</th>
                                <th>Slots</th>
                                <th>Expires on</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($servers as $server)
                                <tr>
                                    <td>{{ $server->name }}</td>
                                    <td>{{ $server->mod->game->name }}</td>
                                    <td>{{ $server->mod->name }}</td>
                                    <td>{{ $server->slots }}</td>
                                    <td>{{ date("d.m.Y", strtotime($server->expire_on)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div><!--/tab-pane-->
                </div>


            </div>

        </div>

    </div>
@endsection