@extends('layouts.adminator.master')

@section('title', tr('redeems'))

@section('content-header')
	<h4 class="c-grey-900 mT-10 mB-30"> {{ tr('redeems') . ' - '. isset($moderator->name) ? $moderator->name : '' }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.moderators')}}"><i class="fa fa-users"></i> {{tr('moderators')}}</a></li>
    @if($moderator)
    	<li class="list-inline-item"><a href="{{route('admin.moderator.view',$moderator->id)}}"><i class="fa fa-users"></i> {{tr('view_moderator')}}</a></li>
    @endif
    <li  class="list-inline-item active"><i class="fa fa-trophy"></i> {{tr('redeems')}}</li>
@endsection

@section('content')
	<div class="row gap-20">
		<div class="col-md-12">
			<div class="bgc-white p-20 bd">

				<div class="row bgc-grey-600 p-10">

					<div class="col-md-6 text-white">
						<h3>{{tr('redeems')}}</h3>
					</div>

					<div class="col-md-6">
						<a href="{{route('admin.moderators')}}" class="btn btn-default pull-right">{{tr('view_moderators')}}</a>
					</div>
				</div>

            	
            	<div class="box-body">

					<table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
						   width="100%">

						<thead>
						    <tr>
						      <th>{{tr('id')}}</th>
						      <th>{{tr('moderator')}}</th>
						      <th>{{tr('redeem_amount')}}</th>
						      <th>{{tr('paid_amount')}}</th>
						      <th>{{tr('payment_mode')}}</th>
						      <th>{{tr('sent_date')}}</th>
						      <th>{{tr('status')}}</th>
						      <th>{{tr('action')}}</th>
						    </tr>
						
						</thead>

						<tbody>

							@foreach($data as $i => $value)

							    <tr>

							      	<td>{{$i+1}}</td>

							      	<td>

							      		<a href="{{route('admin.moderator.view' , $value->moderator_id)}}">
							      			{{$value->moderator ? $value->moderator->name : ""}}
							      		</a>

							      	</td>

							      	<td><b>{{Setting::get('currency')}} {{$value->request_amount}}</b></td>

							      	<td><b>{{Setting::get('currency')}} {{$value->paid_amount}}</b></td>

							      	<td class="text-uppercase"><b>{{$value->payment_mode}}</b></td>

							      	<td>{{$value->created_at ? $value->created_at->diffForHumans() : ""}}</td>

							      	<td><b>{{redeem_request_status($value->status)}}</b></td>
							 
							      	<td>

							      		@if(in_array($value->status ,[REDEEM_REQUEST_SENT , REDEEM_REQUEST_PROCESSING]))

								      		<form action="{{route('admin.moderators.payout.invoice')}}" method="get">
                                                @csrf

								      			<input type="hidden" name="redeem_request_id" value="{{$value->id}}">

								      			<input type="hidden" name="paid_amount" value="{{$value->request_amount}}">

								      			<input type="hidden" name="moderator_id" value="{{$value->moderator_id}}">

								      			<?php $confirm_message = tr('redeem_pay_confirm'); ?>

								      			<button type="submit" class="btn btn-success btn-sm">{{tr('paynow')}}</button>
								      		</form>

								      	@else
								      		<span>-</span>
							      		@endif

							      	</td>
							    </tr>
							@endforeach
						
						</tbody>

					</table>

				</div>
			</div>
		</div>
	</div>

@endsection
