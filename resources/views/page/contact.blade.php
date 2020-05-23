  
@extends('layouts.index')
@section('content')
  <div class="container">

       @include('layouts.slide')
<div class="row main-left">
        <div class="space20"></div>
        @include('layouts.menu')
       
           
          <div class="col-md-9">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
                        
                        <div class="break"></div>
                        <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Dat nuoc mat troi moc </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>doraemon@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>123456789</p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/place/Qu%C3%A1n+H%C3%A0nh,+Tp.+Vinh,+Ngh%E1%BB%87+An,+Vi%E1%BB%87t+Nam/@18.787642,105.632929,17z/data=!4m5!3m4!1s0x3139d1220e9a46a3:0x2dc44fddb1685671!8m2!3d18.7853365!4d105.6418428" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
