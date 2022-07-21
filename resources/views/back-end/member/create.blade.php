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
                            <form action="{{route('member.create.post')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Mã thành viên</label>
                                        <input type="text" name="member_code" required class="form-control"
                                               placeholder="Mã thành viên">
                                        @error("member_code")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Tên thành viên</label>
                                        <input type="text" name="member_name" required class="form-control"
                                               placeholder="Tên thành viên">
                                        @error("member_name")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone" required class="form-control" placeholder="Nhập số điện thoại...">
                                        @error("member_name")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Địa chỉ email</label>
                                        <input type="email" name="email" required class="form-control" placeholder="Email">
                                        @error("email")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" required class="form-control" placeholder="Mật khẩu">
                                        @error("password")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Tỉnh / Thành phố</label>
                                        <select onchange="getDistrict(event)" required id="provinces_select"
                                                class="form-control">
                                            <option selected disabled>Chọn tỉnh/thành phố...</option>
                                            @foreach($local as $local_item)
                                                <option value="{{$local_item->code}}">{{$local_item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Huyện / Quận</label>
                                        <select onchange="getWard(event)" required id="districts_select" disabled
                                                class="form-control">
                                            <option selected>Chọn huyện/quận...</option>
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Xã / Phường</label>
                                        <select id="wards_select" required name="location_id" disabled class="form-control">
                                            <option selected>Chọn xã/phường...</option>
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ chi tiết</label>
                                    <textarea name="address"  class="form-control"
                                              placeholder="Địa chỉ chi tiết"></textarea>
                                    @error("address")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label>Phòng ban</label>
                                        <select required onchange="handleGetManager(event,null,null)" id="multiple_select" name="departments[]" multiple class="form-control department_select">
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("departments")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nguời quản lý</label>
                                        <select id="department_select" disabled name="parent_id" class="form-control manager_select_mbf">
                                            <option value="0" disabled selected>Chọn người quản lý...</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label>Vai trò</label>
                                        <select required id="multiple_select_role" name="roles[]" multiple class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("roles")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>
                                <a href="{{route('member.list')}}" type="button"
                                   class="btn btn-light mr-2"
                                   data-dismiss="modal">Hủy bỏ
                                </a>
                                <button type="submit" class="btn btn-primary">Hoàn tất</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
