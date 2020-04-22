<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table='loaitin';
    //Mot loai tin thuoc ve mot the loai
    public function theloai(){
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
    //Mot loai tin co nhieu tin tuc
    public function tintuc(){
    	return $this->hasMany('App\TinTuc','idTinTuc','id');
    }
}
