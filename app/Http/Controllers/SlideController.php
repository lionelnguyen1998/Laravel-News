<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;



class SlideController extends Controller
{
	 public function getList(){
	 	$slide=Slide::all();
	 	return view('admin.Slide.list',['slide'=>$slide]);
    	
    }
    public function getAdd(){
    	return view('admin.Slide.add');

    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'Ten'=>'required',
    			'NoiDung'=>'required',
    		],
    		[
    			'Ten.required'=>'Ban chua nhap ten',
    			'NoiDung.required'=>'Ban chua nhap noi dung',
    		]);
    	$slide=new Slide;
    	$slide->Ten=$request->Ten;
    	$slide->NoiDung=$request->NoiDung;
    	if($request->has('link'))
    		$slide->link=$request->link;
    	if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            //Lay ten hinh ra
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg')
            {
                return redirect('admin/Slide/add')->with('Loi','Ban Chi duoc chon file co duoi la jpg, png, jpeg');
            }
            $name=$file->getClientOriginalName();

            $Hinh="Tra".$name;
            //  while(file_exists("upload/hinhanh/slide/".$Hinh)){
            //      $Hinh=str_random(4)."_".$name;
            //  }
             //echo $Hinh;
             //Luu hinh lai
             $file->move("upload/hinhanh/slide",$Hinh);
             $slide->Hinh=$Hinh;
        }

        else
        {
            //ko up file len thi rong
         $slide->Hinh=""; 
        }
     	$slide ->save();
     	return redirect('admin/Slide/add')->with('Thong Bao','Ban da them thanh cong');
    }
   
    public function getEdit($id){
    	$slide =Slide::find($id);
        return view('admin.Slide.edit',['slide'=>$slide]);

    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
            [
                'Ten'=>'required',
                'NoiDung'=>'required',
                'Hinh'=>'mimes:jpeg,jpg,png',
            ],
            [
                'Ten.required'=>'Ban chua nhap ten',
                'NoiDung.required'=>'Ban chua nhap noi dung',
                'Hinh.mimes'=>'Hinh anh ban khong dung dinh'
            ]);
        $slide=Slide::find($id);
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if($request->has('link'))
            $slide->link=$request->link;
        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
           $name=$file->getClientOriginalName();

            $Hinh="Tra".$name;
            //  while(file_exists("upload/hinhanh/slide/".$Hinh)){
            //      $Hinh=str_random(4)."_".$name;
            //  }
            //  echo $Hinh;
            //  Luu hinh lai
            // $duoi=$file->getClientOriginalExtension();
            // if($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg')
            // {
            //     return redirect('admin/Slide/edit/'.$id)->with('Loi','Ban Chi duoc chon file co duoi la jpg, png, jpeg');
            // }
             $file->move("upload/hinhanh/slide",$Hinh);
             $slide->Hinh=$Hinh;
        }

        else
        {
            //ko up file len thi rong
         $slide->Hinh=""; 
        }
        $slide ->save();
        return redirect('admin/Slide/edit/'.$id)->with('Thong Bao','Edit thanh cong');
    }
    public function getDelete($id){
    	$slide=Slide::find($id);
        $slide->delete();
        return redirect('admin/Slide/list')->with('Thong Bao','Ban da xoa thanh cong');
    }

}
