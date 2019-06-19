@extends('layouts.adminator.master')

@section('title', tr('edit_role'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_role') }}</h4>
@endsection


@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('edit_role')}}</li>
@endsection


@section('content')

    <div class="row gap-20 ">
        <div class="bgc-white p-20 bd card">
            <div class="offset-1 col-md-10 ">
                <div class="card-heading font-bold">
                    <div class="row">
                        <div class="col-md-9">
                            <p class="m-n font-thin h3">{{tr('edit_role')}}-{{tr('permission')}} : {{ ucwords($role->name)}}</p>
                        </div>
                        <div class="col-md-3 pull-right">
                            <a href="{{route('admin.role.index')}}" class="btn btn-info btn-sm"><i
                                        class="fa fa-list-ul"></i>&nbsp;&nbsp;All Roll</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 col-xs-12">
                        <form class="bs-example form-horizontal"
                              action="{{ route('admin.role.update', $role->id) }}"
                              method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label>Permissions</label>
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        @php $i = 1; @endphp
                                        @foreach($permissions as $permission)
                                            <label class="checkbox-inline i-checks">
                                                <input name="permissions[]" type="checkbox"
                                                       {{ (in_array($permission['name'], $role->permissions->pluck('name')->toArray())) ? 'checked' : '' }}
                                                       value="{{$permission['name']}}"><i></i> {{ ucwords($permission['name'])  }}
                                                <small style="width: 60px;display: inline-block;">{{$permission['module'] }}</small>
                                            </label>

                                            @if($i%5 == 0)
                                    </div>
                                </div>
                                <div class="col-md-12 card">
                                    <div class="card-body">
                                        @endif
                                        @php $i++ @endphp
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input class="btn btn-primary" type="submit" value="Update Roll">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

