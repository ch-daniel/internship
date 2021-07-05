<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  public function store() {

    $attributes = request()->validate([
        'title' => 'required|max:255',
        'body' => 'required|max:1024',
    ]);

    $post = new Post();
    $post->author = auth()->user()->name;
    $post->title = $attributes['title'];
    $post->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $attributes['title'])));
    $post->body = $attributes['body'];

    $post->save();

//    ddd($post);

    return redirect('/');
  }
}
