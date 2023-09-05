<?php

namespace App\Http\Controllers;

use App\Models\Commnet;
use App\Models\EPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = EPost::all();

        return view('post', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $fieldsValidated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'body' => ['required', 'string', 'max:255', 'min:5'],
            'slug' => ['required', 'string', 'max:255', 'min:5'],
            'url_image' => ['required', 'string', 'max:255', 'min:5'],
            'author_id' => ['required', 'string', 'max:255', 'min:5',],
        ]);

        return $fieldsValidated;
    }

    public function show($slug)
    {
        // search by slug and id
        $post = EPost::with('getComments')->where('slug', $slug)->firstOrFail();


        return view('blog.show', [
            'post' => $post,
            'comment' => new Commnet()
        ]);
    }

    public function addComment(Request $request, EPost $post)
    {
        $comment = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:0'],
            'comment' => ['required', 'string', 'max:255', 'min:0'],
        ]);

        $comment = Commnet::create([
            'name' => $comment['name'],
            'commnet' => $comment['comment'],
            'post_id' => $post->id
        ]);

        $newPost = EPost::with('getComments')->where('id', $post->id)->first();

        session()->flash('status', 'Comment added successfully!');

        return to_route('posts.show', [
            'post' => $newPost,
            'comment' => $comment
        ]);
    }
}
