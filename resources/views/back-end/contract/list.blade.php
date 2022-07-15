{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Hợp đồng</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Phân loại hợp đồng</a></li>
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
                                    <th><strong>ĐỊA CHỈ</strong></th>
                                    <th><strong>MÃ HỢP ĐỒNG</strong></th>
                                    <th><strong>SỐ ĐIỆN THOẠI</strong></th>
                                    <th><strong>LOẠI HỢP ĐỒNG</strong></th>
                                    <th><strong>NGÀY ĐĂNG KÝ</strong></th>
                                    <th><strong>TRẠNG THÁI</strong></th>
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
                                        <td><strong>{{$data['id']}}-{{$data['created_at']->format('dmY-His')}}</strong></td>
{{--                                        <td><div class="d-flex align-items-center"><img  src="{{ asset('images/avatar/1.jpg') }}" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">{{$data['name']}}</span></div></td>--}}
                                        <td>{{$data['store_name']}}</td>
                                        <td>{{$data['store_add_DKKD']}}</td>
                                        <td>{{$data['contract_code']}}</td>
                                        <td>{{$data['store_phone']}}</td>
                                        <td>{{$data['store_contract_type']}}</td>
                                        <td>{{$data['created_at']}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($data['contract_level']==10)
                                                    Chờ duyệt <i style="padding-left: 1px;" class="fa fa-circle text-warning mr-1"></i>
                                                @else
                                                    Cấp độ: {{$data['contract_level']}} <i style="padding-left: 5px;" class="fa fa-circle text-success mr-1"></i>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
{{--                                                <a href="{{route('contract.edit',$data['id'])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
{{--                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>--}}
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











