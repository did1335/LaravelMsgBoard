@extends('layouts/app')
    
@section('content')
<div class="container">
    <div class="col">
        @if (isset($post))
            <h1>{{ $post->title}}</h1>
            <p>{{ $post->content }}</p>
        @endif
        <a href="{{ URL::previous() }}" class="btn btn-primary">回上一頁</a>
    </div>
</div>
 @endsection