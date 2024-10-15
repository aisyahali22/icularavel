@extends('layouts.main')

@section('title', 'home')

@section('content')


@php
$_name = $name ?? "team";
@endphp

@if($_name == "abu")
<p>You are banned</p> 
@else
    <h1> hello {{ $_name }}</h1>
@endif
<button type="button" class="btn btn-info">Tekan</button>

@endsection