@extends('admin.master')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row" style="background-color: #fdfdfd;">
            <div class="col-md-12 text-center" style="margin-bottom: 10px;">
                <h1>
                    Order information
                </h1>
            </div>
            <div class="col-sm-3" style="    margin-top: 60px;margin-bottom: 30px;"><!--left column-->

                <div class="panel panel-default">
                    <div class="panel-heading">Order number</div>
                    <div class="panel-body">
                        <span class="pull-left"><strong>No</strong></span>
                        <span class="pull-right" style="color: darkgreen">{{$data->order_no}} </span>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Order status</div>
                    <div class="panel-body">
                        <span class="pull-left"><strong>Status</strong></span>
                        <span class="pull-right" style="color: #ffb020">{{$data->order_status->name}}</span>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Created at</div>
                    <div class="panel-body">
                        <span class="pull-left"><strong>Date & time</strong></span>
                        <span class="pull-right" style="color: darkgreen">{{date("d.m.Y H:i:s", strtotime($data->created_at))}}</span>
                    </div>
                </div>

            </div><!--/col-3-->
            <div class="col-sm-9" style="background:#fdfdfd ">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#payment-info">Payment information</a></li>
                    <li><a data-toggle="tab" href="#game-info">Game information</a></li>
                    <li><a data-toggle="tab" href="#payment-slip">Payment slip</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="payment-info">
                        <div class="form">
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name"
                                               placeholder="First name" value="{{$data->user->first_name}}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name"
                                               placeholder="Last name" value="{{$data->user->last_name}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="username"><h4>Username</h4></label>
                                        <input type="text" class="form-control" name="username"
                                               placeholder="Username" value="{{$data->user->username}}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="payment_method"><h4>Payment method</h4></label>
                                        <input type="text" class="form-control" name="payment_method"
                                               placeholder="Payment method" value="{{$data->payment_method}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="username"><h4>Price without discount</h4></label>
                                        <input type="text" class="form-control" name="price_without_discount"
                                               value="{{$data->price_without_discount}} €" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="payment_method"><h4>Discount</h4></label>
                                        <input type="text" class="form-control" name="discount"
                                               value="{{$data->discount}} %" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="username"><h4>Final price</h4></label>
                                        <input type="text" class="form-control" name="price"
                                               value="{{$data->price}} €" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="game-info">
                        <div class="form">
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="game_name"><h4>Game</h4></label>
                                        <input type="text" class="form-control" name="game_name"
                                               placeholder="Game name" value="{{$data->game->name}}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name"><h4>Location</h4></label>
                                        <input type="text" class="form-control" name="last_name"
                                               placeholder="Last name" value="{{$data->location->city}}, {{$data->location->country}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="formGroup">
                                    <div class="col-md-6">
                                        <label for="mod_name"><h4>Mod</h4></label>
                                        <input type="text" class="form-control" name="mod_name"
                                               placeholder="Mod name" value="{{$data->mod->name}}" disabled>
                                    </div>
                                    @if($data->slots)
                                    <div class="col-md-6">
                                        <label for="slots"><h4>Number of slots</h4></label>
                                        <input type="text" class="form-control" name="slots"
                                               placeholder="Slots" value="{{$data->slots}}" disabled>
                                    </div>
                                    @else
                                    <div class="col-md-6">
                                        <label for="gigabytes"><h4>Gigabytes</h4></label>
                                        <input type="text" class="form-control" name="gigabytes"
                                               placeholder="Gigabytes" value="{{$data->gigabytes}}" disabled>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="payment-slip" style="margin-top: 15px;">
                        <div class="form">
                            <div class="row text-center">
                                @isset($data->image->path)
                                    <img src="{{$data->image->path}}"
                                         alt="{{$data->image->alt}}">
                                @endisset
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
