 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Loai Tin
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Ten</th>
                                <th>TenKhongDau</th>
                                <th>TenTheLoai</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaitin as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lt->id}}</td>
                                <td>{{$lt->Ten}}</td>
                                <td>{{$lt->TenKhongDau}}</td>
                                <td>{{$lt->theloai->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/LoaiTin/delete/{{$lt->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/LoaiTin/edit/{{$lt->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/LoaiTin/add">Add</a></td>
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