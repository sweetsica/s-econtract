{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Đối tác mới</a></li>
{{--                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$page_description}}</a></li>--}}
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách hợp đồng</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>ID.</strong></th>
                                    <th><strong>TÊN ĐỐI TÁC</strong></th>
                                    <th><strong>GIỚI TÍNH</strong></th>
                                    <th><strong>NGÀY SINH</strong></th>
                                    <th><strong>TUỔI</strong></th>
                                    <th><strong>SỐ ĐIỆN THOẠI</strong></th>
                                    <th><strong>ĐỊA CHỈ EMAIL</strong></th>
                                    <th><strong>NGÀY ĐĂNG KÝ</strong></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($info_data as $data)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><strong>{{$data['id']}}</strong></td>
                                        {{--                                        <td><div class="d-flex align-items-center"><img  src="{{ asset('images/avatar/1.jpg') }}" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">{{$data['name']}}</span></div></td>--}}
                                        <td>{{$data['owner_name']}}</td>
                                        <td>{{$data['owner_sex']}}</td>
                                        <td>{{$data['owner_dob']}}</td>
                                        <td>{{$data['owner_age']}}</td>
                                        <td>{{$data['owner_phone']}}</td>
                                        <td>{{$data['owner_email']}}</td>
                                        <td>{{$data['created_at']->format('d-m-Y')}}</td>
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











