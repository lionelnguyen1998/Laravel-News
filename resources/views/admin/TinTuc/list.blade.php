 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tuc
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>TieuDe</th>
                                <th>TieuDeKhongDau</th>
                                <th>TenTheLoai</th>
                                <th>TenLoaiTin</th>
                                <th>TomTat</th>
                                
                                <th>NoiBat</th>
                                <th>SoLuotXem</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td><p>{{$tt->TieuDe}}</p>
                                 <img width="100px" src="upload/hinhanh/tintuc/{{$tt->Hinh}}"/>
                                </td>
                                <td>{{$tt->TieuDeKhongDau}}</td>
                                <td>{{$tt->loaitin->theloai->Ten}}</td>
                                <td>{{$tt->loaitin->Ten}}</td>
                                <td>{{$tt->TomTat}}</td>
                                
                                <td>
                                    @if($tt->NoiBat==0)
                                    {{'Khong'}}
                                    @else
                                    {{'Co'}}
                                    @endif
                                </td>
                                <td>{{$tt->SoLuotXem}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/TinTuc/delete/{{$tt->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/TinTuc/edit/{{$tt->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

      @endsection