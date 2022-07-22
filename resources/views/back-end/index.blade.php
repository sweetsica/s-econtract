{{-- Extends layout --}}
@extends('back-end.layout.fullwidth')
{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content bg-white">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form text-center">
                        <div class="text-center mb-3">
                            <a href="{{route('index')}}"><img  src="{{ asset('images/logo-full.png') }}" alt=""></a>
                        </div>
                        <a href="{{route('member.login')}}" style="width: 100%" class="btn btn-primary w-full mb-3">
                            Đăng nhập dành cho Admin và Thành viên
                        </a>
                        <a href="{{route('partner.login')}}" style="width: 100%" class="btn btn-primary w-full mb-3">
                            Đăng nhập dành cho Đối tác
                        </a>
                        <a href="{{route('contract.seach')}}" style="width: 100%" class="btn btn-primary w-full mb-3">
                            Tìm xuất hợp đồng
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection
