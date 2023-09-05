<?php

namespace App\Http\Controllers;

use App\Models\EPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{

    public function store(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'body' => ['required', 'string', 'max:255', 'min:5'],
            'slug' => ['required', 'string', 'max:255', 'min:5'],
            'url_image' => ['required', 'string'],
            'author_id' => ['required', 'string'],
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validation->errors(),
            ], 422);
        }

        // get fields validated only
        $fieldsValidated = $validation->validated();

        // create post
        $post = EPost::create($fieldsValidated);

        return response()->json(
            [
                'message' => 'Post created successfully',
                'post' => $post,
            ],
            201
        );
    }

    public function index()
    {
        $posts = EPost::all();

        return $posts;
    }
}
