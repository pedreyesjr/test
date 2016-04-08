@extends('layouts.master')

@section('content')
<div class="centered">
	<a href="{{route('home')}}">Back</a>

	@if(count($errors) > 0)
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	@endif

	<h1>I {{ $action }} {{ $name }}</h1>
</div>
@endsection