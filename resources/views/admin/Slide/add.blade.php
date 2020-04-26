@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
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
                        <form action="admin/Slide/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Ten Slide</label>
                                <input class="form-control" name="Ten" placeholder="Nhap Ten Slide" />
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                                <textarea id="demo" class="from-control ckeditor" row="5" name="NoiDung"></textarea>
                            </div>
                             <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhap Link" />
                            </div>
                            <div class="form-group">
                                <label>Hinh Anh</label>
                                <input type="file" name="Hinh" class="form-control" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Add</button>
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