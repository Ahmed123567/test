@extends('layouts.app')


@section('content')

<div class="container mt-5">
    <form method="POST" action={{route('posts.update' , ['post' => $post->id])}} >
       @csrf
       <input type="text" name="title" class="form-control" placeholder="enter title" value={{$post->title}}>
        @if($errors->has('title'))
            <div style="color: red">--->{{$errors->first('title')}}<---</div>
        @endif
       <textarea name="content" class="form-control mt-2" placeholder="enter content">{{$post->content}}</textarea>
        @if($errors->has('content'))
            <div style="color: red">--->{{$errors->first('content')}}<---</div>
        @endif
       <select name="user_id" class="form-control mt-2">
           @foreach($users as $user)
           <option value={{$user->id}}>{{$user->name}}</option>
           @endforeach
       </select>
        @if($errors->has('user_id'))
            <div style='color:red;'>--->{{$errors->first('user_id')}}<---</div>
        @endif  
       <button class="btn btn-primary mt-2" >Edit</button>
   </form>
</div>

@endsection