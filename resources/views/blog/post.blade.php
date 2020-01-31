@extends('layouts/app')
    
@section('content')
<div class="container">
    <div class="row">
            <div class="col">
            <a class="btn btn-success" href="{{ route('form.create') }}" role="button">新增</a>
            <table class="table table-hover">
                <tr>
                    <th>編號</th>
                    <th>標題</th>
                    <th>發文者</th>
                    <th colspan="3">功能</th>
                </tr>
                @if (isset($messages))
                    @foreach ($messages as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user }}</td>
                            <td>
                                <a class="btn btn-warning" href="post/{{$post->id}}" role="button">查看</a></td>
                                @if($post->user === $auth)
                                    <td><a class="btn btn-info" href="post/{{$post->id}}/edit" role="button">編輯</a></td>
                                    <td><form action="post/{{ $post->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" value="刪除"/>      
                                    </form>
                                    </td>
                                @endif
                        </tr>
                    @endforeach
                @endif
            </table>
            <div class="float-md-right">{{ $messages->links() }}</div>
        </div>
    </div>
    
</div>    
@endsection