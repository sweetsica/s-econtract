@extends('back-end.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Quyền & Vai Trò</h2>
                <p class="mb-0">Welcome to Omah Property Admin</p>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>
            <a href="javascript:void(0);" class="btn btn-primary rounded"><i
                    class="flaticon-381-settings-2 mr-0"></i></a>
        </div>
        <div class="row">
            <div class="col-md-5 d-block h-100">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tạo vai trò</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/role/create')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Tên vai trò</label>
                                        <input required type="text" class="form-control" name="name"
                                               placeholder="Nhập tên phòng ban...">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <label>Mô tả vai trò</label>
                                        <textarea type="text" class="form-control" name="description"
                                                  placeholder="Nhập mô tả phòng ban..."></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo vai trò</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách vai trò</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>Tên vai trò</th>
                                    <th>Mô tả</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" data-toggle="modal" data-target="#editRole{{$role->id}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></button>
                                                <a onclick="return confirm('Chắc chắn xóa {{$role->name}} ?')" href="{{url('/role/delete',['id'=>$role->id])}}" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                                <div class="modal fade" id="editRole{{$role->id}}">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <form class="modal-content" action="{{url('/role/update',['id'=>$role->id])}}" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Cập nhật {{$role->name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="basic-form">
                                                                    <div >
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label>Tên vai trò</label>
                                                                                <input type="text" value="{{$role->name}}" class="form-control" name="name"
                                                                                       placeholder="Nhập tên phòng ban...">
                                                                            </div>
                                                                            <div class="form-group col-md-12 ">
                                                                                <label>Mô tả vai trò</label>
                                                                                <textarea type="text" class="form-control" name="description"
                                                                                          placeholder="Nhập mô tả phòng ban...">{{$role->description}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
