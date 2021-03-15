@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New post</h2>
            </div>
        </div>
    </div>

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


    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="title Name">
                </div>
                <div class="form-group">
                    <strong>body:</strong>
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
            </div>

        </div>
        <div class="row">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">save</button>
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>

            </div>
        </div>

    </form>
</div>
@endsection
