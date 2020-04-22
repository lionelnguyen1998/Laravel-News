<?php

namespace App\Http\Controllers;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    public function getList(){
    	$tintuc= TinTuc::orderBy('id','DESC')->get();
    	return view('admin.TinTuc.list',['tintuc'=>$tintuc]);
    }
     public function getAdd(){
     	$theloai=TheLoai::all();
     	$loaitin=LoaiTin::all();
     	//$hinh=TinTuc::find($Hinh);
    	return view('admin.TinTuc.add',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
     public function postAdd(Request $request){
     	$this->validate($request,
     		[
     			'TieuDe'=>'required|min:3|max:200|unique:tintuc,TieuDe',
     			'TomTat'=>'required|min:10|max:300|unique:tintuc,TomTat',
     			
     			//'TheLoai'=>'required|unique:theloai,Ten',
     			//'LoaiTin'=>'required|unique:loaitin,Ten',
                //'Hinh'=>'required',
     		],
     		[
     			'TieuDe.required'=>'Ban chua nhap tieu de',
     			'TieuDe.min'=>'Tieu de co do dai 3 den 100 ky tu',
     			'TieuDe.max'=>'Tieu de co do dai 3 den 100 ky tu',
     			'TieuDe.unique'=>'Tieu de da ton tai',
     			'TomTat.min'=>'Tóm tat co do dai 10 den 300 ky tu',
     			'TomTat.max'=>'Tom tat co do dai 10 den 300 ky tu',
     			'TomTat.required'=>'Ban chua nhap noi dung tom tat',
     			'TomTat.unique'=>'Noi dung tom tat da ton tai',
     			
     			
     			//'TheLoai.required'=>'Ban chua chon The Loai',
     			
     			//'LoaiTin.required'=>'Ban chua chon LoaiTin',
                //'Hinh'=>'Ban chua them hinh anh',
     		]);
     	$tintuc = new TinTuc;
     	$tintuc->TieuDe=$request->TieuDe;
     	$tintuc->TieuDeKhongDau=Str::slug($request->TieuDe);
     	$tintuc->TomTat=$request->TomTat;
     	$tintuc->NoiBat=$request->NoiBat;
     	//$tintuc->idLoaiTin->idTheLoai=$request->TheLoai;
     	$tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->NoiDung=$request->NoiDung;
        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            //Lay ten hinh ra
            $duoi=$file->getClientOriginalName();
            if($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg')
            {
                return redirect('admin/TinTuc/add')->with('Loi','Ban Chi duoc chon file co duoi la jpg, png, jpeg');
            }
            $name=$file->getClientOriginalName();

            $Hinh=str_random(4)."_".$name;
             while(file_exists("upload/hinhanh/tintuc".$Hinh)){
                 $Hinh=str_random(4)."_".$name;
             }
             //echo $Hinh;
             //Luu hinh lai
             $file->move("upload/hinhanh/tintuc",$Hinh);
             $tintuc->Hinh=$Hinh;
        }

        else
        {
            //ko up file len thi rong
         $tintuc->Hinh=""; 
        }
     	$tintuc->save();
     	return redirect('admin/TinTuc/add')->with('Thong Bao','Them Thanh Cong');

    	
    }
     public function getEdit(){
        $tintuc=TinTuc::find($id);
        $loaitin=LoaiTin::all();
        $theloai=TheLoai::all();
        return view('admin.Tintuc.edit',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    	
    }
     public function postEdit(){
    	
    }
     public function getDelete(){
    	
    }
}
