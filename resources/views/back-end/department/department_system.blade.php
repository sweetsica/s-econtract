@extends('back-end.layout.default')
{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
            <div class="mr-auto  d-lg-block">
                <h2 class="text-black font-w600">Hệ thống phòng ban</h2>
                {{--                <p class="mb-0">Welcome to Omah Property Admin</p>--}}
            </div>
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded light mr-3">Refresh</a>--}}
{{--            <a href="javascript:void(0);" class="btn btn-primary rounded"><i--}}
{{--                    class="flaticon-381-settings-2 mr-0"></i></a>--}}
        </div>
        <div class="row">
            <div class="col-md-4 d-block h-100">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hệ thống phòng ban</h4>
                    </div>
                    <div class="card-body">
                        <ul id="frontEnd">
                            @foreach($departments as $item)
                                {{--            {{dump($staff)}}--}}
                                <li>
                                    <span class='caret'>{{$item->name}} ({{count($item->members)}})</span>
                                    <ul class="nested">
                                        {{memberRecursive($item->members)}}
                                    </ul>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách thành viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850" data-ordering="false">
                                <thead>
                                <tr>
                                    <th>Mã thành viên</th>
                                    <th>Tên thành viên</th>
                                    <th>Phòng ban</th>
                                    <th>email</th>
                                    <th>Số điện thoại</th>
                                    <th>Tỉnh/Thành phố</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->member_code }}</td>
                                        <td>{{ $member->member_name }}</td>
                                        <td>
                                            @foreach($member->department as $department)
                                                @if(count($member->department) > 1)
                                                    {{$department->name}},
                                                @else
                                                    {{$department->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ $member->location?->parent?->parent?->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
