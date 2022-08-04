{{-- Extends layout --}}
@extends('back-end.layout.default')


{{-- Content --}}
@section('content')
    <!-- row -->
    @foreach($info_data as $data)
        <div class="container-fluid">
            <div class="form-head page-titles d-flex  align-items-center">
                <div class="mr-auto  d-lg-block">
                    <h2 class="text-black font-w600">Chi tiết hợp đồng</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Hợp đồng</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"></a>{{$data['id']}}
                            -{{$data['created_at']->format('dmY-His')}}</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-primary text-center">
                                <div class="card-body">
                                    <h2 class="fs-30 text-white">Mã hợp đồng</h2>
                                    <span
                                        class="text-white font-w300">{{$data['id']}}-{{$data['created_at']->format('dmY-His')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header mb-0 border-0">
                                    <h3 class="fs-20 mb-0 text-black">Chữ ký</h3>
                                </div>
                                <div class="card-body pt-0 text-center">
                                    @if($data['image'])
                                        <img src="{{$data['image']}}" alt="" class="w-100">
                                    @else
                                        <h6>Khách hàng chưa ký</h6>
                                    @endif
                                </div>
                                <div class="card-footer border-0 ">
                                    <a href="{{url('/contract/show-with-pdf',['id'=>$data->id])}}"
                                       class="btn btn-primary d-block rounded">Xem hợp đồng PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="d-md-flex d-block mb-sm-5 mb-3">
                                            <div class="mr-auto mb-md-0 mb-4">
                                                <h2 class="font-w600 text-black">{{$data['name']}}</h2>
                                                <span class="fs-18">
													<i class="las la-map-marker-alt fs-20"></i>
                                                    {{$data->location?->name}} - {{$data->location?->parent?->name}} - {{$data->location?->parent?->parent?->name}}
                                                </span>
                                                <br/>
                                                <span class="fs-18">
                                                    	<i class="las la-dolly-flatbed"></i>
                                                    Phạm vi bán hàng:
                                                         @if($data['type_contract'] = 1)
                                                        Online
                                                    @else
                                                        Khác
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="ml-md-4 text-md-right">
                                                <p class="fs-14 text-black mb-1 mr-1">Doanh số đăng ký</p>
                                                <h4 class="fs-24 text-primary">{{ number_format((int)$data['account_budget1'],0) }}
                                                    đ
                                                    - {{  number_format((int)$data['account_budget2'],0)}}đ </h4>
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <ul>
                                                <li><span
                                                        class="font-weight-bold">Người đại diện</span>: {{$data['account_name']}}
                                                </li>
                                                <li><span
                                                        class="font-weight-bold">Chức danh</span>: {{$data['account_title']}}
                                                </li>
                                                <li><span
                                                        class="font-weight-bold">Mã số thuế</span>: {{$data['account_tax']}}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mb-sm-5 mb-2">

                                            <a href="tel:{{$data['account_phone']}}"
                                               class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">
                                                <i class="las la-phone scale5 mr-2"></i>
                                                {{$data['account_phone']}}
                                            </a>
                                            <a href="{{$data['account_website']}}" target="_blank"
                                               class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">
                                                <i class="las la-globe scale5 mr-2"></i>
                                                {{$data['account_website']}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin hợp đồng</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-5">
                                                    <label for="agent-name">Mã hợp đồng</label>
                                                    <input
                                                        value="{{$data['id']}}-{{$data['created_at']->format('dmY-His')}}"
                                                        type="text"
                                                        name="account_name" class="form-control" id="agent-name"
                                                        placeholder="Mã hợp đồng">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">ĐKDT N1</label>
                                                    <input value="{{$data->account_budget1}}" type="text"
                                                           name="account_budget1" class="form-control" id="id_tdv"
                                                           placeholder="ĐKDT N1">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">ĐKDT N2 </label>
                                                    <input value="{{$data->account_budget2}}" type="text"
                                                           name="account_budget2" class="form-control" id="id_tdv"
                                                           placeholder="ĐKDT N2">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Ngày bắt đầu</label>
                                                    <input value="{{$data->account_startdate}}" type="text"
                                                           name="account_budget1" class="form-control" id="id_tdv"
                                                           placeholder="Ngày bắt đầu">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Ngày kết thúc</label>
                                                    <input value="{{$data->account_enddate}}" type="text"
                                                           name="account_budget2" class="form-control" id="id_tdv"
                                                           placeholder="Ngày kết thúc">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="id_tdv">Lịch hẹn</label>
                                                    <input value="{{$data->appointment}}" type="text"
                                                           name="account_budget2" class="form-control" id="id_tdv"
                                                           placeholder="Lịch hẹn">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Loại hợp đồng</label>
                                                    <input value="{{$data->type_contract == 1? "nhanh" : "chậm"}}"
                                                           type="text" name="account_budget2" class="form-control"
                                                           id="id_tdv" placeholder="ĐKDT N2">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="agent-name">Phạm vi bán hàng</label>
                                                    <input value="{{$data->account_type}}" type="text"
                                                           name="account_type" class="form-control" id="agent-name"
                                                           placeholder="Phạm vi bán hàng">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="agent-name">Trạng thái</label>
                                                    <input value="{{$data->status}}" type="text" name="account_type"
                                                           class="form-control" id="agent-name"
                                                           placeholder="Trạng thái">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin người đại diện</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="agent-name">Tên người đại diện </label>
                                                    <input value="{{$data->account_name}}" type="text"
                                                           name="account_name" class="form-control" id="agent-name"
                                                           placeholder="Tên người đại diện">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Chức danh người đại diện</label>
                                                    <input value="{{$data->account_title}}" type="text"
                                                           name="account_title" class="form-control" id="id_tdv"
                                                           placeholder="Chức danh">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="agent-name">Số điện thoại </label>
                                                    <input value="{{$data->account_phone}}" type="text"
                                                           name="account_phone" class="form-control" id="agent-name"
                                                           placeholder="Số điện thoại">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="agent-name">Ngày Sinh</label>
                                                    <input value="{{$data->account_birth}}" type="text"
                                                           name="account_birth" class="form-control" id="agent-name"
                                                           placeholder="Ngày Sinh">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Giới tinh</label>
                                                    <input value="{{$data->account_gender}}" type="text"
                                                           name="account_gender" class="form-control" id="id_tdv"
                                                           placeholder="Giới tinh">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Email</label>
                                                    <input value="{{$data->account_email}}" type="text"
                                                           name="account_email" class="form-control" id="id_tdv"
                                                           placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Mã số thuê</label>
                                                    <input value="{{$data->account_tax}}" type="text"
                                                           name="account_gender" class="form-control" id="id_tdv"
                                                           placeholder="Mã số thuê">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Tài khoản ngân hàng</label>
                                                    <input value="{{$data->account_bank_number}}" type="text"
                                                           name="account_gender" class="form-control" id="id_tdv"
                                                           placeholder="Tài khoản ngân hàng">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Tên chủ tài khoản</label>
                                                    <input value="{{$data->account_bank_holder}}" type="text"
                                                           name="account_gender" class="form-control" id="id_tdv"
                                                           placeholder="Tên chủ tài khoản">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="id_tdv">Tên ngân hàng</label>
                                                    <input value="{{$data->account_bank_name}}" type="text"
                                                           name="account_gender" class="form-control" id="id_tdv"
                                                           placeholder="Tên ngân hàng">
                                                </div>
                                            </div>
                                            {{--                                        <button type="submit" class="btn btn-primary">Sign in</button>--}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin đại lý</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="agent-name">Tên đại lý</label>
                                                    <input value="{{$data->name}}" type="text" name="name"
                                                           class="form-control" id="agent-name"
                                                           placeholder="Tên đại lý">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Tên trình dược viên</label>
                                                    <input value="{{$data->tdv->member_name}}" type="text" name="id_tdv"
                                                           class="form-control" id="id_tdv"
                                                           placeholder="Tên trình dược viên">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_tdv">Mã trình dược viên</label>
                                                    <input value="{{$data->tdv->member_code}}" type="text" name="id_tdv"
                                                           class="form-control" id="id_tdv"
                                                           placeholder="Mã trình dược viên">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_district">Xã / Phường</label>
                                                    <input value="{{$data->location?->name}}" type="text"
                                                           name="delivery_district" class="form-control" id="agent-name"
                                                           placeholder="Quận / Huyện">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_district">Huyện / Quận </label>
                                                    <input value="{{$data->location?->parent?->name}}" type="text"
                                                           name="delivery_district" class="form-control" id="agent-name"
                                                           placeholder="Quận / Huyện">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_city">Tỉnh / Thành Phố</label>
                                                    <input value="{{$data->location?->parent?->parent?->name}}"
                                                           type="text" name="delivery_city"
                                                           class="form-control" id="delivery_city"
                                                           placeholder="Tỉnh / Thành Phố">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="address">Địa chỉ ĐKKD</label>
                                                    <textarea type="text" name="name" class="form-control" id="address"
                                                              placeholder="Địa chỉ ĐKKD">{{$data->address}}</textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_district">Xã / Phường nhận hàng</label>
                                                    <input
                                                        value="{{$data->delivery_location? $data->delivery_location?->name : "Chưa điền thôn tin"}}"
                                                        type="text"
                                                        name="delivery_district" class="form-control" id="agent-name"
                                                        placeholder="Quận / Huyện">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_district">Huyện / Quận nhận hàng</label>
                                                    <input
                                                        value="{{$data->delivery_location? $data->delivery_location->parent->name : "Chưa điền thông tin"}}"
                                                        type="text"
                                                        name="delivery_district" class="form-control" id="agent-name"
                                                        placeholder="Quận / Huyện">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="delivery_city">Tỉnh / Thành phố nhận hàng </label>
                                                    <input
                                                        value="{{$data->delivery_location? $data->delivery_location->parent->parent->name :"Chưa điền thông tin"}}"
                                                        type="text"
                                                        name="delivery_city" class="form-control" id="delivery_city"
                                                        placeholder="Tỉnh / Thành Phố">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="address">Chi tiết địa chỉ nhận hàng</label>
                                                    <textarea type="text" name="name" class="form-control" id="address"
                                                              placeholder="Địa chỉ ĐKKD">{{$data->delivery_address?$data->delivery_address:"Chưa điền thông tin"}}</textarea>
                                                </div>
                                            </div>

                                            {{--                                        <button type="submit" class="btn btn-primary">Sign in</button>--}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mục khác</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="agent-name">Website</label>
                                                    <input value="{{$data->account_website}}" type="text" name="name"
                                                           class="form-control" id="agent-name"
                                                           placeholder="Tên đại lý">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
