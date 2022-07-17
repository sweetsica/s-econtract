@extends('back-end.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Phòng ban</h2>
{{--                <p class="mb-0">Welcome to Omah Property Admin</p>--}}
            </div>
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>--}}
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded"><i--}}
{{--                    class="flaticon-381-settings-2 mr-0"></i></a>--}}
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách phòng ban</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Tên phòng </th>
                                    <th>Mô tả</th>
                                    <th>Tỉnh/Thành phố</th>
                                    <th>Huyện/Quận</th>
                                    <th>Xã/Phường</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($departments as $department)
                                        <td>{{ $department->id }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->description }}</td>
                                        <td>{{ $department->location->parent->parent->name }}</td>
                                        <td>{{ $department->location->parent->name }}</td>
                                        <td>{{ $department->location->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('department.edit',[$department->id]) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a onclick="return confirm('Chắc chắn xóa  {{$department->name}} ?')" href="{{route('department.delete',[$department->id])}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
