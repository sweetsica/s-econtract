{{-- Extends layout --}}
@extends('back-end.layout.default')

{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Danh sách</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Phân loại hợp đồng</a></li>
            </ol>
        </div>
        <!-- row -->
        <form method="POST">
            <div class="row">
                @csrf
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Select List</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label>Role : </label>
                                    <select class="form-control" id="role" name="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role['id']}}"
                                                    @if($role['name'] == $userRoleName) selected @endif>{{$role['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Permissions</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-6 col-sm-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input name="permissions[]" type="checkbox" class="custom-control-input"
                                                   id="{{$permission->name}}"
                                                   value="{{$permission->id}}"
                                                   @if(in_array($permission->name,$userPermissionsNames)) checked @endif
                                            >
                                            <label class="custom-control-label"
                                                   for="{{$permission->name}}">{{ ucfirst($permission->name) }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button>submit</button>
        </form>
    </div>
@endsection