<?php
/**
*Контроллер главной страницы сайта
*/

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;






class MyloginController extends Controller
{

   public function login(){
   

		return view('login.login');


	}   
	
	
	
}
