@extends('layouts.master')

@section('content')
	<div class="centered">
	

	@foreach($actions as $action)
		<a href="{{route('niceaction',['action'=>lcfirst($action->name)])}}"> {{$action->name}}</a>
	@endforeach
		<br>
		<br>

		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		@endif


		<form action="{{ route('add_action')}} " method="post">
			
			<label for="name">Action</label>
			<input type="text" name="name" />
			<label for="name">Niceness</label>
			<input type="text" name="niceness" />
			<button type="submit">Submit</button>
			<input type="hidden" value="{{ Session::token() }}" name="_token" />
		</form>

		<br>
		<br>
		<br>

		<ul>
			@foreach($log_actions as $log_action)
				<li>
					{{$log_action->nice_action->name}}
					@foreach($log_action->nice_action->categories as $category)
						{{ $category->name}}
					@endforeach
				</li>
			@endforeach
		</ul>
	</div>
@endsection