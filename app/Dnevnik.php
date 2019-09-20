<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dnevnik extends Model
{
protected $table = 'dnevnik';
public $timestamps = false;


public function getDay($day,$month,$year)
{

$dayData = self::where(['day'=> $day,'month'=>$month,'year'=>$year])->get();

return $dayData;
}


public function setDay($day,$month,$year,$msg)
{ 
 $newday= self::where(['day'=> $day,'month'=>$month,'year'=>$year]);
 $checkDay=$newday->get();
 if($checkDay->isEmpty()){
   $newday= new self;
   $newday->day=$day;
   $newday->month=$month;
   $newday->year=$year;
   $newday->msg=$msg;
   $newday->save();
   $result[0]="insert";  
 }else{
   $newday->update(['day'=> $day,'month'=>$month,'year'=>$year,'msg'=>$msg]);
   $result[0]="update";
 }
 return $result;
}


public function getMonth($month,$year)
{
  $post = self::where(['month'=>$month,'year'=>$year])->get(); 
  return $post;
}










public function getPost($id)
{

$post = self::where('id_dnevnik', $id)->get();

return $post;
}


public function getTema($tema)
{
 $post = self::join('menu', 'tema', '=', 'section_id' )->where('code', $tema)->get();
 return $post;
}



public function getPodtema($podtema)
{
 $post = self::join('menu', 'podtema', '=', 'section_id' )->where('code', $podtema)->get();
 return $post;
}




public function getAllPost(){
 $post = self::all();


return $post;
}

   
}
