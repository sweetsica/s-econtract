{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Hợp đồng</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$page_description}}</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách hợp đồng của thành viên</h4>
                    </div>

                    <div class="card-body">
                        <div id="accordion-eleven" class="accordion accordion-rounded-stylish accordion-bordered">
                            @foreach($info_data as $item)
                            <div class="accordion__item">
                                <div class="accordion__header collapsed accordion__header--info" data-toggle="collapse" data-target="#member-{{$item->member_code}}-{{$item->id}}">
                                    <span class="accordion__header--icon"></span>
                                    <span class="accordion__header--text">{{$item->member_code}} - {{$item->member_name}}</span>
                                    <span class="accordion__header--indicator"></span>
                                </div>
                                <div id="member-{{$item->member_code}}-{{$item->id}}" class="collapse accordion__body" data-parent="#accordion-eleven">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="example3" data-ordering="false">
                                            <thead>
                                            <tr>
                                                <th><span>Id.</span></th>
                                                <th><span>Tên đối tác</span></th>
                                                <th><span>Địa chỉ</span></th>
                                                <th><span>Mã hợp đồng</span></th>
                                                <th><span>Số điện thoại</span></th>
                                                <th><span>Loại hợp đồng</span></th>
                                                <th><span>Ngày đăng ký</span></th>
                                                <th><span>Trạng thái</span></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($item->contract as $data)
                                                <tr>
                                                    <td><strong>{{$data['id']}}</strong></td>
                                                    {{--                                        <td><div class="d-flex align-items-center"><img  src="{{ asset('images/avatar/1.jpg') }}" class="rounded-lg mr-2" width="24" alt=""/> <span class="w-space-no">{{$data['name']}}</span></div></td>--}}
                                                    <td>{{$data['store_name']}}</td>
                                                    <td>{{$data['store_add_DKKD']}}</td>
                                                    <td>{{$data['contract_code']}}</td>
                                                    <td>{{$data['store_phone']}}</td>
                                                    <td>{{$data['store_contract_type']}}</td>
                                                    <td>{{format_date($data['created_at'])}}</td>
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
                                                            <a href="{{route('contract.show',$data['id'])}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection











