{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Phiên bản</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Báo cáo</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách phiên bản</h4>
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
                                    <th><strong>TÊN PHIÊN BẢN</strong></th>
                                    <th><strong>NỘI DUNG CHÍNH</strong></th>
                                    <th><strong>NGÀY</strong></th>
                                    <th><strong>TRẠNG THÁI</strong></th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($info_data as $data)--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">--}}
{{--                                                <label class="custom-control-label" for="customCheckBox2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td><strong>{{$data['id']}}-{{$data['created_at']}}/HĐĐL</strong></td>--}}
{{--                                        <td><div class="d-flex align-items-center"><img  src="{{ asset('images/avatar/1.jpg') }}" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">{{$data['name']}}</span></div></td>--}}
{{--                                        <td>{{$data['address']}}</td>--}}
{{--                                        <td>{{$data['created_at']}}</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                @if($data['access_type']==10)--}}
{{--                                                    <i class="fa fa-circle text-warning mr-1"></i> Đang chờ--}}
{{--                                                @else--}}
{{--                                                    <i class="fa fa-circle text-success mr-1"></i> Đã duyệt--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <a href="{{route('contract.edit',$data['id'])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>--}}
{{--                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection











