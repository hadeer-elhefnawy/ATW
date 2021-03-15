@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->body}}</p>
                <a class="float-right">{{count($post->comments)}} Comments</a>
            </div>
            <div class="card-footer text-muted">
                <ul class="list-unstyled">
                    @foreach($post->comments as $comment)
                        <li><a class="text-danger">{{$comment->user->name}}</a>: {{$comment->body}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
