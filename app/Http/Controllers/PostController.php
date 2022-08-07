<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


use Illuminate\Http\Request;
use PDO;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(1); //id=1
        // $post = Post::where("is_published", 1)->first();
        // dd($post->title);

        // $posts = Post::all(); // all
        // $categories = Category::all();
        $category = Category::find(1);

        $posts = Post::where('category_id', $category->id)->get();

        dd($posts);
        // dd($posts);
        // return view('post.index', compact('posts'));
    }

    public function create()
    {

        return view('post.create');

        // dd('protect');

        // $arPosts = [
        //     [
        //         'title' => 'second title 2',
        //         'content' => 'second content 2',
        //         'image' => 'image1 .png',
        //         'likes' => 10,
        //         'is_published' => 1,
        //     ],
        //     [
        //         'title' =>  'third title',
        //         'content' => 'third content',
        //         'image' => 'image2.png',
        //         'likes' => 50,
        //         'is_published' => 1,
        //     ],
        // ];

        // foreach ($arPosts as $value) {
        //     // dd($value);
        //     Post::create($value);
        // }

        // dd('created');
    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {

        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post->id);

        // dd('protect');

        // $post = Post::find(1);

        // $post->update([
        //     'title' =>  'updated',
        //     'content' => 'updated',
        //     'image' => 'updated.png',
        //     'likes' => 50,
        //     'is_published' => 1,
        // ]);
        // dd('updated');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('post.index');
    }

    public function delete()
    {
        dd('protect');

        $post = Post::find(1);
        $post->delete();

        dd('delete');
    }

    public function restore()
    {
        dd('protect');

        $post = Post::withTrashed()->find(1);
        $post->restore();

        dd('restore');
    }

    public function firstOrCreate()
    {

        $anotherPost = [
            'title' =>  'some title',
            'content' => 'some content',
            'image' => 'some.png',
            'likes' => 50,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate(
            [
                'title' =>  'some title' //проверка на уникальный title
            ],
            $anotherPost
        );

        dump($post->id);

        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' =>  'some title',
            'content' => 'some content',
            'image' => 'some.png',
            'likes' => 50,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate(
            [
                'title' =>  'some title 2' //проверка на уникальный title
            ],
            $anotherPost
        );

        dump($post->id);

        dd('finished');
    }
}

// ----------------
// debug
// ----------------
// $str = 'string';
// dd($str);
// ----------------