@extends('layouts/app')
    
@section('content')
<div class="container">
    <div class="col-md-6">
        <form method="POST" action="{{ url('post/'.$post->id) }}">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <label for="title">title</label><br>
        <input type="text" name="title" value="{{ $post->title }}"/><br>
            <label for="content">content</label><br>
            <textarea cols="30" rows="5" name="content">{{ $post->content }}</textarea><br>
            <button type="submit" class="btn btn-primary">submit</button>
    </form>
    </div>
</div>
@endsection