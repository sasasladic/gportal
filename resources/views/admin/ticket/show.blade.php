@extends('admin.master')
@section('content')

    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1" id="login">
                <div class="page-header"
                     style="border-bottom: 1px solid #adadad;display: flex;justify-content: space-between;align-items: center;">
                    <h2 class="reviews">{{$data->title}}</h2>
                    <span class="created_at" style="padding-top: 25px;">{{$data->created_at}}</span>
                </div>
                @foreach($data->comments as $comment)
                    <div class="comment-tabs">
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-login">
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="avatar img-circle"
                                                 src="{{$comment->user->image->path}}"
                                                 alt="{{$comment->user->image->alt}}"
                                                 style="height: 128px;width: 134px;">
                                        </a>
                                        <div class="media-body" style="font-size: 16px;">
                                            <div class="well well-lg">
                                            <span
                                                style="color: #555;font-weight: bold;float: right;font-size: 14px;">{{$comment->created_at}}</span>
                                                <p class="media-heading text-uppercase reviews"
                                                   style="font-size: 18.5px;">
                                                    {{$data->user->first_name . ' ' . $data->user->last_name }}</p>
                                                <p class="media-comment" style="margin-top: 20px;">
                                                    {!! $comment->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="support-form">
                    <form action="{{route('comment.add', $data->id)}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10" style="margin-left: 138px;">
                                <textarea class="form-control" name="content" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10" style="margin-left: 137px;">
                                <button type="submit" class="btn btn-success btn-lg m-t-15 waves-effect"
                                        style="margin-bottom: 20px;border-radius:15px;">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
