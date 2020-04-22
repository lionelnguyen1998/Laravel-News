@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tuc
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>

                            @endforeach
                        </div>
                        @endif

                        @if(session('Thong Bao'))
                        <div class="alert alert-success">
                            {{session('Thong Bao')}}
                        </div>

                        @endif
                        <form action="admin/TinTuc/edit/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                             <!-- co multipart moi up duoc file hinh anh len -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="form-group">
                                <label>Chon The Loai</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                    <option 
                                    @if($tintuc->loaitin->theloai->idTheLoai==$tl->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}">{{$tl->Ten}}</option>
                                   @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Chon Loai Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    <option 
                                    @if($tintuc->loaitin->idLoaiTin==$lt->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhap Tieu De Tin Tuc</label>
                                <input class="form-control" name="TieuDe" placeholder="Dien Tieu De Tin Tuc" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tom Tat Noi Dung</label>
                                <textarea id="demo" class="from-control ckeditor" row="3" name="TomTat" value="{{$tintuc->TomTat}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                                <textarea id="demo" class="from-control ckeditor" row="5" name="NoiDung" value="{{$tintuc->NoiDung}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hinh Anh</label>
                                <img width="400px" src="upload/hinhanh/tintuc/{{$tintuc->Hinh}}" /><br>
                                <input type="file" name="Hinh" class="form-control"/>
                            </div>
                             <div>
                                 <label>Noi Bat</label>
                                 <label class="radio-inline">
                                    <input name="NoiBat"value="1"
                                     @if($tintuc->NoiBat==1){
                                     {{"checked"}}
                                 }
                                 @endif
                                    type="radio">Co
                                 </label>
                                 <label class="radio-inline">
                                    <input name="NoiBat" value="0"
                                     @if($tintuc->NoiBat==0){
                                     {{"checked"}}
                                 }
                                 @endif
                                    type="radio">Khong
                                 </label>
                             </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   
    @endsection
    <!-- De khi chon the loai thi no hien ra nhung loai tin thuoc the loai do thi dung ajax ( phan script ben index) -->
    @section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
            var idTheLoai=$(this).val();//Lay gia tri cua no ra 
            //alert(idTheLoai);
            $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                //alert(data);
                $("#LoaiTin").html(data);

            });
            });
        });
    </script>

    @endsection