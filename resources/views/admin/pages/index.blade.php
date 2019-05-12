@extends('layouts.adminator.master')

@section('title', tr('pages'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('pages') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-book"></i> {{tr('pages')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('pages')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.pages.create')}}" style="float:right" class="btn btn-default">{{tr('add_page')}}</a>
                    </div>
                </div>

            <div class="box-body table table-responsive">

                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                          <th>#{{tr('id')}}</th>
                          <th>{{tr('heading')}}</th>
                          <th>{{tr('page_type')}}</th>
                          <th>{{tr('action')}}</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $i => $result)
                
                            <tr>
                                <td>{{showEntries($_GET, $i+1)}}</td>
                                <td><a href="{{route('admin.pages.view', array('id' => $result->id))}}">{{$result->heading}}</a></td>
                               
                                <td>{{$result->type}}</td>
                                
                                <td>

                                    <div class="dropdown">
                                        
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{tr('action')}}
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">

                                            <li>
                                               
                                                <a href="{{route('admin.pages.view', array('id' => $result->id))}}"><b>{{tr('view')}}</b></a>
                                            </li>

                                            <li>
                                                @if(Setting::get('admin_delete_control'))
                                                    <a href="javascript:;" class="btn disabled" style="text-align: left"><b>{{tr('edit')}}</b></a>
                                                @else
                                                    <a href="{{route('admin.pages.edit', array('id' => $result->id))}}"><b>{{tr('edit')}}</b></a>
                                                @endif
                                            </li>

                                            <li>
                                                @if(Setting::get('admin_delete_control'))
                                                    <a href="javascript:;" class="btn disabled" style="text-align: left"><b>{{tr('delete')}}</b></a>

                                                @else
                                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.pages.delete',array('id' => $result->id))}}"><b>{{tr('delete')}}</b></a>

                                                @endif

                                            </li>                                

                                        </ul>

                                    </div>
                                    
                                </td>
                            
                            </tr>

                        @endforeach

                    </tbody>
                
                </table>

                @if(count($data) > 0) <div align="right" id="paglink"><?php echo $data->links(); ?></div> @endif

            </div>
          </div>
        </div>
    </div>

@endsection