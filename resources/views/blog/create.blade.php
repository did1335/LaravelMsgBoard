@extends('layouts/app')
    
@section('content')
<div class="container">
    <div class="col-md-6">
        <form action="{{ url('message')}}" method="POST">
            {{csrf_field()}}
            <label for="title">title</label><br>
            <input type="text" name="title"/><br>
            @if ($errors->has('title'))
                <div style="color:red;">{{ $errors->first('title') }}</div>
            @endif
            <label for="article">article</label><br>
            <textarea cols="30" rows="5" name="article"></textarea><br>
            @if ($errors->has('article'))
                <div style="color:red;">{{ $errors->first('article') }}</div>
            @endif
            <button type="submit" class="btn btn-primary">submit</button>
    </form>
    </div>
</div>
@endsection