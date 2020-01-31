<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use App\models\Message;
class BlogController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->name;
        $messages = DB::table('message')->simplePaginate(5);
        return view('blog.post')->with('title', 'My Blog')->with('messages', $messages)->with('auth', $auth);
    }

    public function create()
    {
        return view('blog.create')->with('title', '新增文章');

    }

    public function store()
    {
        $messages = new message;
        $messages->title = Input::get('title');
        $messages->creator = Auth::user()->account;
        $messages->article = Input::get('article');
        $messages->save();
        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('blog.show')->with('title', 'create')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('blog.edit')->with('title', 'edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
