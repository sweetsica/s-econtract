<div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Hợp đồng</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Tổng hợp</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('contract.dashboard')}}">Danh sách hợp đồng</a></li>
                                    <li><a href="{{route('contract.dashboard1')}}">Hợp đồng cấp 1</a></li>
                                    <li><a href="{{route('contract.dashboard2')}}">Hợp đồng cấp 2</a></li>
                                    <li><a href="{{route('contract.dashboard3')}}">Hợp đồng cấp 3</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Phân loại</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('contract.list')}}">Tổng hợp phân loại</a>
                                    <li><a href="{{route('contract.list.done')}}">Hợp đồng chưa được duyệt</a></li>
                                    <li><a href="{{route('contract.list.pending')}}">Hợp đồng đã được duyệt</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contract.seach')}}">Tìm xuất hợp đồng</a></li>
                            <li><a href="{{route('contract.show',1)}}">Chi tiết hợp đồng</a></li>
                            <li><a href="{{route('upload_pdf')}}">Tải lên hợp đồng</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">API</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/app-calender'); !!}">Document</a></li>
                            <li><a href="{!! url('/app-calender'); !!}">Add</a></li>
                            <li><a href="{!! url('/app-calender'); !!}">List</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Version</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/app-calender'); !!}">List</a></li>
                            <li><a href="{!! url('/app-calender'); !!}">Add</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-controls-3"></i>
                            <span class="nav-text">Tính năng khác</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('contract.signature')}}">Signature</a></li>
                            <li><a href="{{route('contract.doppelherzsign')}}">Chữ ký giám đốc vùng</a></li>
                        </ul>
                    </li>
                </ul>

				<div class="copyright">
					<p><strong>Hợp đồng điện tử Doppelherz</strong><br> ©All Rights Reserved</p>
					<p>Powered by Ngọc Bảo - Sweetsica</p>
				</div>
			</div>
        </div>
