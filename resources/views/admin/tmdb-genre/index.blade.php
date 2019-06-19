@extends('layouts.adminator.master')

@section('title',tr('genres'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('genres') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item active">{{tr('genres')}}</li>

@endsection

@section('content')
    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('genres')}}</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('admin.add.genres')}}"
                           class="btn btn-default pull-right">{{tr('add_genre')}}</a>
                    </div>
                </div>

                <div class="box-body">

                    @if(count($genres) > 0)

                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('name')}}</th>
                                    <th>{{tr('status')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($genres as $i=>$value)
                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>

                                        <td>
                                            <a href="{{route('admin.genre.view',$value->id)}}">{{$value->name}}</a>
                                        </td>

                                        <td>
                                            @if($value->status ==0)
                                                <span class="badge badge-warning">{{tr('declined')}}</span>
                                            @else
                                                <span class="badge badge-success">{{tr('approved')}}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <ul class="admin-action btn btn-default">
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}} <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">

                                                        <li role="presentation">
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.edit.genres',$value->id)}}">{{tr('edit')}}</a>
                                                        </li>

                                                        <li role="presentation">
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.genre.view',$value->id)}}">{{tr('view')}}</a>
                                                        </li>

                                                        <li role="presentation">
                                                            <a class="menuitem" tabindex="-1"
                                                               href="{{route('admin.delete.genre',$value->id)}}"
                                                               onclick="return confirm('Are You Sure?')">{{tr('delete')}}</a>
                                                        </li>

                                                        <li role="presentation">
                                                            @if($value->status == 0)
                                                                <a class="menuitem" tabindex="-1"
                                                                   href="{{route('admin.genre.status',['id'=>$value->id,'status'=>1])}}"
                                                                   onclick="return confirm('Are You Sure?')">{{tr('approve')}} </a>
                                                            @else
                                                                <a class="menuitem" tabindex="-1"
                                                                   href="{{route('admin.genre.status',['id'=>$value->id,'status'=>0])}}"
                                                                   onclick="return confirm('Are You Sure')">{{tr('decline')}}</a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            <div align="right" id="paglink"><?php echo $genres->links(); ?></div>

                            @else
                                <h3 class="no-result">{{tr('genre_result_not_found_error')}}</h3>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
