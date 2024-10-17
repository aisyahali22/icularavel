@extends('layouts.main')

@section('title','AI')

@section('content')

<div class="container mt-5">


<form>
  <div class="mb-3">  

    @csrf
    @method('GET')

    <label for="title" class="form-label">Title</label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Enter your title">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>
   <button type="submit" class="btn btn-primary">Generate</button>
</form>

<h1>AI Generated Content</h1>
    
        @if(isset($data) && isset($data['candidates']))
            <div>
                <h2>Generated Response:</h2>
                @foreach($data['candidates'] as $item)
                    @if(isset($item['content']['parts']))
                        @foreach($item['content']['parts'] as $part)
                            <div>
                                {!! $part['text'] !!} <!-- Render HTML directly -->
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @elseif(isset($error))
            <div>
                <h2>Error:</h2>
                <p>{{ $error }}</p>
            </div>
        @else
            <p>No content generated.</p>
        @endif

</div>
@endsection