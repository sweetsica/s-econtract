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
                        <h4 class="text-center mb-4">Hồ sơ điện tử Doppelherz Việt Nam</h4>
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                Xuất hợp đồng thất bại, vui lòng kiểm tra lại số điện thoại và mật khẩu
                            </div>
                        @endif
                        @if(Session::has('success-reset password'))
                            <div class="alert alert-success" role="alert">
                                Đổi mật khẩu thành công
                            </div>
                        @endif
                        <form action="{{route('contract.return.export')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label><strong>Mã hợp đồng</strong></label>
                                <input type="text" class="form-control" name="contract_code">
                            </div>
                            <div class="form-group">
                                <label><strong>Mật khẩu</strong></label>
                                <input type="password" class="form-control" name="store_token">
                                <div class="flex text-right pt-2">
                                    <a href="{{asset('/partner/reset-password')}}" > Quên mật khẩu</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Xuất hợp đồng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
