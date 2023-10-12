<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        foreach ($posts as $post){
            dump($post->title);
        }
        dd('end');
    }

    public function create(){
        $postsArr = [
          [
              'title' => 'title of post from phpstorm',
              'content' => 'some interesting content',
              'image' => 'imageblabla.jpg',
              'likes' => 20,
              'is_published' => 1,
          ],
          [
              'title' => 'another title of post from phpstorm',
              'content' => 'another some interesting content',
              'image' => 'another imageblabla.jpg',
              'likes' => 50,
              'is_published' => 1,
          ],
        ];

        foreach ($postsArr as $item){
            Post::create($item);
        }

        dd('created');
    }

    public function update(){
        $post = Post::find(5);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1000,
            'is_published' => 0,
        ]);
        dd('updated');
    }

    public function delete(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'some post from phpstorm',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 5000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some post from phpstorm'
        ], [
            'title' => 'some post from phpstorm',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 5000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');

    }

        public function updateOrCreate(){
            $anotherPost = [
                'title' => 'updateOrCreate post from phpstorm',
                'content' => 'updateOrCreate content',
                'image' => 'updateOrCreate imageblabla.jpg',
                'likes' => 5000,
                'is_published' => 1,
            ];

            $post = Post::updateOrCreate([
                'title' => 'some post from not phpstorm',
            ],[
                'title' => 'some post from not phpstorm',
                'content' => 'is not update updateOrCreate content',
                'image' => 'is not update updateOrCreate imageblabla.jpg',
                'likes' => 5000,
                'is_published' => 1,
            ]);
            dump($post->content);
        dd('2222');

        }


}
