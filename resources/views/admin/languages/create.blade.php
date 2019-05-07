@extends('layouts.adminator.master')

@section('title', tr('create_language'))

@section('content-header')
	<h4 class="c-grey-900 mT-10 mB-30"> {{ tr('create_language') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.languages.index')}}"><i class="fa fa-globe"></i>{{tr('languages')}}</a></li>
    <li class="list-inline-item active"><i class="fa fa-globe"></i>&nbsp; {{tr('create_language')}}</li>
@endsection

@section('content')

	<div class="row gap-20">
		<div class="col-md-10">
			<div class="bgc-white p-20 bd">
				<div class="row bgc-grey-400 p-10">
					<div class="col-8">
						<h6 class="c-grey-900"><b>{{tr('create_language')}}</b></h6>
					</div>
					<div class="col-4">
						<a href="{{route('admin.languages.index')}}" style="float:right" class="btn btn-default">{{tr('languages')}}</a>
					</div>
				</div>

	            <form  action="{{(Setting::get('admin_language_control')) ? '' :route('admin.languages.save')}}" method="POST" enctype="multipart/form-data" role="form">
					@csrf
	                <div class="box-body">

	                    <div class="form-group">
	                        <label for="name">{{tr('short_name')}}</label>
	                        <input type="text" class="form-control" name="folder_name" id="name" placeholder="{{tr('example')}} : {{tr('en_tn')}}" required maxlength="4">
	                    </div>

	                    <div class="form-group">
	                        <label for="name">{{tr('language')}}</label>
	                        <div>
		                        <input type="text" class="form-control" name="language" id="name" placeholder="{{tr('example')}} : {{tr('hindi_english')}}" required maxlength="64">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="name">{{tr('file')}}</label>
	                        <input type="file" id="file" name="file" placeholder="{{tr('picture')}}" required>
	                    </div>
	                     
	                </div>

	              <div class="box-footer">
	                    <button type="reset" class="btn btn-danger">{{tr('cancel')}}</button>
	                    @if(Setting::get('admin_language_control') || Setting::get('admin_delete_control'))
	                    <button type="button" class="btn btn-success pull-right" disabled>{{tr('submit')}}</button>
	                    @else
	                    <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
	                    @endif
	              </div>

	            </form>
	        
	        </div>

	    </div>

	</div>
   
@endsection

