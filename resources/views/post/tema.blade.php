@extends('template')

@section('post')
	            @foreach($post as $value)
				
				<a href="{{$url}}/{{$value->id}}">{{$value->name}}</a>
				<br>
				
				@endforeach
	
@stop		
				
				
				
			

