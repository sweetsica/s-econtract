@extends('back-end.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Thành viên</h2>
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
                        <h4 class="card-title">Danh sách thành viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>Mã thành viên</th>
                                    <th>Tên thành viên</th>
                                    <th>email</th>
                                    <th>Số điện thoại</th>
                                    <th>Phòng ban</th>
                                    <th >Vai trò</th>
                                    <th>Tỉnh/Thành phố</th>
                                    <th>Huyện/Quận</th>
                                    <th>Xã/Phường</th>
                                    <th>Địa chỉ chi tiết</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->member_code }}</td>
                                        <td>{{ $member->member_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td width="300px">
                                            @if($member->department !== null)
                                                <ul>

                                                    @foreach($member->department as $department)
                                                        <li>{{ $department->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>Chưa có phòng ban nào</p>
                                             @endif

                                        </td>
                                        <td width="300px">
                                            @if($member->roles !== null)
                                                <ul>
                                                    @foreach($member->roles as $role)
                                                        <li>{{ $role->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>Chưa có vai trò nào</p>
                                            @endif
                                        </td>
                                        <td>{{ $member->location?->parent?->parent?->name }}</td>
                                        <td>{{ $member->location?->parent?->name }}</td>
                                        <td>{{ $member->location?->name }}</td>
                                        <td>{{ $member->address}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('member.edit',['id'=>$member->id])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a onclick="return confirm('Chắc chắn xóa {{$member->member_name}} ?')" href="{{route('member.delete',['id'=>$member->id])}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
