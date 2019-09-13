<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dnevnik;
use App\Calendar;

class ApiDnevnikController extends Controller
{

public function getData(Calendar $Calendar, Request $request)
{
   $month = $request->route('month');
   $year= $request->route('year');

 $data[0]['days']= $Calendar->getBlockDays($month,$year);
 $data[0]['monthText']=$Calendar->getMonthByNumber($month);
 $data[0]['month']=$month;
 $data[0]['year']= $year;
 return $data[0];
}


public function getDay(Dnevnik $Dnevnik, Request $request)
{
 $data = $request->route('data');
 $data = explode("-",$data);
 $day = $data[0];
 $month = $data[1];
 $year =	$data[2];			
 $post = $Dnevnik->getDay($day,$month,$year);
 if(isset($post[0])) $post=$post[0];
 return $post;
}


public function Post(Post $Post, Request $request )
{
   
 $id = $request->route('id');				
 $post = $Post->getPost($id);		
 $menu = $this->insertMenu();
 		
 return view('post.post', ['post'=>$post,'menu'=>$menu ]);
}   
	
							
	
public function Tema(Post $Post, Request $request )
{
   
 $url = $request->url();
 $tema = $request->route('tema');	   
 $post = $Post->getTema($tema);		
 $menu = $this->insertMenu();
 
 return view('post.tema', ['post'=>$post,'menu'=>$menu, 'url' => $url  ]);

}  
				
public function Podtema(Post $Post, Request $request )
{
   
 $url = $request->url();
 $podtema = $request->route('podtema');
 $post = $Post->getPodtema($podtema);
 $menu = $this->insertMenu();
 		
 return view('post.tema', ['post'=>$post,'menu'=>$menu, 'url' => $url  ]);
} 
	
	
public function allPost(Post $Post, Request $request )
{
	
 $url = $request->url();
 $id = $request->route('id');		
 $post = $Post->getAllPost();
 $menu = $this->insertMenu();

 return view('post.tema', ['post'=>$post,'menu'=>$menu, 'url' => $url  ]);
}   
		
}
