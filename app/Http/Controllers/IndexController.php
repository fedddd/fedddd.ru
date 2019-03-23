<?php
/**
*Контроллер главной страницы сайта
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{

 public function index()
 {
   $menu = $this->insertMenu();
   
   return view('post.index', ['menu'=>$menu ]);
 }   
	
}
