<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Fedddd.ru</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        
    </head>
    <body>
       
<div id="app">				
<example></example>				
</div>				
 				
<div class = "container-fluid">
    <div class="header row">
	<h1>Fedddd.ru</h1>
	<span>Web-технологии.</span>

	</div>
	
	



@if(isset($menu))
  @include('menu')	
@endif	
				







    
  
	@yield('index')
	
	<div class="row">
	  <div class="left col-xs-2">
	    
	  </div>
	  
	  <div class="center col-xs-8">
	  
	            @yield('post')
				
	

	  </div> 
	  
	  <div class="right col-xs-2">
	    
	  </div> 
	  
	  
    </div>
	
	
	
    <div class="footer row">
	© fedddd.ru 2017
	</div>
	
</div>

				
				
				
				
				
				
				
				
				
				
 <script src="/js/app.js"></script>      
        
    </body>
</html>
