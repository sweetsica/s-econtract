{{-- Extends layout --}}
@extends('back-end.layout.default')


{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head page-titles d-flex  align-items-center">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Hợp đồng của đối tác</h2>
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Property</a></li>--}}
{{--                    <li class="breadcrumb-item"><a href="javascript:void(0)">98AB Alexander Court New York</a></li>--}}
{{--                </ol>--}}
            </div>
            {{--            <a href="javascript:void(0);" class="btn btn-danger rounded mr-3">Update Info</a>--}}
            {{--            <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>--}}
            {{--            <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="flaticon-381-settings-2 mr-0"></i></a>--}}
        </div>
        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    {{--                    <div class="col-xl-12">--}}
                    {{--                        <div class="card bg-primary text-center">--}}
                    {{--                            <div class="card-body">--}}
                    {{--                                <h2 class="fs-30 text-white">SALE</h2>--}}
                    {{--                                <span class="text-white font-w300">$400.000 - $600.000</span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="col-xl-12 col-lg-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="position-relative mb-3 d-inline-block">
                                    <img src="https://doppelherz.vn/wp-content/uploads/2022/01/LOGO-DOPPELHERZ-Logo-tren-an-pham-792x800.png" alt="" class="rounded" width="140">
                                    {{--                                    <a href="app-profile.html" class="profile-icon"><i class="las la-cog"></i></a>--}}
                                </div>
                                <h4 class="text-black fs-20 font-w600">{{$info_data_partner['owner_name']}}</h4>
                                <span class="mb-3 text-black d-block">Người đại diện / Đối tác</span>
                                {{--                                <p>Midnight Corner St. Suite 600 San Francisco, CADGE 94107</p>--}}
{{--                                <ul class="property-social">--}}
{{--                                    <li><a href="javascript:void(0);"><i class="lab la-instagram"></i></a></li>--}}
{{--                                    <li><a href="javascript:void(0);"><i class="lab la-facebook-f"></i></a></li>--}}
{{--                                    <li><a href="javascript:void(0);"><i class="lab la-twitter"></i></a></li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <a href="javascript:void(0);" class="btn btn-outline-primary d-block rounded">
                                    <i class="las la-phone scale5 mr-2"></i>
                                    {{$info_data_partner['owner_phone']}}</a>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="col-xl-12 col-lg-6 col-md-12">--}}
                    {{--                        <div class="card">--}}
                    {{--                            <div class="card-header mb-0 border-0">--}}
                    {{--                                <h3 class="fs-20 mb-0 text-black">Property Location</h3>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body pt-0 text-center">--}}
                    {{--                                <img  src="{{ asset('images/map.jpg') }}" alt="" class="w-100">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-footer border-0 p-0">--}}
                    {{--                                <a href="javascript:void(0);" class="btn btn-primary d-block rounded">View in Full Screen</a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-xl-12 col-lg-6 col-md-12">--}}
                    {{--                        <div class="card">--}}
                    {{--                            <div class="card-header mb-0 border-0 pb-0">--}}
                    {{--                                <h3 class="fs-20 text-black mb-0">Owner History</h3>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="card-body pt-4">--}}
                    {{--                                <div class="media mb-3 mb-sm-4">--}}
                    {{--                                    <img  src="{{ asset('images/customers/10.jpg') }}" alt="" class="rounded mr-3" width="52">--}}
                    {{--                                    <div class="media-body">--}}
                    {{--                                        <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">James Humbly</a></h4>--}}
                    {{--                                        <span class="fs-14 d-block mb-2">2 June 2018 - 4 June 2019</span>--}}
                    {{--                                        <div class="star-icons">--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="media mb-3 mb-sm-4">--}}
                    {{--                                    <img  src="{{ asset('images/customers/11.jpg') }}" alt="" class="rounded mr-3" width="52">--}}
                    {{--                                    <div class="media-body">--}}
                    {{--                                        <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">Erico Lee</a></h4>--}}
                    {{--                                        <span class="fs-14 d-block mb-2">2 June 2018 - 4 June 2019</span>--}}
                    {{--                                        <div class="star-icons">--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="media">--}}
                    {{--                                    <img  src="{{ asset('images/customers/12.jpg') }}" alt="" class="rounded mr-3" width="52">--}}
                    {{--                                    <div class="media-body">--}}
                    {{--                                        <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">Cindy Samantha</a></h4>--}}
                    {{--                                        <span class="fs-14 d-block mb-2">2 June 2018 - 4 June 2019</span>--}}
                    {{--                                        <div class="star-icons">--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                            <i class="las la-star fs-16"></i>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header w-full d-flex">
                                    <div class="mr-auto mb-md-0 mb-2">
                                        <h2 class="font-w600 fs-20 text-black">Thông tin đối tác</h2>

                                        {{--                                            <span class="fs-18">--}}
                                        {{--														<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--															<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9475 4.78947C8.94136 4.78947 7.02346 5.55047 5.61418 6.89569C4.20599 8.23987 3.42116 10.056 3.42116 11.9426C3.42116 14.7033 5.29958 17.3631 7.32784 19.4068C8.3259 20.4124 9.32653 21.2351 10.0786 21.8068C10.434 22.077 10.7326 22.29 10.9475 22.4389C11.1623 22.29 11.4609 22.077 11.8163 21.8068C12.5684 21.2351 13.569 20.4124 14.5671 19.4068C16.5954 17.3631 18.4738 14.7033 18.4738 11.9426C18.4738 10.056 17.689 8.23987 16.2808 6.89569C14.8715 5.55047 12.9536 4.78947 10.9475 4.78947ZM10.9475 23.2632C10.5801 23.8404 10.58 23.8403 10.5797 23.8401L10.5792 23.8398L10.5774 23.8387L10.5718 23.835L10.5517 23.8221C10.5345 23.8109 10.5097 23.7948 10.4779 23.7737C10.4143 23.7317 10.3224 23.6701 10.2063 23.5901C9.97419 23.43 9.64481 23.1959 9.25054 22.8962C8.46315 22.2977 7.41114 21.4333 6.35658 20.3707C4.27957 18.278 2.05273 15.2776 2.05273 11.9426C2.05273 9.67199 2.99797 7.50121 4.66932 5.90583C6.33959 4.31148 8.59845 3.42105 10.9475 3.42105C13.2965 3.42105 15.5554 4.31148 17.2256 5.90583C18.897 7.50121 19.8422 9.67199 19.8422 11.9426C19.8422 15.2776 17.6154 18.278 15.5384 20.3707C14.4838 21.4333 13.4318 22.2977 12.6444 22.8962C12.2501 23.1959 11.9207 23.43 11.6886 23.5901C11.5725 23.6701 11.4806 23.7317 11.417 23.7737C11.3979 23.7864 11.3814 23.7972 11.3675 23.8063C11.3582 23.8124 11.3501 23.8176 11.3432 23.8221L11.3232 23.835L11.3175 23.8387L11.3158 23.8398L11.3152 23.8401C11.315 23.8403 11.3148 23.8404 10.9475 23.2632ZM10.9475 23.2632L11.3148 23.8404C11.0907 23.983 10.8043 23.983 10.5801 23.8404L10.9475 23.2632Z" fill="#666666"/>--}}
                                        {{--															<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9474 10.2632C9.81378 10.2632 8.89479 11.1822 8.89479 12.3158C8.89479 13.4494 9.81378 14.3684 10.9474 14.3684C12.0811 14.3684 13.0001 13.4494 13.0001 12.3158C13.0001 11.1822 12.0811 10.2632 10.9474 10.2632ZM7.52637 12.3158C7.52637 10.4264 9.05802 8.89474 10.9474 8.89474C12.8368 8.89474 14.3685 10.4264 14.3685 12.3158C14.3685 14.2052 12.8368 15.7368 10.9474 15.7368C9.05802 15.7368 7.52637 14.2052 7.52637 12.3158Z" fill="#666666"/>--}}
                                        {{--														</svg>--}}
                                        {{--													45 Connor St. London, 44523</span>--}}
                                    </div>
                                    <div class="ml-md-4 text-md-right">
                                        <p class="fs-14 text-black mb-1 mr-1">Ngày tạo</p>
                                        <h4 class="fs-24 text-primary">{{ format_date($info_data_partner['created_at'])}}</h4>
                                    </div>
                            </div>
                            <div class="card-body">

                                <div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12 fs-20 mb-3">
                                                <span
                                                    class="font-w600 text-black">Email:</span> {{$info_data_partner->owner_email}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Giới tính:</span> {{$info_data_partner->owner_sex}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Ngày sinh:</span> {{$info_data_partner->owner_dob}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Tuổi:</span> {{$info_data_partner->owner_age}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">MST Cá nhân:</span> {{$info_data_partner->owner_mst}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">CCCD/CMND:</span> {{$info_data_partner->owner_id_numb}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Ngày cấp:</span> {{$info_data_partner->owner_id_numb_created_at}}
                                            </div>
                                            <div class="col-md-12 fs-20 mb-3">
                                            <span
                                                class="font-w600 text-black">Nơi cấp:</span> {{$info_data_partner->owner_id_numb_created_locate}}
                                            </div>
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
                                            <form action="{{route('contract.create',[$info_data_partner->id])}}" method="post"
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
                                                                <input required name="store_bank"
                                                                       value="{{old('store_bank')}}"
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
                                    @foreach($info_data_partner->contract as $data)
                                        <div class="accordion__item">
                                            <div
                                                class="accordion__header rounded-lg {{$loop->index !== 0 ? 'collapsed' :''}}"
                                                data-toggle="collapse"
                                                data-target="#contract_{{$data['id']}}">
                                                <span class="accordion__header--icon"></span>
                                                <span
                                                    class="accordion__header--text">{{$data['store_name']}}</span>
                                                <span class="accordion__header--indicator"></span>
                                            </div>
                                            <div id="contract_{{$data['id']}}"
                                                 class="collapse accordion__body {{$loop->index == 0 ? 'show' :''}}"
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
                                                                @if($data['store_signed'] == 0)
                                                                    <a href="{{route('contract.show.pdf',$data['id']).'?type=sign'}}"
                                                                       class="btn light  btn-md rounded-lg btn-primary mr-2">
                                                                       Ký hợp đồng
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="fs-14 text-black mb-1 mr-1">Ngày
                                                                    tạo</p>
                                                                <h4 class="fs-24 text-primary">{{format_date($data['created_at'])}}</h4>
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
                                                                        class="font-w600 text-black">Cấp độ hợp đồng:</span> Hợp đồng cấp {{$data['contract_level']}}
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
                                                                        class="font-w600 text-black">Ngày cấp GPĐKKD:</span> {{format_date($data['store_GPDKKD'])}}
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
                                                                        class="font-w600 text-black">Ngày bắt đầu:</span> {{format_date($data['store_started'])}}
                                                            </div>
                                                            <div class="col-md-12 fs-20 mt-3">
                                                                    <span
                                                                        class="font-w600 text-black">Ngày kết thúc:</span> {{format_date($data['store_end'])}}
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
                    <div class="col-md-12">
                        <div class="front-view-slider mb-sm-5 mb-3 owl-carousel">
                            <div class="items">
                                <div class="front-view">
                                    <img src="{{ asset('images/card/1.jpg') }}" alt="">
                                    <div class="info">
                                        <h3 class="fs-30 mb-2 text-white font-w600">Ảnh cửa hàng 1</h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="buttons">
                                        <a href="javascript:void(0);" class="mr-4">
                                            <svg width="25" height="27" viewBox="0 0 25 27" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);">
                                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip1)">
                                                    <path
                                                        d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z"
                                                        fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip1">
                                                        <rect width="29" height="29" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="front-view">
                                    <img src="{{ asset('images/card/2.jpg') }}" alt="">
                                    <div class="info">
                                        <h3 class="fs-30 mb-2 text-white font-w600">Ảnh cửa hàng 2</h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="buttons">
                                        <a href="javascript:void(0);" class="mr-4">
                                            <svg width="25" height="27" viewBox="0 0 25 27" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);">
                                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip2)">
                                                    <path
                                                        d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z"
                                                        fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip2">
                                                        <rect width="29" height="29" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="front-view">
                                    <img src="{{ asset('images/card/3.jpg') }}" alt="">
                                    <div class="info">
                                        <h3 class="fs-30 mb-2 text-white font-w600">Ảnh cửa hàng 3</h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="buttons">
                                        <a href="javascript:void(0);" class="mr-4">
                                            <svg width="25" height="27" viewBox="0 0 25 27" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);">
                                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip3)">
                                                    <path
                                                        d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z"
                                                        fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip3">
                                                        <rect width="29" height="29" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="front-view">
                                    <img src="{{ asset('images/card/4.jpg') }}" alt="">
                                    <div class="info">
                                        <h3 class="fs-30 mb-2 text-white font-w600">Ảnh cửa hàng 4</h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                    </div>
                                    <div class="buttons">
                                        <a href="javascript:void(0);" class="mr-4">
                                            <svg width="25" height="27" viewBox="0 0 25 27" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);">
                                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip4)">
                                                    <path
                                                        d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z"
                                                        fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip4">
                                                        <rect width="29" height="29" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
