<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getList(){
    	$user=User::all();
    	return view('admin.User.list',['user'=>$user]);

    }
    public function getAdd(){
    	return view('admin.User.add');
    	
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'name'=>'required|unique:users,name',
    			'password'=>'required|min:3|max:32',
    			'email'=>'required|unique:users,email|email',
    			'level'=>'required',
    			'password_confirmation'=>'required|same:password',
    		],
    		[
    			'name.required'=>'Ban chua nhap ten',
    			'name.unique'=>'Ten nguoi dung da ton tai',
    			'email.required'=>'Chua nhap email',
    			'email.unique'=>'Email da ton tai',
    			'email.email'=>'Ban chua nhap dung dinh dang email',
    			'password.required'=>'Ban chua nhap password',
    			'password.min'=>'password tu 3 den 32 ky tu',
    			'password.max'=>'password tu 3 den 32 ky tu',
    			'password_confirmation.required'=>'Ban chua nhap repassword',
    			'password_confirmation.same'=>'Ban nhap sai password',
    		]);
    	$user = new User;
    	$user->name=$request->name;
    	$user->email=$request->email;
    	$user->password=bcrypt($request->password);//bcrypt de ma hoa mat khau
    	$user->level=$request->level;
    	$user->save();
    	return redirect('admin/User/add')->with('Thong Bao','Them thanh cong');
    	
    }
    public function getEdit($id){
    	$user = User::find($id);
    	return view('admin.User.edit',['user'=>$user]);
    	
    }
    public function postEdit(Request $request, $id){
        if($request->ChangePassword=="on"){
    	$this->validate($request,
    		[
    			
    			'password'=>'required|min:3|max:32',
    			
    			
    			'password_confirmation'=>'required|same:password',
    		],
    		[
    			
    			'password.required'=>'Ban chua nhap password',
    			'password.min'=>'password tu 3 den 32 ky tu',
    			'password.max'=>'password tu 3 den 32 ky tu',
    			'password_confirmation.required'=>'Ban chua nhap repassword',
    			'password_confirmation.same'=>'Ban nhap sai password',
    		]);
        $user->password=bcrypt($request->password);
    }
    	$user = User::find($id);
    	$user->name=$request->n
ame;
    	$user->level=$request->level;
    	$user->save();
    	return redirect('admin/User/edit/'.$id)->with('Thong Bao','Edit thanh cong');
    }
    public function getDelete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/User/list')->with('Thong Bao','Xoa thanh cong');
    }
    public function getloginAdmin(){
        return view('admin.login');
    }
    public function postloginAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32',
            ],
            [
                'email.required'=>'Ban chua nhap email',
                'password'=>'Ban chua nhap password',
                'password.min'=>'Password co 3 den 32 ky tu',
                'password.max'=>'Password co 3 den 32 ky tu',
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/TinTuc/list');
        }
        else
        {
            return redirect('admin/login')->with('Thong Bao','Login khong thanh cong');
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }

}
