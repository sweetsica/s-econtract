{{-- Extends layout --}}
@extends('back-end.layout.default')

@section('content')
    <div class="container-fluid">
        <div class="form-head page-titles d-flex  align-items-center">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Hợp đồng của đối tác</h2>
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
                                <h4 class="text-black fs-20 font-w600">{{$info_data_partner['owner_name']}}</h4>
                                <span class="mb-3 text-black d-block">Người đại diện / Đối tác</span>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <a href="javascript:void(0);" class="btn btn-outline-primary d-block rounded">
                                    <i class="las la-phone scale5 mr-2"></i>
                                    {{$info_data_partner['owner_phone']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin dối tác</h3>
                        <div class="ml-md-4 text-md-right">
                            <p class="fs-14 text-black  mr-1">Ngày đăng ký</p>
                            <h4 class="fs-24 text-primary">{{$info_data_partner['created_at']->format('d-m-Y')}}</h4>
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
                            {{--                                    <div class="mb-sm-5 mb-2">--}}
                            {{--                                        <a href="javascript:void(0);" class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">--}}
                            {{--                                            <svg class="mr-2" width="28" height="19" viewBox="0 0 28 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                                <path d="M23.1 8.03846C25.7498 8.03846 28 10.2859 28 13.1538V17.5385H25.9V19H24.5V17.5385H3.5V19H2.1V17.5385H0V13.1538C0 10.3876 2.17398 8.03846 4.9 8.03846H23.1ZM21.7 0C23.5821 0 25.2005 1.57962 25.2 3.65385L25.2005 7.14522C24.5639 6.78083 23.8517 6.57692 23.1 6.57692L21.7 6.57618C21.7 5.32466 20.7184 4.38462 19.6 4.38462H15.4C14.8622 4.38462 14.3716 4.59567 14.0001 4.94278C13.629 4.59593 13.1381 4.38462 12.6 4.38462H8.4C7.24044 4.38462 6.30038 5.36575 6.3 6.57619L4.9 6.57692C4.14851 6.57692 3.43653 6.7807 2.8 7.14488V3.65385C2.8 1.68899 4.3096 0 6.3 0H21.7ZM12.6 5.84579C12.9799 5.84579 13.3 6.21117 13.3 6.57692L7.7 6.57618C7.7 6.12909 8.04101 5.84615 8.4 5.84615L12.6 5.84579ZM19.6 5.85107C19.9961 5.84578 20.2996 6.20175 20.3 6.57618H14.7C14.7 6.1227 15.041 5.84615 15.4 5.84615L19.6 5.85107Z" fill="#3B4CB8"/>--}}
                            {{--                                            </svg>--}}
                            {{--                                            4 Bedroom--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="javascript:void(0);" class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">--}}
                            {{--                                            <svg class="mr-2" width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                                <path d="M19 10.4211L18.6388 12.249C18.0616 15.1706 15.4406 17.3684 12.5829 17.3684H11.6923L13.4082 22H2.28779V10.4211H19ZM5.14753 0C6.68536 0 8.00727 1.29706 8.00727 2.89474V7.52632H18.8743V8.68421H8.00727V9.26316H1.1439L1.14378 11.0001C0.481336 10.4964 0 9.64309 0 8.68421V2.89474C0 1.33809 1.25234 0 2.85974 0H5.14753Z" fill="#3B4CB8"/>--}}
                            {{--                                            </svg>--}}
                            {{--                                            2 Bathroom--}}
                            {{--                                        </a>--}}
                            {{--                                        <a href="javascript:void(0);" class="btn btn-primary light rounded mb-sm-0 mb-2">--}}
                            {{--                                            <svg class="mr-2" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                                <path d="M22.8559 4.49675C21.3906 3.03139 19.6817 1.89671 17.7768 1.12424C15.9372 0.378271 13.9935 0 11.9998 0C10.0061 0 8.06245 0.378271 6.22283 1.12424C4.31792 1.89671 2.60904 3.03139 1.14367 4.49675C0.890918 4.74947 0.890918 5.15923 1.14363 5.41203L3.03417 7.30265C3.15554 7.42403 3.32019 7.49224 3.49178 7.49224H3.49183C3.66347 7.49224 3.82807 7.42407 3.94945 7.30265C6.09977 5.15242 8.95879 3.9682 11.9998 3.9682C15.0407 3.9682 17.8997 5.15242 20.05 7.30265C20.1714 7.42403 20.336 7.49224 20.5076 7.49224C20.6792 7.49224 20.8439 7.42407 20.9652 7.30265L22.8557 5.41203C23.1087 5.15928 23.1087 4.74951 22.8559 4.49675Z" fill="#3B4CB8"/>--}}
                            {{--                                                <path d="M11.9998 5.34747C9.32727 5.34747 6.81468 6.38818 4.92492 8.27794C4.67217 8.53065 4.67217 8.94042 4.92488 9.19321L6.81542 11.0838C7.06817 11.3366 7.47794 11.3365 7.7307 11.0839C8.87103 9.94367 10.3871 9.31575 11.9997 9.31575C13.6123 9.31575 15.1284 9.94371 16.2687 11.0839C16.3901 11.2053 16.5547 11.2735 16.7264 11.2735C16.898 11.2735 17.0626 11.2053 17.184 11.0839L19.0744 9.19317C19.3271 8.94046 19.3271 8.53069 19.0744 8.27794C17.1848 6.38818 14.6723 5.34747 11.9998 5.34747Z" fill="#3B4CB8"/>--}}
                            {{--                                                <path d="M11.9998 10.6951C10.7557 10.6951 9.58601 11.1796 8.70619 12.0592C8.58482 12.1806 8.5166 12.3453 8.5166 12.5169C8.5166 12.6885 8.58477 12.8532 8.70619 12.9745L11.5421 15.8105C11.6685 15.9369 11.8341 16 11.9997 16C12.1653 16 12.331 15.9368 12.4574 15.8105L15.2934 12.9745C15.4148 12.8531 15.483 12.6885 15.483 12.5169C15.483 12.3453 15.4148 12.1806 15.2934 12.0593C14.4136 11.1796 13.2439 10.6951 11.9998 10.6951Z" fill="#3B4CB8"/>--}}
                            {{--                                            </svg>--}}
                            {{--                                            Wifi Available--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--                    <div class="col-xl-12">--}}
    {{--                        <div class="card">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="image-gallery owl-carousel">--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/1.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/2.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/3.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/1.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/2.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="items">--}}
    {{--                                        <img  src="{{ asset('images/gallery/3.png') }}" alt="">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    <div class="col-xl-12">
        <div class="card">
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
                                            {{--                                                            <div class="col-md-12 fs-20 mt-3">--}}
                                            {{--                                                                @if($data['store_signed'] !== 0 && $data['store_sign_img'])--}}
                                            {{--                                                                    <img--}}
                                            {{--                                                                        style="width: 100%;height: 200px; object-fit: contain"--}}
                                            {{--                                                                        src="{{public_path($data['store_sign_img'])}}"--}}
                                            {{--                                                                        alt="/">--}}
                                            {{--                                                                @endif--}}
                                            {{--                                                            </div>--}}
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
