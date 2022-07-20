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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tạo thành viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/member/update/'.$member->id)}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Mã thành viên</label>
                                        <input type="text" name="member_code" value="{{$member->member_code}}" class="form-control"
                                               placeholder="Mã thành viên">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Tên thành viên</label>
                                        <input type="text" name="member_name" value="{{$member->member_name}}" class="form-control"
                                               placeholder="Tên thành viên">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone"  value="{{$member->phone}}" class="form-control" placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Địa chỉ email</label>
                                        <input type="email"  value="{{$member->email}}" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" re>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Tỉnh / Thành phố</label>
                                        <select onchange="getDistrict(event)" id="provinces_select"
                                                class="form-control">
                                            <option selected>Chọn tỉnh/thành phố...</option>
                                            @foreach($local as $local_item)
                                                <option
                                                    {{$member->location->parent->parent->id == $local_item->id ? 'selected' : ''}}
                                                    value="{{$local_item->code}}">{{$local_item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Huyện / Quận</label>
                                        <select onchange="getWard(event)" id="districts_select"
                                                class="form-control">
                                            @foreach($districts as $district)
                                                <option
                                                    {{$member->location->parent->id == $district->id ? 'selected' : ''}}
                                                    value="{{$district->code}}">{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Xã / Phường</label>
                                        <select id="wards_select" name="location_id" class="form-control">
                                            @foreach($wards as $ward)
                                                <option
                                                    {{$member->location->id == $ward->id ? 'selected' : ''}}
                                                    value="{{$ward->id}}">{{$ward->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ chi tiết</label>
                                    <textarea name="address" class="form-control"
                                              placeholder="Địa chỉ chi tiết">{{$member->address}}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label>Phòng ban</label>
                                        <select onchange="handleGetManager(event,{{$member->id}},{{$member->parent_id?$member->parent_id:0}})" id="multiple_select" name="departments[]" multiple class="form-control department_select">
                                            @foreach($departments as $department)
                                                <option
                                                    @foreach($member->department as $department_item)
                                                        {{$department->id == $department_item->id ? 'selected' : ''}}
                                                    @endforeach
                                                    value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nguời quản lý</label>
                                        <select id="department_select"  name="parent_id" class="form-control manager_select_mbf">
                                            <option value="0" disabled selected>Chọn người quản lý...</option>
                                            @foreach($managers as $manager)
                                                @if($manager->id != $member->id)
                                                <option
                                                    {{$member->parent_id == $manager->id ? 'selected' : ''}}
                                                    value="{{$manager->id}}">{{$manager->member_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label>Vai trò</label>
                                        <select id="multiple_select_role" name="roles[]" multiple class="form-control">
                                            @foreach($roles as $role)
                                                <option
                                                    @foreach($member->roles as $role_item)
                                                        {{$role->id == $role_item->id ? 'selected' : ''}}
                                                    @endforeach
                                                    value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Hoàn tất</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
