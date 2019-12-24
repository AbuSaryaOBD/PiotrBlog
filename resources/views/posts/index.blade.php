@extends('layout')

@section('content')
<div class="card-columns">
    @forelse ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('posts.show',['post' => $post->id]) }}">{{ Str::words($post->title, 5) }}</a></h4>
                <p class="card-text">{{ Str::words($post->content, 15) }}</p>
            </div>
            <div class="card-footer text-muted p-1">
                <div class="row m-0">
                    <div class="col-10 pl-1">
                        <small><i class="fas fa-clock mr-1"></i>{{ $post->created_at->diffForHumans() }}</small>
                        @if ($post->comments_count)
                            <small class="mx-1">|</small>
                            <small><i class="fas fa-comment mr-1"></i>{{ $post->comments_count }}</small>
                        @else
                            <small class="mx-1">|</small>
                            <small><i class="fas fa-comment mr-1"></i>0</small>
                        @endif
                    </div>
                    <div class="col-2 p-0">
                        <div class="row m-0 text-center">
                            <div class="col-6 p-0">
                                <a href="{{ route('posts.edit',['post' => $post->id]) }}" class="text-info"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="col-6 p-0">
                                <form action="{{ route('posts.destroy',['post' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="close text-danger p-0 pr-1"><i class="fas fa-times"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No Blog Posts Yet !!!</p><br>
        <p>!....Comming Soon...!</p>
    @endforelse
</div>
@endsection