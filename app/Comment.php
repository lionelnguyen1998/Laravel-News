<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    //Mot comment thuoc ve mot tin tuc
    public function tintuc(){
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }
    //Mot comment thuoc ve mot nguoi dung
    public function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
}
