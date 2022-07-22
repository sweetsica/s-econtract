{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Đối tác</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$page_description}}</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách đối tác</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md" id="example3" data-ordering="false">
                                <thead>
                                <tr>
                                    <th><span>Id.</span></th>
                                    <th><span>Tên đối tác</span></th>
                                    <th><span>Giới tính</span></th>
                                    <th><span>Ngày sinh</span></th>
                                    <th><span>Tuổi</span></th>
                                    <th><span>Số điện thoại</span></th>
                                    <th><span>Địa chỉ email</span></th>
                                    <th><span>Số lượng hợp đồng</span></th>
                                    <th><span>Ngày đăng ký</span></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($info_data as $data)
                                    <tr>
                                        <td><strong>{{$data['id']}}</strong></td>
                                        {{--                                        <td><div class="d-flex align-items-center"><img  src="{{ asset('images/avatar/1.jpg') }}" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">{{$data['name']}}</span></div></td>--}}
                                        <td>{{$data['owner_name']}}</td>
                                        <td>{{$data['owner_sex']}}</td>
                                        <td>{{$data['owner_dob']}}</td>
                                        <td>{{$data['owner_age']}}</td>
                                        <td>{{$data['owner_phone']}}</td>
                                        <td>{{$data['owner_email']}}</td>
                                        <td>{{count($data->contract)}}</td>
                                        <td>{{$data['created_at']->format('d-m-Y')}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if(Session::get('session_role') == 'admin' || Session::class == 'sale_admin')
                                                    <button type="button"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"
                                                            data-toggle="modal"
                                                            data-target="#partner-edit-{{$data['id']}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                @endif
                                                <a title="chi tiết" href="{{route('partner.show',$data['id'])}}"
                                                   class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                                            </div>
                                            @if(Session::get('session_role') == 'admin' || Session::class == 'sale_admin')

                                                <div class="modal fade" id="partner-edit-{{$data['id']}}" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLongTitle"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                         role="document">
                                                        <form action="{{route('partner.update',[$data['id']])}}"
                                                              method="post" class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh
                                                                    sửa
                                                                    đối tác</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    @csrf
                                                                    <div class="form-group col-md-12">
                                                                        <label>Tên đối tác</label>
                                                                        <input
                                                                            value="{{$data['owner_name']}}"
                                                                            name="owner_name"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập tên đối tác...">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Số CMND/CCCD</label>
                                                                        <input
                                                                            value="{{$data['owner_id_numb']}}"
                                                                            name="owner_id_numb"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập tên đối tác...">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Ngày cấp</label>
                                                                        <input
                                                                            value="{{$data->owner_id_numb_created_at}}"
                                                                            name="owner_id_numb_created_at"
                                                                            type="date" class="form-control"
                                                                            placeholder="Ngày cấp...">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>Nơi cấp</label>
                                                                        <textarea name="owner_id_numb_created_locate"
                                                                                  class="form-control" rows="2"
                                                                                  spellcheck="false">{{$data['owner_id_numb_created_locate']}}</textarea>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Số điện thoại</label>
                                                                        <input
                                                                            value="{{$data['owner_phone']}}"
                                                                            name="owner_phone"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập số điện thoại...">
                                                                    </div>
                                                                    <div class="form-group col-md-7">
                                                                        <label>Địa chỉ email</label>
                                                                        <input
                                                                            value="{{$data['owner_email']}}"
                                                                            name="owner_email"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập địa chỉ email...">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Ngày sinh</label>
                                                                        <input
                                                                            value="{{$data->owner_dob}}"
                                                                            name="owner_dob"
                                                                            type="date" class="form-control"
                                                                            placeholder="Chọn ngày sinh...">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Tuổi</label>
                                                                        <input
                                                                            value="{{$data['owner_age']}}"
                                                                            name="owner_age"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập tuổi...">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Giới tính</label>
                                                                        <select name="owner_sex" class="form-control">
                                                                            <option
                                                                                {{$data['owner_sex'] == "Nam" ? "selected" : ""}} value="Nam">
                                                                                Nam
                                                                            </option>
                                                                            <option
                                                                                {{$data['owner_sex'] == "Nữ" ? "selected" : ""}} value="Nữ">
                                                                                Nữ
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                        data-dismiss="modal">Hủy bỏ
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Lưu thay
                                                                    đổi
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
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











