<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
// use Carbon\Carbon;

use  App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
   
    public function index(){

        $posts = Post::paginate(5);  
    
        return view('post.index', ['posts' => $posts]);
    }

    public function show($post){

        $post = Post::find($post);

        if($post == null){
            return view('error.404');
        };

        $users = User::all();
        
        return view('post.show', ['post' => $post, 'users' => $users]);
    }


    public function create(){
        $users = User::all();
        return view('post.create',['users' => $users]);
    }
    
    
    public function store(StorePostRequest $data){

        $imageName = time().'-'.$data->file('image')->getClientOriginalName();

        // $data->file('image')->storeAs('docs', $imageName);

        $data->image->move(public_path('images') , $imageName);

        $data = $data->all();

        // dd($data['title']);

        Post::create([
            'title' => $data['title'],
            'content'=>$data['content'],
            'user_id' => $data['user_id'],
            'image' => $imageName
        ]);
        
        

        return redirect()->route('posts.index');
    }

    public function edit($post){

        $post = Post::find($post);

        if($post == null){
            return view('error.404');
        };

        $users = User::all();

        return view('post.edit', [
            
            'post' => $post,
            'users' => $users
        ]);

    }


    public function update(StorePostRequest $info ,$post){

        $data = $info->all();

        $post = Post::find($post);
        
        if($post == null){
            return view('error.404');
        };

        $post = Post::find($post)
        
        ->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $data['user_id']
        ]);


        return redirect()->route('posts.index');
    }

    public function delete($post){
        
        $post = Post::find($post);

        $post->delete();



        return redirect()->route('posts.index');
    
    }

}
