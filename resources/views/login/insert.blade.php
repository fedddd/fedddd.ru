@extends('template')

@section('post')

<form method="POST">
{{ csrf_field() }}


  <fieldset class="form-group">
    <label for="name">Название</label>
    <input type="text" class="form-control" id="name" name="name" value = "{!!$post->name or ''!!}" placeholder="название статьи">
  </fieldset>
  
  
 <!--выбор темы --> 
 <fieldset class="form-group">
 <label for="tema">Тема</label>
 <select class="form-control" id="tema" name="tema">
  @foreach($menu as $value)
        <option  {{$value['selected']}} value="{{$value['section_id']}}">{{$value['title']}}</option>
 @endforeach  
 </select> 
  </fieldset>
 
 
 <!--выбор подтемы --> 
 <fieldset class="form-group">
 <label for="podtema">Подтема</label>
 <select class="form-control" id="podtema" name="podtema">
 <option value="0">Не выбрана</option>
  @foreach($menu as $value)
    @if(isset($value['parent']))
   	  @foreach($value['parent'] as $item)
         <option  {{$item['selected']}}  value="{{$item['section_id']}}">{{$item['title']}}</option>
	  @endforeach
	@endif	
 @endforeach  
 </select> 
  </fieldset>

  

  
  <fieldset class="form-group">
    <label for="msg">Содержание</label>
    <textarea class="form-control" id="msg" name="msg">{!!$post->msg or ''!!}</textarea>
  </fieldset>
  <fieldset class="form-group">
  
  <fieldset class="form-group">
    <label for="msg">Код</label>
    <textarea class="form-control" id="cod" name="cod">{!!$post->cod or ''!!}</textarea>
  </fieldset>
  <fieldset class="form-group">

   <input type="submit" value="Отправить">
  </fieldset>

</form>
@stop		
				
				
				
			

