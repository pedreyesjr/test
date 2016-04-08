@extends('layouts.master')

@section('content')
<div class="centered">
	<a href="{{route('home')}}">Back</a>
	<h1>I HUG {{$name === null ?'you':$name}}	</h1>
</div>
@endsection