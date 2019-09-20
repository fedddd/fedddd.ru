@extends('template')

@section('post')
	            <h3>Дневник</h3>
<div id="app">				
<router-view check-login={{$checkLogin}}></router-view>
</div>	
	
@stop		
				
				
				
			

