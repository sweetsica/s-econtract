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
                {{--                <a href="javascript:void(0);" class="btn btn-danger rounded mr-3">Update Info</a>--}}
                {{--                <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>--}}
                {{--                <a href="javascript:void(0);" class="btn btn-primary rounded"><i--}}
                {{--                        class="flaticon-381-settings-2 mr-0"></i></a>--}}
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
                        {{--                        <div class="col-xl-12 col-lg-12">--}}
                        {{--                            <div class="card text-center">--}}
                        {{--                                <div class="card-body">--}}
                        {{--                                    <div class="position-relative mb-3 d-inline-block">--}}
                        {{--                                        <img src="{{ asset('images/avatar/1.jpg') }}" alt="" class="rounded"--}}
                        {{--                                             width="140">--}}
                        {{--                                        <a href="app-profile.html" class="profile-icon"><i class="las la-cog"></i></a>--}}
                        {{--                                    </div>--}}
                        {{--                                    <h4 class="text-black fs-20 font-w600">{{$data['name']}}</h4>--}}
                        {{--                                    <h3 class="fs-12">ID Hợp đồng: {{$data['id']}}-{{$data['created_at']->format('dmY-His')}}</h3>--}}
                        {{--                                    <span class="mb-3 text-black d-block">{{$data['account_title']}}</span>--}}
                        {{--                                    <p>{{$data['account_birthday']}} - {{$data['account_gender']}}</p>--}}
                        {{--                                    <ul class="property-social">--}}
                        {{--                                        <li><a href='https://{{$data['account_website']}}' target="_blank"><i--}}
                        {{--                                                    class="lab la-instagram"></i></a></li>--}}
                        {{--                                        <li><a href="javascript:void(0);"><i class="lab la-facebook-f"></i></a></li>--}}
                        {{--                                        <li><a href="javascript:void(0);"><i class="lab la-twitter"></i></a></li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="card-footer border-0 pt-0">--}}
                        {{--                                    <a href="javascript:void(0);" class="btn btn-outline-primary d-block rounded">--}}
                        {{--                                        <i class="las la-phone scale5 mr-2"></i>--}}
                        {{--                                        {{$data['account_phone']}}</a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
                        {{--                        <div class="col-xl-12 col-lg-6 col-md-12">--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header mb-0 border-0 pb-0">--}}
                        {{--                                    <h3 class="fs-20 text-black mb-0">Lịch sử chăm sóc</h3>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="card-body pt-4">--}}
                        {{--                                    <div class="media mb-3 mb-sm-4">--}}
                        {{--                                        <img src="{{ asset('images/customers/10.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media mb-3 mb-sm-4">--}}
                        {{--                                        <img src="{{ asset('images/customers/11.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT402</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media">--}}
                        {{--                                        <img src="{{ asset('images/customers/12.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>   <div class="col-xl-12 col-lg-6 col-md-12">--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header mb-0 border-0 pb-0">--}}
                        {{--                                    <h3 class="fs-20 text-black mb-0">Lịch sử chăm sóc</h3>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="card-body pt-4">--}}
                        {{--                                    <div class="media mb-3 mb-sm-4">--}}
                        {{--                                        <img src="{{ asset('images/customers/10.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media mb-3 mb-sm-4">--}}
                        {{--                                        <img src="{{ asset('images/customers/11.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT402</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media">--}}
                        {{--                                        <img src="{{ asset('images/customers/12.jpg') }}" alt="" class="rounded mr-3"--}}
                        {{--                                             width="52">--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <h4 class="fs-16 font-w600 mb-0"><a href="review.html" class="text-black">MT403</a>--}}
                        {{--                                            </h4>--}}
                        {{--                                            <span class="fs-14 d-block mb-2">2 June 2021 - 4 June 2021</span>--}}
                        {{--                                            <div class="star-icons">--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                                <i class="las la-star fs-16"></i>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="front-view-slider mb-sm-5 mb-3 owl-carousel">
{{--                                        <div class="items">--}}
{{--                                            --}}{{--                                            <div class="front-view">--}}
{{--                                            --}}{{--                                                <img src="{{ asset('images/card/1.jpg') }}" alt="">--}}
{{--                                            --}}{{--                                                <div class="info">--}}
{{--                                            --}}{{--                                                    <h3 class="fs-30 mb-2 text-white font-w600">Hình ảnh cửa hàng</h3>--}}
{{--                                            --}}{{--                                                    --}}{{----}}{{--                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>--}}
{{--                                            --}}{{--                                                </div>--}}
{{--                                            --}}{{--                                                <div class="buttons">--}}
{{--                                            --}}{{--                                                    <a href="javascript:void(0);" class="mr-4">--}}
{{--                                            --}}{{--                                                        <svg width="25" height="27" viewBox="0 0 25 27" fill="none"--}}
{{--                                            --}}{{--                                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            --}}{{--                                                            <path--}}
{{--                                            --}}{{--                                                                d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z"--}}
{{--                                            --}}{{--                                                                fill="white"/>--}}
{{--                                            --}}{{--                                                        </svg>--}}
{{--                                            --}}{{--                                                    </a>--}}
{{--                                            --}}{{--                                                    <a href="javascript:void(0);">--}}
{{--                                            --}}{{--                                                        <svg width="29" height="29" viewBox="0 0 29 29" fill="none"--}}
{{--                                            --}}{{--                                                             xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            --}}{{--                                                            <g clip-path="url(#clip1)">--}}
{{--                                            --}}{{--                                                                <path--}}
{{--                                            --}}{{--                                                                    d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z"--}}
{{--                                            --}}{{--                                                                    fill="white"/>--}}
{{--                                            --}}{{--                                                            </g>--}}
{{--                                            --}}{{--                                                            <defs>--}}
{{--                                            --}}{{--                                                                <clipPath id="clip1">--}}
{{--                                            --}}{{--                                                                    <rect width="29" height="29" fill="white"/>--}}
{{--                                            --}}{{--                                                                </clipPath>--}}
{{--                                            --}}{{--                                                            </defs>--}}
{{--                                            --}}{{--                                                        </svg>--}}
{{--                                            --}}{{--                                                    </a>--}}
{{--                                            --}}{{--                                                </div>--}}
{{--                                            --}}{{--                                            </div>--}}
{{--                                        </div>--}}
                                        {{--                                    <div class="items">--}}
                                        {{--                                        <div class="front-view">--}}
                                        {{--                                            <img  src="{{ asset('images/card/2.jpg') }}" alt="">--}}
                                        {{--                                            <div class="info">--}}
                                        {{--                                                <h3 class="fs-30 mb-2 text-white font-w600">Front View</h3>--}}
                                        {{--                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="buttons">--}}
                                        {{--                                                <a href="javascript:void(0);" class="mr-4">--}}
                                        {{--                                                    <svg width="25" height="27" viewBox="0 0 25 27" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <path d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z" fill="white"/>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                                <a href="javascript:void(0);">--}}
                                        {{--                                                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <g clip-path="url(#clip2)">--}}
                                        {{--                                                            <path d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z" fill="white"/>--}}
                                        {{--                                                        </g>--}}
                                        {{--                                                        <defs>--}}
                                        {{--                                                            <clipPath id="clip2">--}}
                                        {{--                                                                <rect width="29" height="29" fill="white"/>--}}
                                        {{--                                                            </clipPath>--}}
                                        {{--                                                        </defs>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="items">--}}
                                        {{--                                        <div class="front-view">--}}
                                        {{--                                            <img  src="{{ asset('images/card/3.jpg') }}" alt="">--}}
                                        {{--                                            <div class="info">--}}
                                        {{--                                                <h3 class="fs-30 mb-2 text-white font-w600">Front View</h3>--}}
                                        {{--                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="buttons">--}}
                                        {{--                                                <a href="javascript:void(0);" class="mr-4">--}}
                                        {{--                                                    <svg width="25" height="27" viewBox="0 0 25 27" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <path d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z" fill="white"/>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                                <a href="javascript:void(0);">--}}
                                        {{--                                                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <g clip-path="url(#clip3)">--}}
                                        {{--                                                            <path d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z" fill="white"/>--}}
                                        {{--                                                        </g>--}}
                                        {{--                                                        <defs>--}}
                                        {{--                                                            <clipPath id="clip3">--}}
                                        {{--                                                                <rect width="29" height="29" fill="white"/>--}}
                                        {{--                                                            </clipPath>--}}
                                        {{--                                                        </defs>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div class="items">--}}
                                        {{--                                        <div class="front-view">--}}
                                        {{--                                            <img  src="{{ asset('images/card/4.jpg') }}" alt="">--}}
                                        {{--                                            <div class="info">--}}
                                        {{--                                                <h3 class="fs-30 mb-2 text-white font-w600">Front View</h3>--}}
                                        {{--                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="buttons">--}}
                                        {{--                                                <a href="javascript:void(0);" class="mr-4">--}}
                                        {{--                                                    <svg width="25" height="27" viewBox="0 0 25 27" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <path d="M19.7501 17.125C18.9899 17.1268 18.2409 17.3083 17.5643 17.6548C16.8877 18.0013 16.3026 18.503 15.8569 19.1188L9.79706 15.0793C10.1789 14.0611 10.1789 12.939 9.79706 11.9207L15.8569 7.88126C16.537 8.80338 17.5237 9.45273 18.6397 9.71264C19.7556 9.97256 20.9277 9.826 21.9453 9.29931C22.9629 8.77261 23.7594 7.9003 24.1915 6.8391C24.6237 5.77789 24.6633 4.59736 24.3032 3.50959C23.943 2.42182 23.2068 1.49812 22.2268 0.904453C21.2467 0.310781 20.0871 0.0860493 18.9562 0.270634C17.8254 0.455218 16.7974 1.03702 16.057 1.91151C15.3166 2.786 14.9123 3.89586 14.9168 5.04168C14.9246 5.21774 14.9424 5.39323 14.9699 5.5673L8.45581 9.91005C7.76161 9.28424 6.90085 8.87314 5.97778 8.72652C5.0547 8.5799 4.10892 8.70406 3.25497 9.08396C2.40102 9.46386 1.67554 10.0832 1.16638 10.867C0.657219 11.6508 0.38623 12.5654 0.38623 13.5C0.38623 14.4347 0.657219 15.3492 1.16638 16.133C1.67554 16.9168 2.40102 17.5362 3.25497 17.9161C4.10892 18.296 5.0547 18.4201 5.97778 18.2735C6.90085 18.1269 7.76161 17.7158 8.45581 17.09L14.9699 21.4327C14.9424 21.6068 14.9246 21.7823 14.9168 21.9583C14.9168 22.9143 15.2002 23.8488 15.7313 24.6436C16.2624 25.4384 17.0173 26.0579 17.9005 26.4238C18.7836 26.7896 19.7555 26.8853 20.693 26.6988C21.6306 26.5123 22.4918 26.052 23.1678 25.376C23.8437 24.7001 24.3041 23.8389 24.4906 22.9013C24.6771 21.9637 24.5813 20.9919 24.2155 20.1087C23.8497 19.2255 23.2302 18.4707 22.4354 17.9396C21.6405 17.4085 20.706 17.125 19.7501 17.125Z" fill="white"/>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                                <a href="javascript:void(0);">--}}
                                        {{--                                                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                        <g clip-path="url(#clip4)">--}}
                                        {{--                                                            <path d="M21.75 0H7.25C5.32718 0 3.48311 0.763837 2.12348 2.12348C0.763837 3.48311 0 5.32718 0 7.25L0 21.75C0 23.6728 0.763837 25.5169 2.12348 26.8765C3.48311 28.2362 5.32718 29 7.25 29H21.75C23.6728 29 25.5169 28.2362 26.8765 26.8765C28.2362 25.5169 29 23.6728 29 21.75V7.25C29 5.32718 28.2362 3.48311 26.8765 2.12348C25.5169 0.763837 23.6728 0 21.75 0V0ZM21.9766 12.4156H20.6172V9.34616L15.4611 14.5L20.6172 19.6557V16.5844H21.9766V21.9766H16.5844V20.6172H19.6543L14.5 15.4611L9.34434 20.6172H12.4156V21.9766H7.02344V16.5844H8.38281V19.6547L13.5389 14.5L8.38508 9.34434V12.4156H7.0257V7.02344H12.4156V8.38281H9.34616L14.5 13.5389L19.6557 8.38508H16.5844V7.0257H21.9766V12.4156Z" fill="white"/>--}}
                                        {{--                                                        </g>--}}
                                        {{--                                                        <defs>--}}
                                        {{--                                                            <clipPath id="clip4">--}}
                                        {{--                                                                <rect width="29" height="29" fill="white"/>--}}
                                        {{--                                                            </clipPath>--}}
                                        {{--                                                        </defs>--}}
                                        {{--                                                    </svg>--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
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


                                        {{--                                        <div class="card">--}}
                                        {{--                                            <div class="card-header">--}}
                                        {{--                                                <h4 class="card-title">Horizontal Form</h4>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="card-body">--}}
                                        {{--                                                <div class="basic-form">--}}
                                        {{--                                                    <form>--}}
                                        {{--                                                        <div class="form-row">--}}
                                        {{--                                                            <div class="form-group col-md-3">--}}
                                        {{--                                                                <label>First Name</label>--}}
                                        {{--                                                                <input type="text" class="form-control"--}}
                                        {{--                                                                       placeholder="1234 Main St">--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="form-group col-md-3">--}}
                                        {{--                                                                <label>Email</label>--}}
                                        {{--                                                                <input type="email" class="form-control"--}}
                                        {{--                                                                       placeholder="Email">--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="form-group col-md-6">--}}
                                        {{--                                                                <label>Password</label>--}}
                                        {{--                                                                <input type="password" class="form-control"--}}
                                        {{--                                                                       placeholder="Password">--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="form-group col-md-6">--}}
                                        {{--                                                                <label>City</label>--}}
                                        {{--                                                                <input type="text" class="form-control">--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="form-row">--}}
                                        {{--                                                            <div class="form-group col-md-4">--}}
                                        {{--                                                                <label>State</label>--}}
                                        {{--                                                                <select id="inputState" class="form-control">--}}
                                        {{--                                                                    <option selected>Choose...</option>--}}
                                        {{--                                                                    <option>Option 1</option>--}}
                                        {{--                                                                    <option>Option 2</option>--}}
                                        {{--                                                                    <option>Option 3</option>--}}
                                        {{--                                                                </select>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                            <div class="form-group col-md-2">--}}
                                        {{--                                                                <label>Zip</label>--}}
                                        {{--                                                                <input type="text" class="form-control">--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="form-group">--}}
                                        {{--                                                            <div class="form-check">--}}
                                        {{--                                                                <input class="form-check-input" type="checkbox">--}}
                                        {{--                                                                <label class="form-check-label">--}}
                                        {{--                                                                    Check me out--}}
                                        {{--                                                                </label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <button type="submit" class="btn btn-primary">Sign in</button>--}}
                                        {{--                                                    </form>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        {{--                                        <div>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //ID: {{$data['id']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Mã hồ sơ: {{$data['id']}}-{{$data['created_at']}}/HĐĐL--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tên trình dược viên {{$data['id_tdv']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tên Đại Lý (agency_name): {{$data['name']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Địa chỉ ĐKKD (address): {{$data['address']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Quận/Huyện (district):--}}
                                        {{--                                            {{$data['district']}}--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tỉnh/TP (city) {{$data['city']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Địa chỉ giao hàng (delivery_address) {{$data['delivery_address']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Quận/Huyện nhận hàng--}}
                                        {{--                                                (delivery_district): {{$data['delivery_district']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tỉnh/TP (delivery_city): {{$data['delivery_city']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tên người đại diện (name): {{$data['account_name']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Chức danh người đại diện (account_title) {{$data['account_title']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Ngày sinh (birthdate): {{$data['account_birth']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Giới tính (gender): {{$data['account_gender']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //SĐT (phone): {{$data['account_phone']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //MST (tax_number): {{$data['account_tax']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Email (email): {{$data['account_email']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Website (website): {{$data['account_website']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //TKNH (bank_account): {{$data['account_bank_number']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tên chủ tài khoản: {{$data['account_bank_name']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Tên ngân hàng: {{$data['account_bank_holder']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Phạm vi BH (agency_type): {{$data['account_type']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Ngày bắt đầu (start_date): {{$data['account_startdate']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Ngày kết thúc (end_date): {{$data['account_enddate']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //ĐKDT N1 (plans_N1): {{$data['account_budget1']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //ĐKDT N2 (plans_N2): {{$data['account_budget2']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Lịch hẹn: {{$data['appointment']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Loại hợp đồng: chậm (0) - nhanh(1): {{$data['type_contract']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Mức độ truy cập: {{$data['access_type']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p>--}}
                                        {{--                                                //Trạng thái: {{$data['status']}}--}}
                                        {{--                                            </p>--}}
                                        {{--                                        </div>--}}
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
                                            {{--                                        <button type="submit" class="btn btn-primary">Sign in</button>--}}
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

                                            {{--                                        <button type="submit" class="btn btn-primary">Sign in</button>--}}
                                        </form>
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

                        {{--                    <div class="col-xl-12">--}}
                        {{--                        <div class="card property-features">--}}
                        {{--                            <div class="card-header border-0 pb-0">--}}
                        {{--                                <h3 class="fs-20 text-black mb-0">Property Features</h3>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="card-body">--}}
                        {{--                                <ul>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Swimming pool</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Terrace</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Radio</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Grill</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Cable TV</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Air conditioning</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Cofee pot</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Balcony</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Computer</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Parquet</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Internet</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Towelwes</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Roof terrace</li>--}}
                        {{--                                    <li><i class="las la-check-circle"></i>Oven</li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
