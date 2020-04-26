@extends('admin.layout.index')
@section('content')
        <
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
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
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/User/edit/{{$user->id}}" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Nhap Ten User" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <input id="ChangePassword" type="checkbox" name="changePassword">
                                <label>Replace Password</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhap Password" disabled=""/>
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control password" name="password_confirmation" placeholder="Enter RePassword" disabled=""/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder=" Enter Email" value="{{$user->email}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="level" value="1" type="radio"
                                     @if($user->level==1)
                                     {{"checked"}}
                                     @endif
                                    >Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="0" type="radio"
                                    @if($user->level==0)
                                     {{"checked"}}
                                     @endif
                                    >Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
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
    @section('script')

<script>
    $(document).ready(function(){
            $("#ChangePassword").change(funtion(){
                if($(this).is(":checked"))
                {

            $(".password").removeAttr('disabled');
                }
                else
                {
            $(".password").attr('disabled','');
                }
            });
    });//bat su kien checkbox
</script>
    @endsection