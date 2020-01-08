@extends('layout')

@section('content')
    <h1>
        {{ $post->title }}
        @badge(['show' => now()->diffInMinutes($post->created_at) < 30])
            Brand New
        @endbadge
    </h1>

    <p>{{ $post->content }}</p>

    @updated(['date' => $post->created_at, 'name' => $post->user->name])
    @endupdated

    <h4>Comments</h4>
    @forelse ($post->comments as $comment)
        <div class="media mb-3">
            <i class="fa fa-user fa-2x bg-secondary rounded p-2 mr-2 mt-1" style="border: #bbb 2px solid;"></i>
            <div class="media-body">
                <small class="text-muted">
                    @updated(['date' => $comment->created_at])
                    @endupdated
                </small>

                <p>{{ $comment->content }}</p>
            </div>
        </div>
    @empty
        <p>No Coments yet!</p>
    @endforelse
@endsection