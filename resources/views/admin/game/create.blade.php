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
                    </div>
                    <div class="row clearfix" id="slots_number">
                        <div class="col-md-2">
                            <div class="demo-switch-title"><b>Enable slots</b></div>
                            <div class="input-group">
                            <div class="switch" style="margin-top: 8px;margin-bottom: 9px;">
                                <label>OFF<input type="checkbox" id="checkedSlots" onclick="myFunction()" name="checkedSlots"><span class="lever"></span>ON</label>
                            </div>
                            </div>
                        </div>
                        <div id="slotNumber" style="display: none">
                            <div class="col-md-3">
                                <b>Min slots</b>
                                <div class="input-group">
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i class="material-icons">games</i>--}}
{{--                                            </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="min_slots" name="min_slots" class="form-control"
                                               placeholder="Minimum slots"
                                               autocomplete="off" value="{{ old('min_slots') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Max slots</b>
                                <div class="input-group">
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i class="material-icons">games</i>--}}
{{--                                            </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="max_slots" name="max_slots" class="form-control"
                                               placeholder="Maximum slots"
                                               autocomplete="off" value="{{ old('max_slots') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Increase by</b>
                                <div class="input-group">
                                    {{--   <span class="input-group-addon">--}}
                                    {{--   <i class="material-icons">games</i>--}}
                                    {{--    </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="increase_by" name="increase_by" class="form-control"
                                               placeholder="Increase slots by"
                                               autocomplete="off" value="{{ old('increase_by') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-2">
                            <div class="demo-switch-title"><b>Enable gigabytes</b></div>
                            <div class="input-group">
                                <div class="switch" style="margin-top: 8px;margin-bottom: 9px;">
                                    <label>OFF<input type="checkbox" id="checkedGigabytes" onclick="showGigabytes()" name="checkedGigabytes"><span class="lever"></span>ON</label>
                                </div>
                            </div>
                        </div>
                        <div id="gigabytes" style="display: none">
                            <div class="col-md-3">
                                <b>Min gigabytes</b>
                                <div class="input-group">
                                    {{--                                            <span class="input-group-addon">--}}
                                    {{--                                                <i class="material-icons">games</i>--}}
                                    {{--                                            </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="min_gigabytes" name="min_gigabytes" class="form-control"
                                               placeholder="Min amount"
                                               autocomplete="off" value="{{ old('min_gigabytes') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Max gigabytes</b>
                                <div class="input-group">
                                    {{--                                            <span class="input-group-addon">--}}
                                    {{--                                                <i class="material-icons">games</i>--}}
                                    {{--                                            </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="max_gigabytes" name="max_gigabytes" class="form-control"
                                               placeholder="Max amount"
                                               autocomplete="off" value="{{ old('max_gigabytes') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Increase by</b>
                                <div class="input-group">
                                    {{--   <span class="input-group-addon">--}}
                                    {{--   <i class="material-icons">games</i>--}}
                                    {{--    </span>--}}
                                    <div class="form-line">
                                        <input type="number" id="increase_by" name="increase_by" class="form-control"
                                               placeholder="Increase gigabytes by"
                                               autocomplete="off" value="{{ old('increase_by') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--      LOCATIONS               --}}
                        <div class="row clearfix">
                            <div class="col-md-2">
                                <b>Available Locations</b><br>
                            </div>
                        </div>
                        @foreach($locations as $location)
                            <div class="row clearfix">
                                <div class="col-md-2">
                                    <div class="demo-switch-title"><b>{{$location->city}}, {{$location->country}}</b></div>
                                    <div class="input-group">
                                        <div class="switch" style="margin-top: 8px;margin-bottom: 9px;">
                                            <label>OFF<input type="checkbox" id="checkLocation-{{$location->id}}" name="{{$location->city}}" onclick="showLocation({{$location->id}})"><span class="lever"></span>ON</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="location-{{$location->id}}" style="display: none">
                                    <b>Price per unit (€)</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">games</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="number" step="0.1" id="price_per_slot" name="price-{{$location->city}}" class="form-control"
                                                   placeholder="Price per unit on this location"
                                                   autocomplete="off" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    {{--      END OF LOCATIONS        --}}
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
<script>
    function myFunction() {
        // Get the checkbox
        let checkBox = document.getElementById("checkedSlots");
        // Get the output text
        let slotNumber = document.getElementById("slotNumber");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            slotNumber.style.display = "block";
        } else {
            slotNumber.style.display = "none";
        }
    }

    function showLocation(id) {
        // Get the checkbox
        let checkLocation = document.getElementById("checkLocation-"+id);
        // Get the output text
        let locationPrice = document.getElementById("location-"+id);

        // If the checkbox is checked, display the output text
        if (checkLocation.checked == true){
            locationPrice.style.display = "block";
        } else {
            locationPrice.style.display = "none";
        }
    }

    function showGigabytes() {
        // Get the checkbox
        let checkBox = document.getElementById("checkedGigabytes");
        // Get the output text
        let slotNumber = document.getElementById("gigabytes");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            slotNumber.style.display = "block";
        } else {
            slotNumber.style.display = "none";
        }
    }

</script>

