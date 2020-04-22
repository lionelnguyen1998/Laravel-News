<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
     protected $table='theloai';
     //Tao lien ket giua cac bang
     //The Loai lien ket voi Loai Tin thong qua khoa ngaoi idTheLoai ( theo lien ket 1_nhieu)
     //Mot the loai co nhieu loai tin
     public function loaitin(){
     	return $this->hasMany('App\LoaiTin','idTheLoai','id');
     }
     //Mot the loai co nhieu tin tuc, nhung o day duoc lien ket thong qua LoaiTin
     public function tintuc(){
     	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
     }
}
