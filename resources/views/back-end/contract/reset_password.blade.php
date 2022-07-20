{{-- Extends layout --}}
@extends('back-end.layout.fullwidth')

{{-- Content --}}
@section('content')
    @php
       $reset_password = \Illuminate\Support\Facades\Session::get('partner_reset_password_id');
    @endphp
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="{!! url('/index'); !!}"><img  src="{{ asset('images/logo-full.png') }}" alt=""></a>
                        </div>
                        <h4 class="text-center mb-4">Hồ sơ điện tử Doppelherz Việt Nam</h4>
                        @if($reset_password !== null)
                            @if (Session::has('success'))
                                <div class="alert alert-outline-success" role="alert">
                                    Đã tìm thấy thông tin của bạn, vui lòng nhập mật khẩu mới
                                </div>
                            @endif
                            <form action="{{url('/partner/reset-password/save')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label><strong>Mật khẩu mới</strong></label>
                                    <input type="password" class="form-control" name="password" >
                                    @error("password")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong>Nhập lại mật khẩu mới</strong></label>
                                    <input type="password" class="form-control" name="confirm_password" >
                                    @error("confirm_password")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Đổi mật khẩu</button>
                                </div>
                            </form>
                        @else
                            <form action="{{url('/partner/checkinfo')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label><strong>Số chứng minh thư / CCCD</strong></label>
                                    <input type="tel" class="form-control" name="id_number">
                                    @error("id_number")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong>Số điện thoại</strong></label>
                                    <input type="tel" class="form-control" name="account_phone">
                                    @error("account_phone")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Yêu cầu đổi mật khẩu</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
