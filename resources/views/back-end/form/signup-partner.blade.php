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
                        <h4 class="text-center mb-4">Đăng ký đại lý</h4>
                        <form action="{!! url('/index'); !!}">
                            <div class="form-group">
                                <label class="mb-1"><strong>Họ và tên</strong></label>
                                <input type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Họ và tên</strong></label>
                                <input type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Họ và tên</strong></label>
                                <input type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Họ và tên</strong></label>
                                <input type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Họ và tên</strong></label>
                                <input type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                            </div>
                        </form>
{{--                        <div class="new-account mt-3">--}}
{{--                            <p>Don't have an account? <a class="text-primary" href="{!! url('/page-register'); !!}">Sign up</a></p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
