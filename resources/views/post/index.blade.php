
    @extends('template')

@section('index')
     
    <!-- Карусель -->
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Индикаторы для карусели -->
      <ol class="carousel-indicators">
        <!-- Перейти к 0 слайду карусели с помощью соответствующего индекса data-slide-to="0" -->
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <!-- Перейти к 1 слайду карусели с помощью соответствующего индекса data-slide-to="1" -->
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <!-- Перейти к 2 слайду карусели с помощью соответствующего индекса data-slide-to="2" -->
        <li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		
      </ol>   
      <!-- Слайды карусели -->
      <div class="carousel-inner">
        <!-- Слайды создаются с помощью контейнера с классом item, внутри которого помещается содержимое слайда -->
        <div class="active item">
          <div class="carousel-caption">
		  <img class="img1" src="img/background/html.png">
            <h3>Язык разметки</h3>
            <p>На нем пишутся сайты</p>
          </div>
		  
        </div>
        <!-- Слайд №2 css -->
        <div class="item">
          
          <div class="carousel-caption">
		  <img class="img1" src="img/background/css.png">
		    <h3>Таблица стилей</h3>
            <p>Стили для всего сайта.</p>
          </div>
        </div>
        <!-- Слайд №3 js -->
        <div class="item">
          
          <div class="carousel-caption">
		  <img class="img1" src="img/background/js.png">
            <h3>Начинается программирование</h3>
            <p>Придает динамику.</p>
          </div>
        </div>
		<!-- Слайд №4 php -->
        <div class="item">
          
          <div class="carousel-caption">
		  <img class="img1"  src="img/background/php.png">
            <h3>Работает на сервере</h3>
            <p>То что недоступно пользователю.</p>
          </div>
        </div>
		<!-- Слайд №5 sql -->
        <div class="item">
        
          <div class="carousel-caption">
		  <img class="img1"  src="img/background/mysql.png">
            <h3>База данных</h3>
            <p>Тут хранится вся информация.</p>
          </div>
        </div>
      </div>
      <!-- Навигация для карусели -->
      <!-- Кнопка, осуществляющая переход на предыдущий слайд с помощью атрибута data-slide="prev" -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <!-- Кнопка, осуществляющая переход на следующий слайд с помощью атрибута data-slide="next" -->
      <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

@stop





	
	
	
	
	