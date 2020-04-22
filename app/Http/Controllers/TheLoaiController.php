<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\TheLoai;
use Illuminate\Support\Str;
//de su dung model TheLoai

class TheLoaiController extends Controller
{
    public function getList(){
    	//lay danh sach tat ca the loai
    	$theloai=TheLoai::all();
    	return view('admin.TheLoai.list',['theloai'=>$theloai]);//Truyen du lieu sang theloai.list

    }
     public function getAdd(){
    	return view('admin.TheLoai.add');
    }
    //Ham nay nhan co so du lieu ve va luu vao trong CSDL
    //Truyen request de nhap du lieu
    public function postAdd(Request $request)
    {
        //echo $request->Ten;
        $this->validate($request,
            [
                'Ten'=> 'required|min:3|max:100'//Dieu kien
            ],
            [
                'Ten.required'=>'Ban chua nhap ten the loai',
                'Ten.min'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
                'Ten.max'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
                //Tra ve khi co loi
            ]);
        $theloai=new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau= Str::slug($request->Ten , '-');
        //Chuyen ten co dau thanh ko dau
        //echo Str::slug($request->Ten);
        $theloai->save();

        return redirect('admin/TheLoai/add')->with('Thong Bao','Them Thanh Cong');

    }
     public function getEdit($id)
     {
        $theloai=TheLoai::find($id);
        return view('admin.TheLoai.edit',['theloai'=>$theloai]);

    	
    }
     public function postEdit(Request $request,$id){
        $theloai=TheLoai::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|unique:theloai,Ten|min:3|max:100',
            ],
            [
                'Ten.required'=>'Ban chua nhap ten The loai',
                'Ten.unique'=>'Ten The loai da ton tai',
                'Ten.min'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
                'Ten.max'=>'Ten the loai phai co do dai tu 3 den 100 ky tu',
            ]);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau=Str::slug($request->Ten,'-');
        $theloai->save();
        return redirect('admin/TheLoai/edit/'.$id)->with('Thong Bao','Edit thanh cong');
        
    }
    public function getDelete($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/TheLoai/list')->with('Thong Bao','Ban da xoa Thanh Cong');
    }
}
