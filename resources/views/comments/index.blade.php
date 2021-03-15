@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All comments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('comments.create') }}"> Create New comment</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>body</th>
            <th>post</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $comment->body}}</td>
            <td>{{ $comment->post->title}}</td>

            <td>
                <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('comments.show',$comment->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('comments.edit',$comment->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>



@endsection
