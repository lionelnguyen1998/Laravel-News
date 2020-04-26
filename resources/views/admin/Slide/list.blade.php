 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                                <th>Hinh</th>
                                <th>NoiDung</th>
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sl->id}}</td>
                                <td>{{$sl->Ten}}</td>
                                <td>
                                     <img src="upload/hinhanh/slide/{{$sl->Hinh}}" width="300px" heigt="auto"/>
                                </td>
                                <td>{{$sl->NoiDung}}</td>
                                <td>{{$sl->link}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/Slide/delete/{{$sl->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/Slide/edit/{{$sl->id}}">Edit</a></td>
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