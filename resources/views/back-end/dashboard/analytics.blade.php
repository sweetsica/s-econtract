{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
                <div class="form-head page-titles d-flex  align-items-center">
					<div class="mr-auto  d-lg-block">
						<h2 class="text-black font-w600">Analytics</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Property</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Analytics</a></li>
						</ol>
					</div>
					<a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>
					<a href="javascript:void(0);" class="btn btn-primary rounded"><i class="flaticon-381-settings-2 mr-0"></i></a>
				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header align-items-center border-0 pb-0">
								<h3 class="fs-20 text-black">Rent Statistic</h3>
								<a class="btn btn-outline-primary rounded" href="javascript:void(0);">Download CSV</a>
							</div>
							<div class="card-body pb-0 pt-0">
								<div class="d-flex align-items-center mb-3">
									<span class="rounded mr-3 bg-success p-3">
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.3458 25.7292H1.35412C0.758283 25.7292 0.270782 25.2417 0.270782 24.6458V9.69583C0.270782 9.42499 0.379116 9.09999 0.595783 8.93749L9.58745 0.541659C9.91245 0.270825 10.3458 0.162492 10.725 0.324992C11.1583 0.541659 11.375 0.920825 11.375 1.35416V24.7C11.375 25.2417 10.8875 25.7292 10.3458 25.7292ZM2.38328 23.6167H9.26245V3.79166L2.38328 10.1833V23.6167Z" fill="white"></path>
											<path d="M24.6458 25.7292H10.2916C9.69578 25.7292 9.20828 25.2417 9.20828 24.6458V11.9167C9.20828 11.3208 9.69578 10.8333 10.2916 10.8333H24.6458C25.2416 10.8333 25.7291 11.3208 25.7291 11.9167V24.7C25.7291 25.2417 25.2416 25.7292 24.6458 25.7292ZM11.375 23.6167H23.6166V12.9458H11.375V23.6167Z" fill="white"></path>
											<path d="M19.5541 25.7292H15.3833C14.7874 25.7292 14.2999 25.2417 14.2999 24.6458V18.0375C14.2999 17.4417 14.7874 16.9542 15.3833 16.9542H19.5541C20.1499 16.9542 20.6374 17.4417 20.6374 18.0375V24.6458C20.6374 25.2417 20.1499 25.7292 19.5541 25.7292ZM16.4666 23.6167H18.5249V19.1208H16.4666V23.6167Z" fill="white"></path>
										</svg>
									</span>
									<div>
										<p class="fs-14 mb-1">Total Rent</p>
										<span class="fs-18 text-black font-w700">1,252 Unit</span>
									</div>
								</div>
								<div id="chartBar"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header align-items-center border-0 pb-0">
								<h3 class="fs-20 text-black">Sales Statistic</h3>
								<a class="btn btn-outline-primary rounded" href="javascript:void(0);">Download CSV</a>
							</div>
							<div class="card-body pb-0 pt-0">
								<div class="d-flex align-items-center mb-3">
									<span class="rounded mr-3 bg-primary p-3">
										<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.3458 25.7292H1.35412C0.758283 25.7292 0.270782 25.2417 0.270782 24.6458V9.69583C0.270782 9.42499 0.379116 9.09999 0.595783 8.93749L9.58745 0.541659C9.91245 0.270825 10.3458 0.162492 10.725 0.324992C11.1583 0.541659 11.375 0.920825 11.375 1.35416V24.7C11.375 25.2417 10.8875 25.7292 10.3458 25.7292ZM2.38328 23.6167H9.26245V3.79166L2.38328 10.1833V23.6167Z" fill="white"></path>
											<path d="M24.6458 25.7292H10.2916C9.69578 25.7292 9.20828 25.2417 9.20828 24.6458V11.9167C9.20828 11.3208 9.69578 10.8333 10.2916 10.8333H24.6458C25.2416 10.8333 25.7291 11.3208 25.7291 11.9167V24.7C25.7291 25.2417 25.2416 25.7292 24.6458 25.7292ZM11.375 23.6167H23.6166V12.9458H11.375V23.6167Z" fill="white"></path>
											<path d="M19.5541 25.7292H15.3833C14.7874 25.7292 14.2999 25.2417 14.2999 24.6458V18.0375C14.2999 17.4417 14.7874 16.9542 15.3833 16.9542H19.5541C20.1499 16.9542 20.6374 17.4417 20.6374 18.0375V24.6458C20.6374 25.2417 20.1499 25.7292 19.5541 25.7292ZM16.4666 23.6167H18.5249V19.1208H16.4666V23.6167Z" fill="white"></path>
										</svg>
									</span>
									<div>
										<p class="fs-14 mb-1">Total Sale</p>
										<span class="fs-18 text-black font-w700">2,346 Unit</span>
									</div>
								</div>
								<div id="chartBar2"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h3 class="fs-20 text-black">Total Revenue</h3>
								<div class="dropdown ml-auto">
									<div class="btn-link" data-toggle="dropdown" >
										<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
									</div>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
							<div class="card-body pt-2 pb-0">
								<div class="d-flex flex-wrap align-items-center">
									<span class="fs-36 text-black font-w600 mr-3">$678,345</span>
									<p class="mr-sm-auto mr-3 mb-sm-0 mb-3">last month $563,443</p>
									<div class="d-flex align-items-center">
										<svg class="mr-3" width="87" height="47" viewBox="0 0 87 47" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M29.8043 20.9254C15.2735 14.3873 5.88029 27.282 3 34.5466V46.2406H85V4.58005C70.8925 -0.868404 70.5398 8.66639 60.8409 19.5633C51.1419 30.4602 47.9677 29.0981 29.8043 20.9254Z" fill="url(#paint0_linear)"/>
											<path d="M3 35.2468C5.88029 27.9822 15.2735 15.0875 29.8043 21.6257C47.9677 29.7984 51.1419 31.1605 60.8409 20.2636C70.5398 9.36665 70.8925 -0.168147 85 5.28031" stroke="#37D159" stroke-width="6"/>
											<defs>
											<linearGradient id="paint0_linear" x1="44" y1="-36.4332" x2="44" y2="45.9686" gradientUnits="userSpaceOnUse">
											<stop stop-color="#37D159" offset=""/>
											<stop offset="1" stop-color="#37D159" stop-opacity="0"/>
											</linearGradient>
											</defs>
										</svg>
										<span class="fs-22 text-success mr-2">7%</span>
										<svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M0 6L6 2.62268e-07L12 6" fill="#37D159"/>
										</svg>
									</div>
								</div>
								<div id="chartTimeline"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body mr-3">	
												<h2 class="fs-36 text-black font-w600">2,356</h2>
												<p class="fs-18 mb-0 text-black font-w500">Properties for Sale</p>
												<span class="fs-13">Target 3k/month</span>
											</div>
											<div class="d-inline-block position-relative donut-chart-sale">
												<span class="donut1" data-peity='{ "fill": ["rgb(60, 76, 184)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>5/8</span>
												<small class="text-primary">71%</small>
												<span class="circle bgl-primary"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body mr-3">	
												<h2 class="fs-36 text-black font-w600">2,206</h2>
												<p class="fs-18 mb-0 text-black font-w500">Properties for Rent</p>
												<span class="fs-13">Target 3k/month</span>
											</div>
											<div class="d-inline-block position-relative donut-chart-sale">
												<span class="donut1" data-peity='{ "fill": ["rgb(55, 209, 90)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>7/8</span>
												<small class="text-success">90%</small>
												<span class="circle bgl-success"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header align-items-center border-0 pb-0">	
										<span class="fs-36 text-black pr-3 d-flex align-items-center font-w600 mr-auto">34%
											<svg class="ml-1" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1.90735e-06 0.499999L7 7.5L14 0.5" fill="#FF6746"/>
											</svg>
										</span>
										<span class="fs-18 text-black">Target This Month</span>
									</div>
									<div class="card-body p-0">
										<canvas id="widgetChart1" class="max-h80"></canvas>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header align-items-center border-0 pb-0">	
										<span class="fs-36 text-black font-w600 mr-auto">4%
											<svg class="ml-1" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1.90735e-06 7.5L7 0.499999L14 7.5" fill="#37D159"/>
											</svg>
										</span>
										<span class="fs-18 text-black">Customers</span>
									</div>
									<div class="card-body p-0">
										<canvas id="widgetChart2" class="max-h80"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3">
						<div class="row">
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-body">
										<p class="mb-2 d-flex  fs-16 text-black font-w500">Product Viewed
											<span class="pull-right ml-auto text-dark fs-14">561/days</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-secondary progress-animated" style="width:75%; height:10px;" role="progressbar">
												<span class="sr-only">75% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex  fs-16 text-black font-w500">Product Listed
											<span class="pull-right ml-auto text-dark fs-14">3,456 Unit</span>
										</p>
										<div class="progress mb-3" style="height:10px">
											<div class="progress-bar bg-secondary progress-animated" style="width:90%; height:10px;" role="progressbar">
												<span class="sr-only">90% Complete</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-sm-6">
								<div class="card">
									<div class="card-body pt-2">
										<div id="chartratio"></div>
										<div class="d-flex mt-3">
											<span class="text-black font-w600 mr-5">
											<svg class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="20" height="20" rx="8" fill="#3B4CB8"></rect>
											</svg>Usage</span>
											<span class="text-black font-w600">
											<svg class="mr-2" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="20" height="20" rx="8" fill="#B655E4"></rect>
											</svg>Insight</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h3 class="fs-20 text-black">Properties Map Location</h3>
								<div class="dropdown ml-auto">
									<div class="btn-link" data-toggle="dropdown" >
										<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
									</div>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-3 col-md-4">
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">Europe
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:75%; height:10px;" role="progressbar">
												<span class="sr-only">75% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">Asia
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:100%; height:10px;" role="progressbar">
												<span class="sr-only">100% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">Africa
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:75%; height:10px;" role="progressbar">
												<span class="sr-only">75% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">Australia
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:50%; height:10px;" role="progressbar">
												<span class="sr-only">50% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">America
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:70%; height:10px;" role="progressbar">
												<span class="sr-only">70% Complete</span>
											</div>
										</div>
										<p class="mb-2 d-flex align-items-center  fs-16 text-black font-w500">South America
											<span class="pull-right text-dark fs-14 ml-2">653 Unit</span>
										</p>
										<div class="progress mb-4" style="height:10px">
											<div class="progress-bar bg-primary progress-animated" style="width:40%; height:10px;" role="progressbar">
												<span class="sr-only">40% Complete</span>
											</div>
										</div>
									</div>
									<div class="col-lg-9 col-md-8">
										<div id="world-map"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
@endsection			