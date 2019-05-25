<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class InsertController extends Controller
{
    public function insertPost(Post $post, Request $request)
	{

	  if ($request->isMethod ('post')){
	  
	  $this->validate($request, ['name' => 'required'] );
	  	  	  
	  $post->name = $request->input('name');
	  if($request->input('msg'))$post->msg = $request->input('msg');
	  if($request->input('cod'))$post->cod = $request->input('cod');
	  $post->tema = $request->input('tema');
	  $post->podtema = $request->input('podtema');
	 
	  $post->save();
	  
	  return redirect('/');
	}
	  $menu = $this->insertMenu();
	 //вставка значения selected в массив меню  
	  foreach($menu as $key => $value){	 
	    $menu[$key]['selected'] = "";
	    if($post->tema == $value['section_id']){
	      $menu[$key]['selected'] = "selected";
	    }
	    if(isset($value['parent'])){
	       foreach($value['parent'] as $item => $parent){
		     $menu[$key]['parent'][$item]['selected'] = "";
		     if($post->podtema == $parent['section_id']){
	              $menu[$key]['parent'][$item]['selected'] = "selected";
	         }
		   }	  
	    }
	 } 
	 	  
	 return view('login.insert', ['menu'=>$menu]);	  
	}
	
	
	
	
	 public function updatePost(Post $post, Request $request, $id)
	 {
	
	 $post = $post->find($id);
	
	 if ($request->isMethod ('post')){
	 
	   $this->validate($request, ['name' => 'required']);
	   	   	   
	   $post->name = $request->input('name');

	   if($request->input('msg'))$post->msg = $request->input('msg');
	   if($request->input('cod'))$post->cod = $request->input('cod');

	   $post->tema = $request->input('tema');
	   $post->podtema = $request->input('podtema');

	   $post->save();
	   
	   return redirect('/');
	 }
	  $menu = $this->insertMenu();
	  
	 
	//вставка значения selected в массив меню  
	 foreach($menu as $key => $value){
	 
	   $menu[$key]['selected'] = "";
	   if($post->tema == $value['section_id']){
	     $menu[$key]['selected'] = "selected";
	   }
	   if(isset($value['parent'])){
	      foreach($value['parent'] as $item => $parent){
		    $menu[$key]['parent'][$item]['selected'] = "";
		       if($post->podtema == $parent['section_id']){
	              $menu[$key]['parent'][$item]['selected'] = "selected";
	           }
		  }	  
	   }
	 }
	  
	   return view('login.insert', ['menu'=>$menu, 'post'=>$post]);
	   
}
}
