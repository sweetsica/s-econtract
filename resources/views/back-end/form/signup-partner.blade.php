{{-- Extends layout --}}
@extends('back-end.layout.fullwidth')
{{-- Content --}}
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row">
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-xl-12">--}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Horizontal Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="1234 Main St">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <div class="dropdown bootstrap-select form-control"><select id="inputState" class="form-control" tabindex="-98">
                                                        <option selected="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" data-id="inputState" title="Choose..."><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Choose...</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    Check me out
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
{{--                        <div class="auth-form">--}}
{{--                            <div class="text-center mb-3">--}}
{{--                                <a href="{!! url('/index'); !!}"><img  src="{{ asset('images/logo-full.png') }}" alt=""></a>--}}
{{--                            </div>--}}
{{--                            <h4 class="text-center mb-4">????ng k?? ?????i l??</h4>--}}
{{--                            <form action="{{route('store.partner')}}" method="POST">--}}
{{--                              @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>T??n c???a h??ng/?????i l??</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="name">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>?????a ch???</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="address">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Qu???n/Huy???n</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="district">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>T???nh/ Th??nh ph???</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="city">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>?????a ch??? nh???n h??ng</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="delivery_address">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Th??nh ph??? nh???n h??ng</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="delivery_city">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>T??n ng?????i ?????i di???n</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_name">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Ng??y sinh</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_birth">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Gi???i t??nh</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_gender">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>S??? ??i???n tho???i</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_phone">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>M?? s??? thu???</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_tax">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Email</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_email">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Website</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_website">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>S??? t??i kho???n</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_bank_number">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>T??n ng??n h??ng</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_bank_name">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>H??? t??n ch??? t??i kho???n</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_bank_holder">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Ph???m vi b??n h??ng</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_type">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Ng??y b???t ?????u</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_startdate">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>Ng??y k???t th??c</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_enddate">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>????ng k?? kinh doanh 1</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_bugdet1">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="mb-1"><strong>????ng k?? kinh doanh 2</strong></label>--}}
{{--                                    <input type="text" class="form-control" name="account_bugdet2">--}}
{{--                                </div>--}}
{{--    --}}
{{--                                <div class="text-center">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--    --}}{{--                        <div class="new-account mt-3">--}}
{{--    --}}{{--                            <p>Don't have an account? <a class="text-primary" href="{!! url('/page-register'); !!}">Sign up</a></p>--}}
{{--    --}}{{--                        </div>--}}
{{--                        </div>--}}
                    </div>

{{--                </div>--}}
{{--            </div>--}}
            </div>
        </div>
    </div>
@endsection
