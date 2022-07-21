{{-- Extends layout --}}
@extends('back-end.layout.fullwidth')
{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="{!! url('/index'); !!}"><img  src="{{ asset('images/logo-full.png') }}" alt=""></a>
                        </div>
                        <h4 class="text-center mb-4">Đăng nhập dành cho đối tác</h4>
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                        @endif
                        <form action="{{route('partner.login.submit')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="account_phone"><strong>Số điện thoại người đại diện</strong></label>
                                <input type="text" class="form-control" id="account_phone" name="partner_info">
                            </div>
                            <div class="form-group">
                                <label for="account_password"><strong>Mật khẩu</strong></label>
                                <input id="account_password" type="password" class="form-control" name="owner_token">
{{--                                <div class="flex text-right pt-2">--}}
{{--                                    <a href="{{asset('/partner/reset-password')}}" > Quên mật khẩu</a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
