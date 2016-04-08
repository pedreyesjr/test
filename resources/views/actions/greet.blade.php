@extends('layouts.master')

@section('content')
<div class="centered">
	<a href="{{route('home')}}">Back</a>
	<h1>I GREET {{$name === null ?'you':$name}}	</h1>
</div>
@endsection