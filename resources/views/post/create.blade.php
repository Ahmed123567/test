@extends('layouts.app')

@section('content')

<div class="container mt-5">
     <form method="POST" action={{route('posts.store')}} enctype="multipart/form-data" >
        @csrf
        <input type="text" name="title" class="form-control" placeholder="enter title">
        @if($errors->has('title'))
           <div style="color: red">--->{{$errors->first('title')}}<---</div>
        @endif
        <input type="text" name="content" class="form-control mt-2" placeholder="enter content">
        @if($errors->has('content'))
            <div style='color:red;'>--->{{$errors->first('content')}}<---</div>
        @endif
        
        <select name="user_id" class="form-control mt-2">
            @foreach($users as $user)
            <option value={{$user->id}}>{{$user->name}}</option>
            @endforeach
        </select>
        
        @if($errors->has('user_id'))
            <div style='color:red;'>--->{{$errors->first('user_id')}}<---</div>
        @endif        

        <input type="file" name="image"  class="form-control mt-3">

        <button class="btn btn-primary mt-2" >submit</button>
    </form>
</div>

@endsection

