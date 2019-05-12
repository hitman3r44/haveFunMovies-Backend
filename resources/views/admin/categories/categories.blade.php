@extends('layouts.adminator.master')

@section('title', tr('categories'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('categories') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}
        </a> >
    </li>
    <li class="list-inline-item active"><i class="fa fa-suitcase"></i> {{tr('categories')}} ></li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">

                <div class="row bgc-grey-600 p-10">

                    <div class="col-md-6 text-white">
                        <h3>{{tr('categories')}}</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="{{route('admin.add.category')}}"
                           class="btn btn-default pull-right">{{tr('add_category')}}</a>
                    </div>
                </div>

                <div class="box-body">

                    @if(count($categories) > 0)
                        <div class="table table-responsive">

                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th>{{tr('id')}}</th>
                                    <th>{{tr('category')}}</th>
                                    <th>{{tr('picture')}}</th>
                                    <th>{{tr('sub_categories')}}</th>
                                    <th>{{tr('is_series')}}</th>
                                    <th>{{tr('status')}}</th>
                                    <th>{{tr('action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($categories as $i => $category)

                                    <tr>
                                        <td>{{showEntries($_GET, $i+1)}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <img style="height: 30px;" src="{{$category->picture}}">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.sub_categories' , array('category' => $category->id))}}">
                                                {{count($category->subCategory)}}</a>
                                        </td>
                                        <td>
                                            @if($category->is_series)
                                                <span class="badge badge-success">{{tr('yes')}}</span>
                                            @else
                                                <span class="badge badge-warning">{{tr('no')}}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($category->is_approved)
                                                <span class="badge badge-success">{{tr('approved')}}</span>
                                            @else
                                                <span class="badge badge-warning">{{tr('pending')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="admin-action btn btn-default">

                                                <li class="dropup">

                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        {{tr('action')}} <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li role="presentation">
                                                            @if(Setting::get('admin_delete_control'))
                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('edit')}}</a>
                                                            @else
                                                                <a role="menuitem" tabindex="-1"
                                                                   href="{{route('admin.edit.category' , array('id' => $category->id))}}">{{tr('edit')}}</a>
                                                            @endif
                                                        </li>
                                                        <li role="presentation">

                                                            @if(Setting::get('admin_delete_control'))

                                                                <a role="button" href="javascript:;"
                                                                   class="btn disabled"
                                                                   style="text-align: left">{{tr('delete')}}</a>

                                                            @else

                                                                <a role="menuitem" tabindex="-1"
                                                                   onclick="return confirm(&quot;{{tr('category_delete_confirmation' , $category->name)}}&quot;);"
                                                                   href="{{route('admin.delete.category' , array('category_id' => $category->id))}}">{{tr('delete')}}</a>
                                                            @endif
                                                        </li>

                                                        <li class="divider" role="presentation"></li>

                                                        @if($category->is_approved)
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       onclick="return confirm(&quot;{{tr('category_decline_confirmation' , $category->name)}}&quot;);"
                                                                                       href="{{route('admin.category.approve' , array('id' => $category->id , 'status' =>0))}}">{{tr('decline')}}</a>
                                                            </li>
                                                        @else
                                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                       onclick="return confirm(&quot;{{tr('category_approve_confirmation' , $category->name)}}&quot;);"
                                                                                       href="{{route('admin.category.approve' , array('id' => $category->id , 'status' => 1))}}">{{tr('approve')}}</a>
                                                            </li>
                                                        @endif

                                                        <li class="divider" role="presentation"></li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.add.sub_category' , array('category' => $category->id))}}">{{tr('add_sub_category')}}</a>
                                                        </li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.sub_categories' , array('category' => $category->id))}}">{{tr('view_sub_categories')}}</a>
                                                        </li>

                                                        <li class="divider" role="presentation"></li>

                                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                                   href="{{route('admin.videos' , array('category_id' => $category->id))}}">{{tr('videos')}}</a>
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

                        <div align="right" id="paglink"><?php echo $categories->links(); ?></div>
                    @else
                        <h3 class="no-result">{{tr('no_result_found')}}</h3>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
