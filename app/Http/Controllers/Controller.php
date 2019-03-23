<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Menu;


class Controller extends BaseController
{
 use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
public function insertMenu( )
{
 $Menu = new Menu;
 $menu = $Menu->getMenu();
						
foreach($menu as $value){
 $parent_id = $value->parent_id; 
		
  if($parent_id == 0) {
  
  	$array[] =[
  	'section_id' => $value->section_id,
  	'title' => $value->title,
  	'path'  => $value->path,
  	'description' => $value->description
  	];
  
  }else{
  	$parent_id=$parent_id-2;
  	
  	$array[$parent_id]['parent'][] = [
  	    'section_id' => $value->section_id,
  		'title' => $value->title,
  		'path'  => $value->path,
  		'description' => $value->description
  	  ];
  }

}
		
 $menu = $array;
 return $menu;
}
		
}
