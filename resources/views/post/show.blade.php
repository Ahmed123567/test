
@extends('layouts.app')

@section('content')
    
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
              {{$post->title}}
            </div>
            <div class="card-body">
             <h5>{{$post->content}}</h5>

             {{-- <img src={{storage_path('app/docs/'. $post->image)}} width='300' height="300" alt=""> --}}
             <img src={{asset('images/'.$post->image)}} width='300' height="200" alt="">

            </div>
          </div>

          <form action={{route('comments.store')}} method="post">
            @csrf
            <input type="hidden" value={{$post->id}} name="commentable_id">
            <input type="hidden" value='App\Models\Post' name="commentable_type">
            <textarea name="body" rows="5" class="form-control my-3" placeholder="Add comment"></textarea>
            
            <select name="commented_by" class="form-control mb-3">
              @foreach($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
              @endforeach
            </select>
            
            <button class="btn btn-success">Add comment</button>
          </form>

          @foreach($post->comments as $comment)

          <div class="card mt-3" style="width: 50%;">
            <div class="card-header">
              {{$comment->commentedBy->name}}
            </div>
            <div class="card-body">
              {{$comment->body}}
            </div>
          </div>
          @endforeach

          <a href={{route('posts.index')}} style="text-decoration: none; display:block;" class="mt-3"><----Goto index</a>
    </div>



@endsection    




