@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input class="form-control" type="text" name="content">
            </div>
        </form>
    </div>
</div>

@endsection