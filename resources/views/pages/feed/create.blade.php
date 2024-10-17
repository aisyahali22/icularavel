@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

<h1>Feed List </h1>
<div class="container">
  
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('feed.store') }}" method="POST">
    @csrf
    
  <div class="mb-3">
    <label for="title" >Feed Title</label>
    <input 
      type="text" 
      name="title" 
      id="title"
      {{-- required --}}
      class="form-control"
      {{-- minlength="3"
      maxlength="300" --}}
      >
  </div>
  <div class="form-group">
    <label for="title">Description</label>
    <textarea 
    class="form-control" 
    name="description"
    id="description" 
    {{-- required --}}
    cols="30"
    rows="10"></textarea>
  </div><br>

  <button type="submit" class="btn btn-primary">Save Feed</button>
</form>
</div>


@endsection