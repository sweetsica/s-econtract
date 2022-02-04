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
                        <h4 class="text-center mb-4">Đăng ký hồ sơ điện tử Doppelherz Việt Nam</h4>
                        <form action="{!! url('/index'); !!}">
                            <div class="form-group">
                                <label><strong>Mã truy cập</strong></label>
                                <input type="password" class="form-control" value="Password">
                            </div>
                            <div class="text-center">
                                <a href="{{route('dashboard')}}"><button type="submit" class="btn btn-primary btn-block">Unlock</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
