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

 $blockDays= $Calendar->getBlockDays($month,$year);
 $data[0]['monthText']=$Calendar->getMonthByNumber($month);
 $data[0]['month']=$month;
 $data[0]['year']= $year;

 $blockData = $this->getAllDataByMonth($month,$year);
 foreach($blockDays as $key=>$value){
    $data[0]['days'][$key]['day']=$value;
    $data[0]['days'][$key]['data']='';
   } 
 
 
   foreach($blockDays as $n=>$block){
     foreach($blockData as $key=>$dayData){
       if(!($block<20 && $n>28 || $block>$n) && $dayData['day']==$block ){      
          $data[0]['days'][$n]['data']=$dayData;      
       }
     }
   }
   
 return $data[0];
}


private function getAllDataByMonth($month,$year)
{
  $Dnevnik= new Dnevnik;  
  $data = $Dnevnik->getMonth($month,$year); 
  return $data;
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

public function setDay(Dnevnik $Dnevnik, Request $request)
{
 $data = $request->route('data');
 $data = explode("-",$data);
 $day = $data[0];
 $month = $data[1];
 $year =	$data[2];
 $msg = $request->input('msg');	
 $post = $Dnevnik->setDay($day,$month,$year,$msg);
 if(isset($post[0])) $post=$post[0];
 return $post;
}

  
		
}
