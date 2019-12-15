@extends('layout')

@section('content')
<div class="card-columns">
    @forelse ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->title }}</a></h4>
                <p class="card-text">{{ $post->content }}</p>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit',['post' => $post->id]) }}" class="btn btn-outline-primary btn-sm btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('posts.destroy',['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-block">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 text-muted">
                <small><i class="far fa-clock mr-1"></i>{{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p>No Blog Posts Yet !!!</p><br>
        <p>!....Comming Soon...!</p>
    @endforelse
</div>
@endsection