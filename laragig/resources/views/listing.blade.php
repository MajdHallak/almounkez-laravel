@extends('layout')

@section('content')
<h1> Listing {{ $id }}</h1>

<h2> {{$listing['title']}} </h2>
<p> {{$listing['description']}} </p>
@endsection