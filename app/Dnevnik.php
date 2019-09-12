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
