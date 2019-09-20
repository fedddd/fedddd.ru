<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DnevnikController extends Controller
{

public function getDay()
{  $checkLogin=\Auth::user()->name;
	$menu = $this->insertMenu();
	return view('dnevnik.dnevnik', ['menu'=>$menu,'checkLogin'=>$checkLogin ]);
}
  
		
}
