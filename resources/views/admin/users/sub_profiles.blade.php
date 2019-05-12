@extends('layouts.adminator.master')

@section('title', tr('sub_profiles'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('sub_profiles') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a></li>
    <li class="list-inline-item"><a href="{{route('admin.users')}}"> <i class="fa fa-user"></i> {{tr('users')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('sub_profiles')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('sub_profiles')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a style="color: white;text-decoration: underline;"
                           href="{{route('admin.users.view' , $user_details->id)}}">
                            {{$user_details ? $user_details->name : ""}}
                        </a>
                    </div>
                </div>

                <div class="box-body">

                    @if(count($sub_profiles) > 0)
                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('sub_profile_name')}}</th>
                                    <th>{{tr('image')}}</th>
                                    <th>{{tr('created_at')}}</th>
                                    <th>{{tr('updated_at')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sub_profiles as $i => $sub_profile_details)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>{{$sub_profile_details->name}}</td>
                                        <td><img src="{{$sub_profile_details->picture}}" style="height: 30px;"/></td>
                                        <td>{{convertTimeToUSERzone($sub_profile_details->created_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</td>
                                        <td>{{convertTimeToUSERzone($sub_profile_details->updated_at, Auth::user()->timezone, 'd-m-Y H:i a')}}</td>
                                        <td>


                                            <ul class="admin-action btn btn-default">
                                                <li class="dropup">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}} <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.user.history', $sub_profile_details->id)}}">{{tr('history')}}</a>
                                                        </li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.user.wishlist', $sub_profile_details->id)}}">{{tr('wishlist')}}</a>
                                                        </li>

                                                    </ul>

                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>

                        <div align="right" id="paglink"><?php echo $sub_profiles->links(); ?></div>

                    @else
                        <h3 class="no-result">{{tr('no_result_found')}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
