@extends('layouts.adminator.master')

@section('title', tr('role'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('role') }}</h4>
@endsection


@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('role')}}</li>
@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd card">
                <div class="card-header">
                    <div class="row bgc-grey-600 p-10">
                        <div class="col-md-12 text-white">
                            <h3>{{tr('role')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">

                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:35%">Name</th>
                                <th style="width:25%">Created At</th>
                                <th style="width:25%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($role->created_at)) }}</td>
                                    <td>
                                        <a href="{{ url('admin/role/' . $role->id . '/edit') }}" title="Edit Role">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                      aria-hidden="true"></i> &nbsp;Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
