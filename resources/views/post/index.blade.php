@extends('layouts.app')
@section('content')

<div class="container">
<a class="btn btn-success mt-5" href={{route('posts.create')}}> Create Post </a>

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">posted by</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">contorl</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->content}}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{$post->updated_at}}</td>
        <td>
          <a class="btn btn-primary" href={{route('posts.show', ['post' => $post->id])}} >view</a>
          <a class="btn btn-success" href={{route('posts.edit', ['post'=> $post->id])}} >edit</a>

            <a class="btn btn-danger " onclick="return confirm('Are you sure')" href={{route('posts.delete', ['post' => $post->id])}}>delete</a>
         
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex pagination page-item">
    {{ $posts->onEachSide(5)->links() }}
  </div>

</div>
@endsection