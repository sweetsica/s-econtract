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
                            <a href="{{route('index')}}"><img  src="{{ asset('images/logo-full.png') }}" alt=""></a>
                        </div>

                        <h4 class="text-center mb-4 font-weight-bold fs-22">Đăng Nhập</h4>
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert alert-danger">
                                Đăng nhập thất bại, vui lòng kiểm tra lại thông tin đăng nhập.
                            </div>
                        @endif
                        <form action="{{route('login.check')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label><strong>Email /  Mã nhân viên</strong></label>
                                <input type="text" class="form-control" name="username"/>
                            </div>
                            <div class="form-group">
                                <label><strong>Mật khẩu</strong></label>
                                <input type="password" class="form-control" name="password"/>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                            </div>
                        </form>
                        {{--                        <div class="text-center pt-4">--}}
                        {{--                            <a href="/login">Đăng nhập với admin</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="px-5 w-100 text-center">
            <div class="d-flex align-items-center justify-content-center mt-3 fs-13">
                <a href="{{route("partner.login")}}" class="mr-2">Đăng Nhập Dành Đối Tác</a>
                <a href="{{route("contract.seach")}}" class="ml-2">Tìm Xuất Hợp Đồng</a>
            </div>
        </div>
    </div>
@endsection
