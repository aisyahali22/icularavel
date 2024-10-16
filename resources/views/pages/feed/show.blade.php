@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

<h1>Feed List update/show</h1>
<div class="container">
  
  <form action="{{route('feed.update',['feed' => $feed->id])}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="title" >Feed Title</label>
    <input 
      type="text" 
      name="title" 
      id="title"
      class="form-control"
      value="{{old('title',$feed->title)}}"
      
      minlength="3"
      maxlength="300">
  </div>
  <div class="form-group">
    <label for="title">Description</label>
    <textarea 
    class="form-control" 
    name="description"
    id="description" 
    cols="30"
    rows="10">{{old('decription',$feed->description)}}</textarea>
  </div><br>

  <button type="submit" class="btn btn-primary">Update Feed</button>
</form>
</div>


@endsection