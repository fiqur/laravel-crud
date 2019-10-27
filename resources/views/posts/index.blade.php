@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

  <div class="card uper">

  <div class="card-header">
    Content Post <a class="btn btn-primary" href="{{ route('posts.create')}}" style="margin-left:200px !important;  text-align: left !important;"> +Add post</a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table" style="margin-left:auto;margin-right:auto;">
    <thead>
        <tr>
          <td>ID</td>
          <td>Post Title</td>
          <td>Post Body</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-warning">Edit</a></td>
            <td><a class="btn btn-success" href="{{ route('posts.show',$post->id) }}">Show</a></td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection