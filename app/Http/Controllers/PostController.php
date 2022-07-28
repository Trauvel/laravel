<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PDO;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::find(1); //id=1
        // $post = Post::where("is_published", 1)->first();
        // dd($post->title);

        $posts = Post::all(); // all
        return view('posts', compact('posts'));
    }

    public function create()
    {

        dd('protect');

        $arPosts = [
            [
                'title' => 'second title 2',
                'content' => 'second content 2',
                'image' => 'image1 .png',
                'likes' => 10,
                'is_published' => 1,
            ],
            [
                'title' =>  'third title',
                'content' => 'third content',
                'image' => 'image2.png',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($arPosts as $value) {
            // dd($value);
            Post::create($value);
        }

        dd('created');
    }

    public function update()
    {

        dd('protect');

        $post = Post::find(1);

        $post->update([
            'title' =>  'updated',
            'content' => 'updated',
            'image' => 'updated.png',
            'likes' => 50,
            'is_published' => 1,
        ]);
        dd('updated');
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