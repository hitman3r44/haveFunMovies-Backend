@extends('layouts.adminator.master')

@section('title', tr('users'))

@section('content-header')

    {{tr('users')}}

    <a href="#" id="help-popover" class="btn btn-danger" style="font-size: 14px;font-weight: 600"
       title="{{tr('any_help')}}">{{tr('help_ques_mark')}}</a>

    <div id="help-content" style="display: none">

        <ul class="popover-list">
            <li><span class="text-green"><i class="fa fa-check-circle"></i></span> - {{tr('paid_subscribed_users')}}
            </li>
            <li><span class="text-red"><i class="fa fa-times"></i></span> -{{tr('unpaid_unsubscribed_user')}}</li>
            <li><b>{{tr('validity_days')}} - </b>{{tr('expiry_days_subscription_user')}}</li>
            <li><b>{{tr('upgrade')}} - </b>{{tr('admin_moderator_upgrade_option')}}</li>
        </ul>

    </div>

@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item active"><i class="fa fa-user"></i> {{tr('users')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('users')}}</h3>
                    </div>
                    <div class="col-md-6">
                        @if(isset($subscription))-
                        <a style="color: white;text-decoration: underline;"
                           href="{{route('admin.subscriptions.view' , $subscription->unique_id)}}">
                            {{ $subscription->title }}
                        </a>@endif

                        <a href="{{route('admin.users.create')}}"
                           class="btn btn-default pull-right">{{tr('add_user')}}</a>

                        <!-- EXPORT OPTION START -->

                        @if(count($users) > 0 )

                            <ul class="admin-action btn btn-default pull-right" style="margin-right: 20px">

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        {{tr('export')}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation">
                                            {{--<a role="menuitem" tabindex="-1"--}}
                                               {{--href="{{route('admin.users.export' , ['format' => 'xls'])}}">--}}
                                                {{--<span class="text-red"><b>{{tr('excel_sheet')}}</b></span>--}}
                                            {{--</a>--}}
                                        </li>

                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1"
                                               href="{{route('admin.users.export' , ['format' => 'csv'])}}">
                                                <span class="text-blue"><b>{{tr('csv')}}</b></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        @endif
                    </div>

                </div>


                <div class="box-body">

                    @if(count($users) > 0)

                        <div class="table table-responsive">

                            <table id="dataTable-export" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('username')}}</th>
                                    <th>{{tr('email')}}</th>
                                    {{--											<th>{{tr('upgrade')}}</th>--}}
                                    <th>{{tr('validity_days')}}</th>
                                    <th>{{tr('active_plan')}}</th>
                                    {{--											<th>{{tr('sub_profiles')}}</th>--}}
                                    <th>{{tr('clear_login')}}</th>
                                    <th>{{tr('status')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>

                                </thead>

                                <tbody>
                                @foreach($users as $i => $user)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>
                                            <a href="{{route('admin.users.view' , $user->id)}}">
                                                {{$user->name}}

                                                @if($user->user_type)

                                                    <span class="text-green pull-right"><i
                                                                class="fa fa-check-circle"></i></span>

                                                @else

                                                    <span class="text-red pull-right"><i class="fa fa-times"></i></span>

                                                @endif
                                            </a>
                                        </td>

                                        <td>{{$user->email}}</td>

                                        {{--										      	<td>--}}
                                        {{--										      		@if($user->is_moderator)--}}
                                        {{--										      			<a onclick="return confirm(&quot;{{tr('disable_user_to_moderator',$user->name)}}&quot;);" href="{{route('admin.users.upgrade.disable' , array('id' => $user->id, 'moderator_id' => $user->moderator_id))}}" class="badge badge-warning" title="Do you want to remove the user from Moderator Role?">{{tr('disable')}}</a>--}}
                                        {{--										      		@else--}}
                                        {{--										      			<a onclick="return confirm(&quot;{{tr('upgrade_user_to_moderator',$user->name)}}&quot;);" href="{{route('admin.users.upgrade' , array('id' => $user->id ))}}" class="badge badge-danger" title="Do you want to change the user as Moderator ?">{{tr('upgrade')}}</a>--}}
                                        {{--										      		@endif--}}

                                        {{--										      	</td>--}}

                                        <td>
                                            @if($user->user_type)
                                                {{get_expiry_days($user->id)}}
                                            @endif
                                        </td>

                                        <td>
                                            <?php echo active_plan($user->id);?>
                                        </td>

                                        {{--										      	<td>--}}
                                        {{--										      		<a role="menuitem" tabindex="-1" href="{{route('admin.users.subprofiles',  $user->id)}}"><span class="badge badge-primary">--}}
                                        {{--										      			{{count($user->subProfile)}} {{tr('sub_profiles')}}</span>--}}
                                        {{--										      		</a>--}}
                                        {{--										      	</td>--}}

                                        <td class="text-center">

                                            <a href="{{route('admin.users.clear-login', ['id'=>$user->id])}}"><span
                                                        class="badge badge-warning">{{tr('clear')}}</span></a>

                                        </td>

                                        <td>
                                            @if($user->is_activated)

                                                <span class="badge badge-success">{{tr('approve')}}</span>

                                            @else

                                                <span class="badge badge-warning">{{tr('pending')}}</span>

                                            @endif

                                        </td>

                                        <td>
                                            <ul class="admin-action btn btn-default">
                                                <li class="@if($i < 2) dropdown @else dropup @endif">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}} <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.users.edit' , array('id' => $user->id))}}">{{tr('edit')}}</a>
                                                        </li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.users.view' , $user->id)}}">{{tr('view')}}</a>
                                                        </li>

                                                        @if($user->is_activated)
                                                            <li role="presentation"><a role="menuitem"
                                                                                       onclick="return confirm(&quot;{{$user->name}} - {{tr('user_decline_confirmation')}}&quot;);"
                                                                                       tabindex="-1"
                                                                                       href="{{route('admin.users.status.change' , array('id'=>$user->id))}}"> {{tr('decline')}}</a>
                                                            </li>
                                                        @else
                                                            <li role="presentation"><a role="menuitem"
                                                                                       onclick="return confirm(&quot;{{$user->name}} - {{tr('user_approve_confirmation')}}&quot;);"
                                                                                       tabindex="-1"
                                                                                       href="{{route('admin.users.status.change' , array('id'=>$user->id))}}">
                                                                    {{tr('approve')}} </a></li>
                                                        @endif

                                                        @if(!$user->is_verified)

                                                            <li role="presentation" class="divider"></li>
                                                            <li role="presentation">
                                                                <a role="menuitem" tabindex="-1"
                                                                   href="{{route('admin.users.verify' , $user->id)}}">{{tr('verify')}}</a>
                                                            </li>
                                                        @endif

                                                        <li role="presentation" class="divider"></li>

                                                        {{--											                  	<li role="presentation">--}}
                                                        {{--											                  		<a role="menuitem" tabindex="-1" href="{{route('admin.users.subprofiles',  $user->id)}}">{{tr('sub_profiles')}}</a>--}}
                                                        {{--											                  	</li>--}}

                                                        <li role="presentation">
                                                            @if(Setting::get('admin_delete_control'))
                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('delete')}}</a>
                                                            @elseif(get_expiry_days($user->id) > 0)



                                                                <a role="menuitem" tabindex="-1"
                                                                   href="{{route('admin.users.delete', array('id' => $user->id))}}">{{tr('delete')}}
                                                                </a>
                                                            @else
                                                                <a role="menuitem" tabindex="-1"
                                                                   onclick="return confirm(&quot;{{tr('admin_user_delete_confirmation' , $user->name)}}&quot;);"
                                                                   href="{{route('admin.users.delete', array('id' => $user->id))}}">{{tr('delete')}}
                                                                </a>
                                                            @endif

                                                        </li>
                                                        <li role="presentation" class="divider"></li>

                                                        <?php /*<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.user.history', $user->id)}}">{{tr('history')}}</a></li>

											                  	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.user.wishlist', $user->id)}}">{{tr('wishlist')}}</a></li> */?>
                                                        <li>
                                                            <a href="{{route('admin.subscriptions.plans' , $user->id)}}">
                                                                <span class="text-green"><b><i class="fa fa-eye"></i>&nbsp;{{tr('subscription_plans')}}</b></span>
                                                            </a>

                                                        </li>


                                                    </ul>
                                                </li>
                                            </ul>

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>

                            </table>

                            <div align="right" id="paglink"><?php echo $users->links(); ?></div>

                        </div>

                    @else
                        <h3 class="no-result">{{tr('no_user_found')}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection







@section('scripts')

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable-export').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
