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
                        <li class="breadcrumb-item"><a href="javascript:void(0)"></a>{{$data['contract_code']}}</li>
                    </ol>
                </div>
                <a href="javascript:void(0);" class="btn btn-danger rounded mr-3">Update Info</a>
                <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>
                <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="flaticon-381-settings-2 mr-0"></i></a>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-primary text-center">
                                <div class="card-body">
                                    <h2 class="fs-30 text-white">{{$data['store_name']}}</h2>
                                    <span class="text-white font-w300">{{$data['store_phone']}} - {{$data['store_add_DKKD']}}   </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="position-relative mb-3 d-inline-block">
                                        <img  src="{{ asset('images/avatar/1.jpg') }}" alt="" class="rounded" width="140">
                                        <a href="app-profile.html" class="profile-icon"><i class="las la-cog"></i></a>
                                    </div>
                                    <h4 class="text-black fs-20 font-w600">{{$data['name']}}</h4>
                                    <span class="mb-3 text-black d-block">{{$data['account_title']}}</span>
                                    <p>{{$data['account_birthday']}} - {{$data['account_gender']}}</p>
                                    <ul class="property-social">
                                        <li><a href='https://{{$data['account_website']}}' target="_blank"><i class="lab la-instagram"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="lab la-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="lab la-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-footer border-0 pt-0">
                                    <a href="javascript:void(0);" class="btn btn-outline-primary d-block rounded">
                                        <i class="las la-phone scale5 mr-2"></i>
                                        {{$data['account_phone']}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header mb-0 border-0">
                                    <h3 class="fs-20 mb-0 text-black">Property Location</h3>
                                </div>
                                <div class="card-body pt-0 text-center">
                                    <img  src="{{ asset('images/map.jpg') }}" alt="" class="w-100">
                                </div>
                                <div class="card-footer border-0 p-0">
                                    <a href="javascript:void(0);" class="btn btn-primary d-block rounded">View in Full Screen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header mb-0 border-0 pb-0">
                                    <h3 class="fs-20 text-black mb-0">Lịch sử chăm sóc</h3>
                                </div>
                                <div class="card-body pt-4">
                                    <div class="media mb-3 mb-sm-4">
                                        <img  src="{{ asset('images/customers/10.jpg') }}" alt="" class="rounded mr-3" width="52">
                                        <div class="media-body">
                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a></h4>
                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>
                                            <div class="star-icons">
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-3 mb-sm-4">
                                        <img  src="{{ asset('images/customers/11.jpg') }}" alt="" class="rounded mr-3" width="52">
                                        <div class="media-body">
                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT402</a></h4>
                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>
                                            <div class="star-icons">
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <img  src="{{ asset('images/customers/12.jpg') }}" alt="" class="rounded mr-3" width="52">
                                        <div class="media-body">
                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a></h4>
                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>
                                            <div class="star-icons">
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                                <i class="las la-star fs-16"></i>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="front-view-slider mb-sm-5 mb-3 owl-carousel">
                                        <div class="items">
                                            <div class="front-view">
                                                <img  src="{{ asset('images/card/1.jpg') }}" alt="">
                                                <div class="info">
                                                    <h3 class="fs-30 mb-2 text-white font-w600">Hình ảnh cửa hàng</h3>
                                                </div>
                                                <div class="buttons">
                                                    <a href="javascript:void(0);" class="mr-4">
                                                        <svg width="25" height="27" viewBox="0 0 25 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z" fill="white"/>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip1)">
                                                                <path d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z" fill="white"/>
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
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-primary rounded mb-4">
                                            @if($data['type_contract'] = 1)
                                                Online
                                            @else
                                                Khác
                                            @endif
                                        </a>
                                        <div class="d-md-flex d-block mb-sm-5 mb-3">
                                            <div class="mr-auto mb-md-0 mb-4">
                                                <h2 class="font-w600 text-black">{{$data['name']}}</h2>
                                                <span class="fs-18">
														<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9475 4.78947C8.94136 4.78947 7.02346 5.55047 5.61418 6.89569C4.20599 8.23987 3.42116 10.056 3.42116 11.9426C3.42116 14.7033 5.29958 17.3631 7.32784 19.4068C8.3259 20.4124 9.32653 21.2351 10.0786 21.8068C10.434 22.077 10.7326 22.29 10.9475 22.4389C11.1623 22.29 11.4609 22.077 11.8163 21.8068C12.5684 21.2351 13.569 20.4124 14.5671 19.4068C16.5954 17.3631 18.4738 14.7033 18.4738 11.9426C18.4738 10.056 17.689 8.23987 16.2808 6.89569C14.8715 5.55047 12.9536 4.78947 10.9475 4.78947ZM10.9475 23.2632C10.5801 23.8404 10.58 23.8403 10.5797 23.8401L10.5792 23.8398L10.5774 23.8387L10.5718 23.835L10.5517 23.8221C10.5345 23.8109 10.5097 23.7948 10.4779 23.7737C10.4143 23.7317 10.3224 23.6701 10.2063 23.5901C9.97419 23.43 9.64481 23.1959 9.25054 22.8962C8.46315 22.2977 7.41114 21.4333 6.35658 20.3707C4.27957 18.278 2.05273 15.2776 2.05273 11.9426C2.05273 9.67199 2.99797 7.50121 4.66932 5.90583C6.33959 4.31148 8.59845 3.42105 10.9475 3.42105C13.2965 3.42105 15.5554 4.31148 17.2256 5.90583C18.897 7.50121 19.8422 9.67199 19.8422 11.9426C19.8422 15.2776 17.6154 18.278 15.5384 20.3707C14.4838 21.4333 13.4318 22.2977 12.6444 22.8962C12.2501 23.1959 11.9207 23.43 11.6886 23.5901C11.5725 23.6701 11.4806 23.7317 11.417 23.7737C11.3979 23.7864 11.3814 23.7972 11.3675 23.8063C11.3582 23.8124 11.3501 23.8176 11.3432 23.8221L11.3232 23.835L11.3175 23.8387L11.3158 23.8398L11.3152 23.8401C11.315 23.8403 11.3148 23.8404 10.9475 23.2632ZM10.9475 23.2632L11.3148 23.8404C11.0907 23.983 10.8043 23.983 10.5801 23.8404L10.9475 23.2632Z" fill="#666666"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9474 10.2632C9.81378 10.2632 8.89479 11.1822 8.89479 12.3158C8.89479 13.4494 9.81378 14.3684 10.9474 14.3684C12.0811 14.3684 13.0001 13.4494 13.0001 12.3158C13.0001 11.1822 12.0811 10.2632 10.9474 10.2632ZM7.52637 12.3158C7.52637 10.4264 9.05802 8.89474 10.9474 8.89474C12.8368 8.89474 14.3685 10.4264 14.3685 12.3158C14.3685 14.2052 12.8368 15.7368 10.9474 15.7368C9.05802 15.7368 7.52637 14.2052 7.52637 12.3158Z" fill="#666666"/>
														</svg>
													{{$data['address']}}</span>
                                            </div>
                                            <div class="ml-md-4 text-md-right">
                                                <p class="fs-14 text-black mb-1 mr-1">Ngày đăng ký</p>
                                                <h4 class="fs-24 text-primary">{{$data['created_at']->format('d-m-Y')}}</h4>
                                            </div>
                                        </div>
                                        <div class="mb-sm-5 mb-2">
                                            <a href="javascript:void(0);" class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">
                                                <svg class="mr-2" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.8559 4.49675C21.3906 3.03139 19.6817 1.89671 17.7768 1.12424C15.9372 0.378271 13.9935 0 11.9998 0C10.0061 0 8.06245 0.378271 6.22283 1.12424C4.31792 1.89671 2.60904 3.03139 1.14367 4.49675C0.890918 4.74947 0.890918 5.15923 1.14363 5.41203L3.03417 7.30265C3.15554 7.42403 3.32019 7.49224 3.49178 7.49224H3.49183C3.66347 7.49224 3.82807 7.42407 3.94945 7.30265C6.09977 5.15242 8.95879 3.9682 11.9998 3.9682C15.0407 3.9682 17.8997 5.15242 20.05 7.30265C20.1714 7.42403 20.336 7.49224 20.5076 7.49224C20.6792 7.49224 20.8439 7.42407 20.9652 7.30265L22.8557 5.41203C23.1087 5.15928 23.1087 4.74951 22.8559 4.49675Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 5.34747C9.32727 5.34747 6.81468 6.38818 4.92492 8.27794C4.67217 8.53065 4.67217 8.94042 4.92488 9.19321L6.81542 11.0838C7.06817 11.3366 7.47794 11.3365 7.7307 11.0839C8.87103 9.94367 10.3871 9.31575 11.9997 9.31575C13.6123 9.31575 15.1284 9.94371 16.2687 11.0839C16.3901 11.2053 16.5547 11.2735 16.7264 11.2735C16.898 11.2735 17.0626 11.2053 17.184 11.0839L19.0744 9.19317C19.3271 8.94046 19.3271 8.53069 19.0744 8.27794C17.1848 6.38818 14.6723 5.34747 11.9998 5.34747Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 10.6951C10.7557 10.6951 9.58601 11.1796 8.70619 12.0592C8.58482 12.1806 8.5166 12.3453 8.5166 12.5169C8.5166 12.6885 8.58477 12.8532 8.70619 12.9745L11.5421 15.8105C11.6685 15.9369 11.8341 16 11.9997 16C12.1653 16 12.331 15.9368 12.4574 15.8105L15.2934 12.9745C15.4148 12.8531 15.483 12.6885 15.483 12.5169C15.483 12.3453 15.4148 12.1806 15.2934 12.0593C14.4136 11.1796 13.2439 10.6951 11.9998 10.6951Z" fill="#3B4CB8"/>
                                                </svg>
                                                {{$data['account_bank_holder']}}
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-primary light rounded mr-2 mb-sm-0 mb-2">
                                                <svg class="mr-2" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.8559 4.49675C21.3906 3.03139 19.6817 1.89671 17.7768 1.12424C15.9372 0.378271 13.9935 0 11.9998 0C10.0061 0 8.06245 0.378271 6.22283 1.12424C4.31792 1.89671 2.60904 3.03139 1.14367 4.49675C0.890918 4.74947 0.890918 5.15923 1.14363 5.41203L3.03417 7.30265C3.15554 7.42403 3.32019 7.49224 3.49178 7.49224H3.49183C3.66347 7.49224 3.82807 7.42407 3.94945 7.30265C6.09977 5.15242 8.95879 3.9682 11.9998 3.9682C15.0407 3.9682 17.8997 5.15242 20.05 7.30265C20.1714 7.42403 20.336 7.49224 20.5076 7.49224C20.6792 7.49224 20.8439 7.42407 20.9652 7.30265L22.8557 5.41203C23.1087 5.15928 23.1087 4.74951 22.8559 4.49675Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 5.34747C9.32727 5.34747 6.81468 6.38818 4.92492 8.27794C4.67217 8.53065 4.67217 8.94042 4.92488 9.19321L6.81542 11.0838C7.06817 11.3366 7.47794 11.3365 7.7307 11.0839C8.87103 9.94367 10.3871 9.31575 11.9997 9.31575C13.6123 9.31575 15.1284 9.94371 16.2687 11.0839C16.3901 11.2053 16.5547 11.2735 16.7264 11.2735C16.898 11.2735 17.0626 11.2053 17.184 11.0839L19.0744 9.19317C19.3271 8.94046 19.3271 8.53069 19.0744 8.27794C17.1848 6.38818 14.6723 5.34747 11.9998 5.34747Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 10.6951C10.7557 10.6951 9.58601 11.1796 8.70619 12.0592C8.58482 12.1806 8.5166 12.3453 8.5166 12.5169C8.5166 12.6885 8.58477 12.8532 8.70619 12.9745L11.5421 15.8105C11.6685 15.9369 11.8341 16 11.9997 16C12.1653 16 12.331 15.9368 12.4574 15.8105L15.2934 12.9745C15.4148 12.8531 15.483 12.6885 15.483 12.5169C15.483 12.3453 15.4148 12.1806 15.2934 12.0593C14.4136 11.1796 13.2439 10.6951 11.9998 10.6951Z" fill="#3B4CB8"/>
                                                </svg>
                                                {{$data['account_bank_name']}}
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-primary light rounded mb-sm-0 mb-2">
                                                <svg class="mr-2" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.8559 4.49675C21.3906 3.03139 19.6817 1.89671 17.7768 1.12424C15.9372 0.378271 13.9935 0 11.9998 0C10.0061 0 8.06245 0.378271 6.22283 1.12424C4.31792 1.89671 2.60904 3.03139 1.14367 4.49675C0.890918 4.74947 0.890918 5.15923 1.14363 5.41203L3.03417 7.30265C3.15554 7.42403 3.32019 7.49224 3.49178 7.49224H3.49183C3.66347 7.49224 3.82807 7.42407 3.94945 7.30265C6.09977 5.15242 8.95879 3.9682 11.9998 3.9682C15.0407 3.9682 17.8997 5.15242 20.05 7.30265C20.1714 7.42403 20.336 7.49224 20.5076 7.49224C20.6792 7.49224 20.8439 7.42407 20.9652 7.30265L22.8557 5.41203C23.1087 5.15928 23.1087 4.74951 22.8559 4.49675Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 5.34747C9.32727 5.34747 6.81468 6.38818 4.92492 8.27794C4.67217 8.53065 4.67217 8.94042 4.92488 9.19321L6.81542 11.0838C7.06817 11.3366 7.47794 11.3365 7.7307 11.0839C8.87103 9.94367 10.3871 9.31575 11.9997 9.31575C13.6123 9.31575 15.1284 9.94371 16.2687 11.0839C16.3901 11.2053 16.5547 11.2735 16.7264 11.2735C16.898 11.2735 17.0626 11.2053 17.184 11.0839L19.0744 9.19317C19.3271 8.94046 19.3271 8.53069 19.0744 8.27794C17.1848 6.38818 14.6723 5.34747 11.9998 5.34747Z" fill="#3B4CB8"/>
                                                    <path d="M11.9998 10.6951C10.7557 10.6951 9.58601 11.1796 8.70619 12.0592C8.58482 12.1806 8.5166 12.3453 8.5166 12.5169C8.5166 12.6885 8.58477 12.8532 8.70619 12.9745L11.5421 15.8105C11.6685 15.9369 11.8341 16 11.9997 16C12.1653 16 12.331 15.9368 12.4574 15.8105L15.2934 12.9745C15.4148 12.8531 15.483 12.6885 15.483 12.5169C15.483 12.3453 15.4148 12.1806 15.2934 12.0593C14.4136 11.1796 13.2439 10.6951 11.9998 10.6951Z" fill="#3B4CB8"/>
                                                </svg>
                                                {{$data['account_bank_number']}}
                                            </a>
                                        </div>
                                        <h4 class="text-black fs-20 font-w600">Thông tin khác</h4>
{{--                                        --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Sủa thông tin hồ sơ</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Họ và tên: </label>
                                                                <input type="text" class="form-control" name='name' placeholder="{{$data['store_name']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Ngày sinh: </label>
                                                                <input type="text" class="form-control" name='account_birth' placeholder="{{$data['account_birth']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Giới tính: </label>
                                                                <input type="text" class="form-control" name='account_gender' placeholder="{{$data['account_gender']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Địa chỉ</label>
                                                                <input type="email" class="form-control" name='address' placeholder="{{$data['address']}}">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Quận/Huyện: </label>
                                                                <select id="inputState" name='district' class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Thành phố: </label>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Địa chỉ nhận hàng: </label>
                                                                <input type="email" class="form-control" placeholder="{{$data['name']}}">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Quận/Huyện nhận hàng: </label>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Thành phố nhận hàng: </label>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Họ và tên người đại diện: </label>
                                                                <input type="text" class="form-control" name='account_name' placeholder="{{$data['account_name']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Chức danh người đại diện: </label>
                                                                <input type="text" class="form-control" name='account_title' placeholder="{{$data['account_title']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Số điện thoại: </label>
                                                                <input type="text" class="form-control" name='account_phone' placeholder="{{$data['account_phone']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label>Giới tính: </label>
                                                                <input type="text" class="form-control" name='account_gender' placeholder="{{$data['account_gender']}}">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Số FAX: </label>
                                                                <input type="text" class="form-control" name='account_tax' placeholder="{{$data['account_tax']}}">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Email: </label>
                                                                <input type="text" class="form-control" name='account_email' placeholder="{{$data['account_email']}}">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Website: </label>
                                                                <input type="text" class="form-control" name='account_website' placeholder="{{$data['account_website']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Số tài khoản: </label>
                                                                <input type="text" class="form-control" name='account_bank_number' placeholder="{{$data['account_bank_number']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Họ tên chủ thẻ: </label>
                                                                <input type="text" class="form-control" name='account_bank_name' placeholder="{{$data['account_bank_name']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Tên ngân hàng: </label>
                                                                <input type="text" class="form-control" name='account_bank_holder' placeholder="{{$data['account_bank_holder']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Loại tài khoản: </label>
                                                                <input type="text" class="form-control" name='account_type' placeholder="{{$data['account_type']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Ngày bắt đầu: </label>
                                                                <input type="text" class="form-control" name='account_startdate' placeholder="{{$data['account_startdate']}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Ngày kết thúc: </label>
                                                                <input type="text" class="form-control" name='account_enddate' placeholder="{{$data['account_enddate']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Chỉ tiêu kinh doanh 1: </label>
                                                                <input type="text" class="form-control" name='account_budget1' placeholder="{{$data['account_budget1']}}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Chỉ tiêu kinh doanh 2: </label>
                                                                <input type="text" class="form-control" name='account_budget2' placeholder="{{$data['account_budget2']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label>Mức độ hợp đồng: </label>
                                                                <select id="inputState" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox">
                                                                <label class="form-check-label">
                                                                    Tôi xác nhận những thay đổi trên. Thao tác sẽ được lưu lại.
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p>
                                                //ID: {{$data['id']}}
                                            </p>
                                            <p>
                                                //Mã hồ sơ: {{$data['id']}}-{{$data['created_at']}}/HĐĐL
                                            </p>
                                            <p>
                                                //Tên trình dược viên {{$data['id_tdv']}}
                                            </p>
                                            <p>
                                                //Tên Đại Lý (agency_name): {{$data['name']}}
                                            </p>
                                            <p>
                                                //Địa chỉ ĐKKD (address): {{$data['address']}}
                                            </p>
                                            <p>
                                                //Quận/Huyện (district):
                                                {{$data['district']}}
                                            <p>
                                                //Tỉnh/TP (city) {{$data['city']}}
                                            </p>
                                            <p>
                                                //Địa chỉ giao hàng (delivery_address) {{$data['delivery_address']}}
                                            </p>
                                            <p>
                                                //Quận/Huyện nhận hàng (delivery_district): {{$data['delivery_district']}}
                                            </p>
                                            <p>
                                                //Tỉnh/TP (delivery_city): {{$data['delivery_city']}}
                                            </p>
                                            <p>
                                                //Tên người đại diện (name): {{$data['account_name']}}
                                            </p>
                                            <p>
                                                //Chức danh người đại diện (account_title) {{$data['account_title']}}
                                            </p>
                                            <p>
                                                //Ngày sinh (birthdate): {{$data['account_birth']}}
                                            </p>
                                            <p>
                                                //Giới tính (gender): {{$data['account_gender']}}
                                            </p>
                                            <p>
                                                //SĐT (phone): {{$data['account_phone']}}
                                            </p>
                                            <p>
                                                //MST (tax_number): {{$data['account_tax']}}
                                            </p>
                                            <p>
                                                //Email (email): {{$data['account_email']}}
                                            </p>
                                            <p>
                                                //Website (website): {{$data['account_website']}}
                                            </p>
                                            <p>
                                                //TKNH (bank_account): {{$data['account_bank_number']}}
                                            </p>
                                            <p>
                                                //Tên chủ tài khoản: {{$data['account_bank_name']}}
                                            </p>
                                            <p>
                                                //Tên ngân hàng: {{$data['account_bank_holder']}}
                                            </p>
                                            <p>
                                                //Phạm vi BH (agency_type): {{$data['account_type']}}
                                            </p>
                                            <p>
                                                //Ngày bắt đầu (start_date): {{$data['account_startdate']}}
                                            </p>
                                            <p>
                                                //Ngày kết thúc (end_date): {{$data['account_enddate']}}
                                            </p>
                                            <p>
                                                //ĐKDT N1 (plans_N1): {{$data['account_budget1']}}
                                            </p>
                                            <p>
                                                //ĐKDT N2 (plans_N2): {{$data['account_budget2']}}
                                            </p>
                                            <p>
                                                //Lịch hẹn: {{$data['appointment']}}
                                            </p>
                                            <p>
                                                //Loại hợp đồng: chậm (0) - nhanh(1): {{$data['type_contract']}}
                                            </p>
                                            <p>
                                                //Mức độ truy cập: {{$data['access_type']}}
                                            </p>
                                            <p>
                                                //Trạng thái: {{$data['status']}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="image-gallery owl-carousel">
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/1.png') }}" alt="">
                                        </div>
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/2.png') }}" alt="">
                                        </div>
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/3.png') }}" alt="">
                                        </div>
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/1.png') }}" alt="">
                                        </div>
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/2.png') }}" alt="">
                                        </div>
                                        <div class="items">
                                            <img  src="{{ asset('images/gallery/3.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card property-features">
                                <div class="card-header border-0 pb-0">
                                    <h3 class="fs-20 text-black mb-0">Property Features</h3>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li><i class="las la-check-circle"></i>Swimming pool</li>
                                        <li><i class="las la-check-circle"></i>Terrace</li>
                                        <li><i class="las la-check-circle"></i>Radio</li>
                                        <li><i class="las la-check-circle"></i>Grill</li>
                                        <li><i class="las la-check-circle"></i>Cable TV</li>
                                        <li><i class="las la-check-circle"></i>Air conditioning</li>
                                        <li><i class="las la-check-circle"></i>Cofee pot</li>
                                        <li><i class="las la-check-circle"></i>Balcony</li>
                                        <li><i class="las la-check-circle"></i>Computer</li>
                                        <li><i class="las la-check-circle"></i>Parquet</li>
                                        <li><i class="las la-check-circle"></i>Internet</li>
                                        <li><i class="las la-check-circle"></i>Towelwes</li>
                                        <li><i class="las la-check-circle"></i>Roof terrace</li>
                                        <li><i class="las la-check-circle"></i>Oven</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
