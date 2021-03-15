@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>All section</h2>
                </div>

            </div>
        </div>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->body}}</p>
                            <a class="float-right">{{count($post->comments)}} Comments</a>
                            @if($canEdit)
                                <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn-info btn float-left">Edit this post</a>
                            @endif
                        </div>
                        <div class="card-footer text-muted">
                            <ul class="list-unstyled">
                                @foreach($post->comments->take(5) as $comment)
                                    <li><a class="text-danger">{{$comment->user->name}}</a>: {{$comment->body}}</li>
                                @endforeach
                            </ul>
                            @if(count($post->comments) > 5)
                                <a href="{{url('posts/'.$post->id)}}" class="btn btn-primary">Show More</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
