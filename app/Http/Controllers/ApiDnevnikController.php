<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dnevnik;
use App\Calendar;

class ApiDnevnikController extends Controller
{

public function getData(Calendar $Calendar)
{
 //$post[0]['test']= $Calendar->getThisMonth();
 $data[0]['days']= $Calendar->getBlockDays();
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
