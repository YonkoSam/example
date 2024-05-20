<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index', ['posts' => Post::with('employer')->latest()->simplePaginate(5)]);
    }

    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);

    }

    public function list()
    {

        return view('posts.list', [
            'posts' => Post::where('employer_id', '=', Auth::user()->employer->id)
                ->latest()
                ->simplePaginate()
        ]);

    }

    public function store()
    {

        $post = request()->validate(
            [
                'title' => ['required', 'min:3'],
                'description' => 'required',
            ]);


        $post = Post::create([

            'title' => request('title'),
            'description' => request('description'),
            'employer_id' => Auth::user()->employer->id

        ]);


        $this->image_upload($post);
        return back()->with('success', 'Post created successfully.');
    }

    public function create()
    {

        return view('posts.create');

    }

    public function image_upload(Post $post): void
    {
        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $imageName);
            $image = new Image();
            $image->post_id = $post->id;
            $image->path = $imageName;
            $image->save();
        }
    }

    public function edit(Post $post)
    {

        return view('posts.edit', ['post' => $post]);

    }

    public function update(Post $post)
    {

        request()->validate(
            [
                'title' => ['required', 'min:3'],
                'description' => 'required',
            ]);
        $post->update([
            'title' => request('title'),
            'description' => request('description'),
        ]);

        $this->image_upload($post);

        return redirect('/posts/'.$post->id);
    }

    public function destroy(post $post)
    {

        $post->delete();
        if ($post->images()->first() != null) {

            File::delete(public_path("images/".$post->images()->first()->path));
            $post->images()->first()->delete();
        }

        return redirect('/posts');
    }


}
