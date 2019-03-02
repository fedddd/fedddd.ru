@extends('template')

@section('post')
	            @foreach($post as $value)
				
				<h3 class="name">{{$value->name}}</h3>
				
				<div class="msg col-xs-6">
				{!!$value->msg!!}
				</div>
				
				<div class="cod col-xs-6">
				{{$value->cod}}
				</div>
				
				@endforeach
	
@stop		
				
				
				
			

