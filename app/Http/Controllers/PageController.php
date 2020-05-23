<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;

class PageController extends Controller
{
	function __construct()
	{
		$theloai=TheLoai::all();
		view()->share('theloai',$theloai);//Tat cac cac view deu co bien the loai nay khi goi pagecontroller
		$slide=Slide::all();
		view()->share('slide',$slide);

	}
    function trangchu()
    {
    	
    	return view('page.trangchu');

    }
    function contact()
    {
    	return view('page.contact');
    }
    function loaitin($id)
    {
        $loaitin=LoaiTin::find($id);
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('page.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function tintuc($id)
    {
        $tintuc=TinTuc::find($id);
        $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=TinTuc::where('idLoaiTin',$tintuc->idTinTuc); //tin lien quan thi no nam trong cung mot loai tin
        return view('page.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
    function getlogin()
    {
        return view('page.login');
    }
    function postlogin(Request $request)
    {
        echo $request->email."<br>";
    }
    
}
