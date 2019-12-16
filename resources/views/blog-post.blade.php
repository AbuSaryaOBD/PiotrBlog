@extends('layout')

@section('content')
    <h1>Blog Post</h1>
    <p>{{ $welcome }}{{ $data['title'] }}</p>
@endsection