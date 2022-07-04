@extends('back-end.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Phòng ban</h2>
{{--                <p class="mb-0">Welcome to Omah Property Admin</p>--}}
            </div>
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>--}}
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded"><i--}}
{{--                    class="flaticon-381-settings-2 mr-0"></i></a>--}}
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tạo phòng ban</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/department/create/submit')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Tên phòng ban</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nhập tên phòng ban...">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <label>Mô tả phòng ban</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả phòng ban..."></textarea>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <label>Tỉnh / Thành phố</label>
                                        <select onchange="getDistrict(event)" id="provinces_select" class="form-control">
                                            <option selected>Chọn tỉnh/thành phố...</option>
                                            @foreach($local as $local_item)
                                                <option value="{{$local_item->code}}">{{$local_item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Huyện / Quận</label>
                                        <select onchange="getWard(event)" id="districts_select" disabled class="form-control">
                                            <option selected>Chọn huyện/quận...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Xã / Phường</label>
                                        <select id="wards_select" name="location_id" disabled class="form-control">
                                            <option selected>Chọn xã/phường...</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo phòng ban</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
