{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head page-titles d-flex  align-items-center">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Thông tin đối tác</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="position-relative mb-3 d-inline-block">
                                    <img src="{{ asset('images/avatar/1.jpg') }}" alt="" class="rounded" width="140">
                                </div>
                                <h4 class="text-black fs-20 font-w600">{{$info_data['owner_name']}}</h4>
                                <span class="mb-3 text-black d-block">Người đại diện / Đối tác</span>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <a href="javascript:void(0);" class="btn btn-outline-primary d-block rounded">
                                    <i class="las la-phone scale5 mr-2"></i>
                                    {{$info_data['owner_phone']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header w-full d-flex align-items-center">
                                <div class="mr-auto mb-md-0">
                                    <h2 class="font-w600 text-black fs-26">Thông tin cá nhân</h2>
                                </div>
                                <div class="ml-md-4 text-md-right">
                                    <p class="fs-14 text-black mb-1 mr-1">Ngày tạo</p>
                                    <h4 class="fs-24 text-primary">{{$info_data['created_at']->format('d-m-Y')}}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 fs-20 mb-3">
                                                <span
                                                    class="font-w600 text-black">Email:</span> {{$info_data->owner_email}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Giới tính:</span> {{$info_data->owner_sex}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Ngày sinh:</span> {{$info_data->owner_dob}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Tuổi:</span> {{$info_data->owner_age}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">MST Cá nhân:</span> {{$info_data->owner_mst}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">CCCD/CMND:</span> {{$info_data->owner_id_numb}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Ngày cấp:</span> {{$info_data->owner_id_numb_created_at}}
                                        </div>
                                        <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Nơi cấp:</span> {{$info_data->owner_id_numb_created_locate}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header w-full d-flex align-items-center">
                                <div class="mr-auto mb-md-0">
                                    <h2 class="font-w600 text-black fs-26">Danh sách hợp đồng</h2>
                                </div>
                                <div class="ml-md-4 text-md-right">
                                    <button
                                        data-toggle="modal" data-target="#add-contract-modal"
                                        class="btn light btn-md rounded-lg btn-primary mr-2">
                                        Thêm hợp đồng
                                    </button>
                                    <div class="modal fade" id="add-contract-modal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <form action="{{route('contract.create',[$info_data->id])}}" method="post"
                                                  class="modal-content">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm hợp
                                                        đồng</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div style="max-height: 70vh; overflow-y:auto" class="modal-body">
                                                    <div class="row text-left">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Tên
                                                                    đại lý</label>
                                                                <input required name="store_name"
                                                                       value="{{old('store_name')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập tên đại lý">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Số điện thoại đại
                                                                    lý</label>
                                                                <input required name="store_phone"
                                                                       value="{{old('store_phone')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập số điện thoại đại lý">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Website đại lý</label>
                                                                <input required name="store_website"
                                                                       value="{{old('store_website')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập website đại lý">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Mã số ĐKKD</label>
                                                                <input name="store_id_Numb_GPDKKD"
                                                                       value="{{old('store_id_Numb_GPDKKD')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập mã số ĐKKD">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Ngày ĐKKD</label>
                                                                <input name="store_GPDKKD"
                                                                       value="{{old('store_GPDKKD')}}"
                                                                       type="date"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Chọn ngày ĐKKD">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-row ">
                                                                <div class="form-group col-md-4">
                                                                    <label>Tỉnh / Thành phố ĐKKD</label>
                                                                    <select required onchange="getDistrict(event)"
                                                                            required
                                                                            id="provinces_select" class="form-control">
                                                                        <option selected>Chọn tỉnh/thành phố...</option>
                                                                        @foreach($local as $local_item)
                                                                            <option
                                                                                value="{{$local_item->code}}">{{$local_item->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Huyện / Quận ĐKKD</label>
                                                                    <select required onchange="getWard(event)" required
                                                                            id="districts_select" disabled
                                                                            class="form-control">
                                                                        <option selected>Chọn huyện/quận...</option>
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Xã / Phường ĐKKD</label>
                                                                    <select required id="wards_select" required
                                                                            name="store_local_DKKD" disabled
                                                                            class="form-control">
                                                                        <option selected>Chọn xã/phường...</option>
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label
                                                                for="exampleInputEmail1">Địa chỉ ĐKKD</label>
                                                            <textarea
                                                                required
                                                                name="store_add_DKKD"
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Nhập chi tiết địa chỉ ĐKKD">{{old('store_add_GH')}}</textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Tỉnh / Thành phố giao hàng</label>
                                                                    <select onchange="getDistrictGH(event)" required
                                                                            id="provinces_select_gh"
                                                                            class="form-control">
                                                                        <option selected>Chọn tỉnh/thành phố...</option>
                                                                        @foreach($local as $local_item)
                                                                            <option
                                                                                value="{{$local_item->code}}">{{$local_item->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Huyện / Quận giao hàng</label>
                                                                    <select onchange="getWardGH(event)" required
                                                                            id="districts_select_gh" disabled
                                                                            class="form-control">
                                                                        <option selected>Chọn huyện/quận...</option>
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Xã / Phường giao hàng</label>
                                                                    <select id="wards_select_gh" required
                                                                            name="store_local_GH" disabled
                                                                            class="form-control">
                                                                        <option selected>Chọn xã/phường...</option>
                                                                    </select>
                                                                    @error("location_id")
                                                                    <p class="text-danger">{{$message}}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label
                                                                for="exampleInputEmail1">Địa chỉ giao hàng</label>
                                                            <textarea
                                                                required
                                                                name="store_add_GH"
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                placeholder="Nhập chi tiết địa chỉ giao hàng">{{old('store_add_GH')}}</textarea>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Tên chủ ngân hàng</label>
                                                                <input required name="store_bank_holder"
                                                                       value="{{old('store_bank_holder')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập tên chủ ngân hàng">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Tên ngân hàng</label>
                                                                <input required name="store_contact_name"
                                                                       value="{{old('store_contact_name')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập tên ngân hàng">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Số tài khoản</label>
                                                                <input required name="store_bank_numb"
                                                                       value="{{old('store_bank_numb')}}"
                                                                       type="tel"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập số tài khoản">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Tên người liên hệ</label>
                                                                <input required name="store_contact_name"
                                                                       value="{{old('store_contact_name')}}"
                                                                       type="tel"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập tên người liên hệ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Số điện thoại người liên
                                                                    hệ</label>
                                                                <input required name="store_contact_phone"
                                                                       value="{{old('store_contact_phone')}}"
                                                                       type="tel"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập số điện thoại người liên hệ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Vị trí người liên
                                                                    hệ</label>
                                                                <input required name="store_contact_position"
                                                                       value="{{old('store_contact_position')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập số điện thoại người liên hệ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Mã trình dược viên</label>
                                                                <input required name="member_id"
                                                                       value="{{old('member_id')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập số điện thoại người liên hệ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Phạm vi bán hàng</label>
                                                                <input required name="store_effect"
                                                                       value="{{old('store_effect')}}"
                                                                       type="text"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập phạm vi bán hàng (vd: Online)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Ngày bắt đầu hợp
                                                                    đồng</label>
                                                                <input required name="store_started"
                                                                       value="{{old('store_started')}}"
                                                                       type="date"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Ngày kết thúc hợp
                                                                    đồng</label>
                                                                <input required name="store_end"
                                                                       value="{{old('store_end')}}"
                                                                       type="date"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Chọn
                                                                    loại hợp đồng</label>
                                                                <select
                                                                    required
                                                                    name="store_contract_type"
                                                                    class="form-control">
                                                                    <option
                                                                        value="1">
                                                                        Hợp đồng chính sách mới
                                                                    </option>
                                                                    <option
                                                                        value="2">
                                                                        Hợp đồng du lịch Nhật
                                                                        Bản
                                                                    </option>
                                                                    <option
                                                                        value="2">
                                                                        Hợp đồng du lịch Đức
                                                                    </option>
                                                                </select>
                                                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleInputEmail1">Mật khẩu hợp đồng</label>
                                                                <input name="store_token"
                                                                       value="{{old('store_token')}}"
                                                                       type="password"
                                                                       class="form-control"
                                                                       id="exampleInputEmail1"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Nhập mật khẩu hợp đồng">
                                                                {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                            data-dismiss="modal">Hủy bỏ
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Lưu hợp đồng</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="accordion-nine" class="accordion accordion-active-header">
                                    @foreach($info_data->contract as $data)
                                        <div class="accordion__item">
                                            <div
                                                class="accordion__header rounded-lg {{$loop->index == 0 ? '' :'collapsed'}}"
                                                data-toggle="collapse"
                                                data-target="#contract_{{$data['id']}}">
                                                <span class="accordion__header--icon"></span>
                                                <span
                                                    class="accordion__header--text">{{$data['store_name']}}</span>
                                                <span class="accordion__header--indicator"></span>
                                            </div>
                                            <div id="contract_{{$data['id']}}"
                                                 class="collapse accordion__body {{$loop->index == 0  ? 'show' :''}}"
                                                 data-parent="#accordion-nine">
                                                <div class="py-4">
                                                    <div class="row">
                                                        <div
                                                            class="col-md-12  mb-5 d-flex justify-content-between">
                                                            <div>
                                                                <a href="{{route('contract.show.pdf',$data['id']).'?type=only_show'}}"
                                                                   class="btn light  btn-md rounded-lg btn-primary mr-2">
                                                                    Xuất hợp đồng
                                                                </a>
                                                                @if(Session::get('session_role') == 'admin')
                                                                    <button type="button"
                                                                            class="btn light  btn-md rounded-lg btn-primary"
                                                                            data-toggle="modal"
                                                                            data-target="#edit-contract-{{$data['id']}}">
                                                                        Chỉnh sửa hợp đồng
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="fs-14 text-black mb-1 mr-1">Ngày
                                                                    tạo</p>
                                                                <h4 class="fs-24 text-primary">{{$data['created_at']->format('d-m-Y')}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h3 class="font-w600 text-black">Đại
                                                                lý: {{$data['store_name']}}</h3>
                                                        </div>
                                                        <div class="col-md-6 p-0">
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Mã hợp đồng:</span> {{$data['contract_code']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Phạm vi bán hàng:</span> {{$data['store_effect']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Cấp độ hợp đồng:</span>
                                                                Hợp đồng cấp {{$data['contract_level']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Mẫu hợp đồng:</span> {{$data['store_contract_type']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Mã trình dược viên:</span> {{$data->member?->member_code}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Tên trình dược viên:</span> {{$data->member?->member_name}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">SĐT Đại lý:</span> {{$data['store_phone']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Địa chỉ:</span> {{$data['store_add_DKKD']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                <span
                                                                    class="font-w600 text-black">Địa chỉ giao hàng:</span> {{$data['store_add_GH']}}
                                                            </div>

                                                            <div class="col-md-12 fs-20 mt-3">
                                                                <span
                                                                    class="font-w600 text-black">Số giấy phép ĐKKDD:</span> {{$data['store_id_Numb_GPDKKD']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Ngày cấp GPĐKKD:</span> {{$data['store_GPDKKD']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Người liên hệ:</span> {{$data['store_contact_name']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Chức danh :</span> {{$data['store_contact_position']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                <span
                                                                    class="font-w600 text-black">SĐT Người liên hệ:</span> {{$data['store_contact_phone']}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 p-0">
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Chủ ngân hàng:</span> {{$data['store_bank_holder']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Tên ngân hàng :</span> {{$data['store_bank']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Số tài khoản:</span> {{$data['store_bank_numb']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Ngày bắt đầu:</span> {{$data['store_started']}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Ngày kết thúc:</span> {{$data['store_end']}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-5">
                                                            <div class="modal fade bd-example-modal-lg"
                                                                 id="edit-contract-{{$data['id']}}"
                                                                 tabindex="-1" role="dialog"
                                                                 aria-labelledby="myLargeModalLabel"
                                                                 aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
                                                                    <form
                                                                        action="{{route('contract.update',[$data['id']])}}"
                                                                        method="post" class="modal-content">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLongTitle">Chỉnh
                                                                                sửa hợp đồng</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div style="max-height: 70vh; overflow-y:auto"
                                                                             class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Tên
                                                                                            đại lý</label>
                                                                                        <input name="store_name"
                                                                                               value="{{$data['store_name']}}"
                                                                                               type="text"
                                                                                               class="form-control"
                                                                                               id="exampleInputEmail1"
                                                                                               aria-describedby="emailHelp"
                                                                                               placeholder="Nhập tên đại lý...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Số
                                                                                            điện thoại</label>
                                                                                        <input
                                                                                            name="store_phone"
                                                                                            value="{{$data['store_phone']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập số điên thoại đại lý....">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Website</label>
                                                                                        <input
                                                                                            name="store_website"
                                                                                            value="{{$data['store_website']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập đường dẫn website...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="address">Địa
                                                                                            chỉ giao hàng</label>
                                                                                        <textarea
                                                                                            name="store_add_DKKD"
                                                                                            class="form-control"
                                                                                            id="address"
                                                                                            placeholder="Địa chỉ chi tiết">{{$data['store_add_GH']}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Tên
                                                                                            chủ tài khoản ngân
                                                                                            hàng</label>
                                                                                        <input
                                                                                            name="store_bank_holder"
                                                                                            value="{{$data['store_bank_holder']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập họ và tên...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Tên
                                                                                            ngân hàng</label>
                                                                                        <input name="store_bank"
                                                                                               value="{{$data['store_bank']}}"
                                                                                               type="text"
                                                                                               class="form-control"
                                                                                               id="exampleInputEmail1"
                                                                                               aria-describedby="emailHelp"
                                                                                               placeholder="Nhập tên ngân hàng...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Số
                                                                                            tài khoản ngân
                                                                                            hàng</label>
                                                                                        <input
                                                                                            name="store_bank_numb"
                                                                                            value="{{$data['store_bank_numb']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập stk...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Người
                                                                                            lên hệ</label>
                                                                                        <input
                                                                                            name="store_contact_name"
                                                                                            value="{{$data['store_contact_name']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập tên người liên hệ...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Chức
                                                                                            danh</label>
                                                                                        <input
                                                                                            name="store_contact_position"
                                                                                            value="{{$data['store_contact_position']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập chức danh...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">SĐT
                                                                                            Người lên hệ</label>
                                                                                        <input
                                                                                            name="store_contact_phone"
                                                                                            value="{{$data['store_contact_phone']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập số điện thoại...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Số
                                                                                            giấy phép
                                                                                            ĐKKD</label>
                                                                                        <input
                                                                                            name="store_id_Numb_GPDKKD"
                                                                                            value="{{$data['store_id_Numb_GPDKKD']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập số GPĐKKD...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">
                                                                                            Ngày cấp GPĐKKD</label>
                                                                                        <input
                                                                                            name="store_GPDKKD"
                                                                                            value="{{$data['store_GPDKKD']}}"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            placeholder="Nhập ngày cấp GPĐKKD...">
                                                                                        {{--                                                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="address">Địa chỉ
                                                                                            ĐKKD</label>
                                                                                        <textarea
                                                                                            name="store_add_GH"
                                                                                            class="form-control"
                                                                                            id="address"
                                                                                            placeholder="Nhập địa chỉ chi tiết...">{{$data['store_add_DKKD']}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Cấp
                                                                                            hợp đồng</label>
                                                                                        <select
                                                                                            name="contract_level"
                                                                                            class="form-control">
                                                                                            <option
                                                                                                {{$data['contract_level']== 1 ? 'selected':''}} value="1">
                                                                                                Hợp đồng cấp 1
                                                                                            </option>
                                                                                            <option
                                                                                                {{$data['contract_level']== 2 ? 'selected':''}} value="2">
                                                                                                Hợp đồng cấp 2
                                                                                            </option>
                                                                                            <option
                                                                                                {{$data['contract_level']== 3 ? 'selected':''}} value="3">
                                                                                                Hợp đồng cấp 3
                                                                                            </option>
                                                                                            <option
                                                                                                {{$data['contract_level']== 4 ? 'selected':''}} value="4">
                                                                                                Hợp đồng cấp 4
                                                                                            </option>
                                                                                        </select>
                                                                                        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Chọn
                                                                                            loại hợp đồng</label>
                                                                                        <select
                                                                                            name="store_contract_type"
                                                                                            class="form-control">
                                                                                            <option
                                                                                                {{$data['store_contract_type']== \App\Enum\CommonEnum::CONTRACT_OTC_NEW_POLICY ? 'selected':''}} value="1">
                                                                                                Hợp đồng chính sách mới
                                                                                            </option>
                                                                                            <option
                                                                                                {{$data['store_contract_type']== \App\Enum\CommonEnum::CONTRACT_OTC_JAPAN ? 'selected':''}} value="2">
                                                                                                Hợp đồng du lịch Nhật
                                                                                                Bản
                                                                                            </option>
                                                                                            <option
                                                                                                {{$data['store_contract_type']== \App\Enum\CommonEnum::CONTRACT_OTC_GERMANY ? 'selected':''}} value="2">
                                                                                                Hợp đồng du lịch Đức
                                                                                            </option>
                                                                                        </select>
                                                                                        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-light"
                                                                                    data-dismiss="modal">Hủy bỏ
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Lưu
                                                                                thay đổi
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
@endsection
