<!-- Верхнее меню -->
	<div class="topmenu row">
	
	
<nav class="navbar navbar-default">

 <div class="navbar-header">
 <a class="navbar-brand" href="http://{{$_SERVER['SERVER_NAME']}}">Главная</a>
 </div>
 

<ul class="nav navbar-nav">

@foreach($menu as $value)


@if(!isset($value['parent']))
<li>
  <a href="{{$value['path']}}">{{$value['title']}}</a>
</li>
@else
<li class="dropdown dropdown-custom">
  <a href="{{$value['path']}}" class="dropdown-toggle" data-toggle="dropdown">{{$value['title']}} <span class="caret"></span></a>
  
  
 <div class="dropdown-menu">
	 <ul class="list-unstyled" role="menu">
	 
	 
		 @foreach($value['parent'] as $item)
		 <li>
		 <a href="{{$item['path']}}">{{$item['title']}}</a>
		 <p class="small">{{$item['description']}}</p>
		 </li>
			 @if(!$loop->last)
			 <li class="divider"></li>
			 @endif
		 @endforeach
	 
	 
	 </ul>
</div> 
  
</li>


@endif

@endforeach
				

</ul>


</nav>	
	
	
</div>