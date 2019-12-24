@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    @if ((new Carbon\Carbon())->diffInMinutes($post->created_at) < 5)
        <strong>New!</strong>
    @else
        Old!
    @endif

    <h4>Comments</h4>
    @forelse ($post->comments as $comment)
        <div class="media mb-3">
            <i class="fa fa-user fa-2x bg-secondary rounded p-2 mr-2 mt-1" style="border: #bbb 2px solid;"></i>
            <div class="media-body">
                <small class="text-muted"> {{ $comment->created_at->diffForHumans() }}</small>
                <p>{{ $comment->content }}</p>
            </div>
        </div>
    @empty
        <p>No Coments yet!</p>
    @endforelse
@endsection