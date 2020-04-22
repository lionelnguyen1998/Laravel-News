<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;//Co moi truy cap den model The loai duoc
use Illuminate\Support\Str;
class LoaiTinController extends Controller
{
    public function getList(){
    	$loaitin=LoaiTin::all();
    	return view('admin.LoaiTin.list',['loaitin'=>$loaitin]);
    }
    public function getAdd(){
        $theloai=TheLoai::all();
    return view('admin.LoaiTin.add',['theloai'=>$theloai]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            "Ten"=>"required|unique:loaitin|max:100|min:3",
            "TheLoai"=>"required",
        ],
        [
            "Ten.required"=>"Ban chua nhap loai tin nao",
            "Ten.unique"=>"Loai Tin da ton tai",
            "Ten.min"=>"Ten loai tin phai lon hon 3 va nho hon 100 chu",
            "Ten.max"=>"Ten loai tin phai lon hon 3 va nho hon 100 chu",
            "TheLoai.required"=>"Ban chua chon the loai",
        ]);
        $loaitin=new LoaiTin;
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=Str::slug($request->Ten,'-');
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('admin/LoaiTin/add')->with('Thong Bao','Them Loai Tin thanh cong');

    }
     public function getEdit($id){
        $loaitin=LoaiTin::find($id);
        $theloai=TheLoai::all();
    return view('admin.LoaiTin.edit',['loaitin'=>$loaitin,'theloai'=>$theloai]);

    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
        [
            "Ten"=>"required|unique:loaitin,Ten|max:100|min:3",
            "TheLoai"=>"required",
        ],
        [
            "Ten.required"=>"Ban chua nhap loai tin nao",
            "Ten.unique"=>"Loai Tin da ton tai",
            "Ten.min"=>"Ten loai tin phai lon hon 3 va nho hon 100 chu",
            "Ten.max"=>"Ten loai tin phai lon hon 3 va nho hon 100 chu",
            "TheLoai.required"=>"Ban chua chon the loai",
        ]);
        $loaitin=LoaiTin::find($id);
        $loaitin->Ten=$request->Ten;
        $loaitin->TenKhongDau=Str::slug($request->Ten,'-');
        $loaitin->idTheLoai=$request->TheLoai;
        $loaitin->save();
        return redirect('admin/LoaiTin/edit/'.$id)->with('Thong Bao','Edit thanh cong');//chua duoc ne
    }
    public function getDelete(){

    }
}
