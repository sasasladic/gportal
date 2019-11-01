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
                <div class="comment-tabs">
                    <div class="tab-content">
                        <div class="tab-pane active" id="comments-login">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle"
                                             src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg"
                                             alt="profile">
                                    </a>
                                    <div class="media-body" style="font-size: 14px;">
                                        <div class="well well-lg">
                                            <span
                                                style="color: #555;font-weight: bold;float: right;font-size: 14px;">{{$data->created_at}}</span>
                                            <p class="media-heading text-uppercase reviews" style="font-size: 18.5px;">
                                                {{$data->user->first_name . ' ' . $data->user->last_name }}</p>
                                            <p class="media-comment" style="margin-top: 20px;">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled it to make a type specimen book. It has survived not only five
                                                centuries, but also the leap into electronic typesetting, remaining
                                                essentially unchanged. It was popularised in the 1960s with the release
                                                of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions
                                                of Lorem Ipsum.

                                                Why do we use it?
                                                It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                letters, as opposed to using 'Content here, content here', making it
                                                look like readable English. Many desktop publishing packages and web
                                                page editors now use Lorem Ipsum as their default model text, and a
                                                search for 'lorem ipsum' will uncover many web sites still in their
                                                infancy. Various versions have evolved over the years, sometimes by
                                                accident, sometimes on purpose (injected humour and the like).
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="support-form">
                    <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10" style="margin-left: 138px;">
                                <textarea class="form-control" name="addComment" id="addComment" rows="7"
                                          disabled></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-lg m-t-15 waves-effect"
                                        style="margin-bottom: 10px;border-radius:15px ">
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
