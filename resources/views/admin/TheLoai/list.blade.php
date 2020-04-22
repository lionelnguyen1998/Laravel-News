 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">The Loai
                            <small>List</small>
                        </h1>
                    </div>
                     @if(session('Thong Bao'))
                        <div class="alert alert-success">
                            {{session('Thong Bao')}}
                        </div>
                        @endif

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>TenKhongDau</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Add</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{{$tl->Ten}}</td>
                                <td>{{$tl->TenKhongDau}}</td>
                               <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/TheLoai/delete/{{$tl->id}}"> Delete</a></td>
                               
                            
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/TheLoai/edit/{{$tl->id}}">Edit</a></td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/TheLoai/add">Add</a></td>
                                
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