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
                            <form action="{{route('department.update',['id'=>$department->id])}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Tên phòng ban</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nhập tên phòng ban..." value="{{$department->name}}">
                                        @error("name")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <label>Mô tả phòng ban</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Nhập mô tả phòng ban...">{{$department->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <label>Tỉnh / Thành phố</label>
                                        <select onchange="getDistrict(event)" id="provinces_select" class="form-control">
                                            <option selected>Chọn tỉnh/thành phố...</option>
                                            @foreach($local as $local_item)
                                                <option
                                                    {{$department->location->parent->parent->id == $local_item->id ? 'selected' : ''}}
                                                    value="{{$local_item->code}}">{{$local_item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Huyện / Quận</label>
                                        <select onchange="getWard(event)" id="districts_select"  class="form-control">
                                            @foreach($districts as $district)
                                                    <option
                                                        {{$department->location->parent->id == $district->id ? 'selected' : ''}}
                                                        value="{{$district->code}}">{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Xã / Phường</label>
                                        <select id="wards_select" name="location_id"  class="form-control">
                                            <option selected>Chọn xã/phường...</option>
                                            @foreach($wards as $ward)
                                                <option
                                                    {{$department->location->id == $ward->id ? 'selected' : ''}}
                                                    value="{{$ward->id}}">{{$ward->name}}</option>
                                            @endforeach
                                        </select>
                                        @error("location_id")
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

