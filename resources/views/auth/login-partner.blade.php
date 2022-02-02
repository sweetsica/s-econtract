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
                        <h4 class="text-center mb-4">Đăng nhập đại lý</h4>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <input name="email" type="text" class="form-control" value="hello@example.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Password</strong></label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
