@extends('layouts.adminator.master')

@section('title',tr('add_advertisement'))
@section('content-header')
	<h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_advertisement') }}</h4>
@endsection

@section('breadcrumb')

	<li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
	<li class="list-inline-item"><a href="{{route('admin.advertisement.list')}}"><i class="fa fa-gift"></i>{{tr('advertisements')}}</a></li>
	<li class="list-inline-item active">{{tr('add_advertisement')}}</li>

@endsection

@section('content')

	<div class="row gap-20">
		<div class="col-md-10 offset-1">
			<div class="bgc-white p-20 bd">
				<div class="row bgc-grey-400 p-10">
					<div class="col-8">
						<h6 class="c-grey-900"><b style="font-size: 18px">{{tr('add_advertisement')}}</b></h6>
					</div>
					<div class="col-4">
						<a href="{{route('admin.advertisement.list')}}" class="btn btn-default pull-right">{{tr('advertisements')}}</a>
					</div>
				</div>

				<form action="{{route('admin.save.advertisement')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
					@csrf
					<div class="box-body">

                        {{--                        Hidden Fields--}}
                        <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">
                        <input type="hidden" name="user_time_zone" value="" id="userTimezone">

                        {{--                        Title--}}
						<div class="form-group row">
							<label for = "title" class="col-sm-2 col-form-label"> * {{tr('title')}}</label>
							<div class="col-sm-10">
								<input type="text" name="title" role="title" min="5" max="20" class="form-control" value="{{ old('title') }}" required placeholder="{{tr('enter_advertisement_title')}}">
							</div>
						</div>

                        {{--                        Minimum Play Time--}}
						<div class="form-group row">
							<label for="min_play_time" class="col-sm-2 col-form-label">{{tr('min_play_time')}}</label>
							<div class="col-sm-10">
								<input type="number" name="min_play_time" min="1" max="5000" step="any" class="form-control" placeholder="{{tr('min_play_time')}}" value="{{old('min_play_time')}}">
							</div>
						</div>

                        {{--                        Maximum Play Time--}}
                        <div class="form-group row">
                            <label for="max_play_time" class="col-sm-2 col-form-label">{{tr('max_play_time')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="max_play_time" min="1" max="5000" step="any" class="form-control" placeholder="{{tr('max_play_time')}}" value="{{old('max_play_time')}}">
                            </div>
                        </div>

                        {{--                        total_amount--}}
                        <div class="form-group row">
                            <label for="total_amount" class="col-sm-2 col-form-label"> * {{tr('total_amount')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="total_amount" min="1" max="5000" step="any" class="form-control" placeholder="{{tr('total_amount')}}" value="{{old('total_amount')}}" required title="{{tr('only_number')}}">
                            </div>
                        </div>

                        {{--                        Per View Cost--}}
                        <div class="form-group row">
                            <label for="per_view_cost" class="col-sm-2 col-form-label"> * {{tr('per_view_cost')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="per_view_cost" max="5000" step="any" class="form-control" placeholder="{{tr('per_view_cost')}}" value="{{old('per_view_cost')}}" required title="{{tr('only_number')}}">
                            </div>
                        </div>

                        {{--                        Custom Commission rate--}}
                        <div class="form-group row">
                            <label for="custom_commission_rate" class="col-sm-2 col-form-label">{{tr('custom_commission_rate')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="custom_commission_rate" max="5000" step="any" class="form-control" placeholder="{{tr('custom_commission_rate')}}"
                                       value="{{old('custom_commission_rate')}}" title="{{tr('only_number')}}">
                            </div>
                        </div>

                        {{--                        start_playing_date--}}
                        <div class="form-group row">
                            <label for="start_playing_date" class="col-sm-2 col-form-label">{{tr('start_playing_date_label')}}</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" id="start_playing_date" name="start_playing_date" class="start-date form-control" placeholder="{{tr('start_playing_date')}}" value="{{old('start_playing_date')}}" >
                            </div>
                        </div>

                        {{--                        stop_playing_date--}}
						<div class="form-group row">
							<label for="end_playing_date" class="col-sm-2 col-form-label">{{tr('end_playing_date_label')}}</label>
							<div class="col-sm-10">
								<input type="text" autocomplete="off" id="end_playing_date" name="end_playing_date" class="end-date form-control" placeholder="{{tr('end_playing_date')}}" value="{{old('end_playing_date')}}" >
							</div>
						</div>

                        {{--                        country list--}}
						<div class="form-group row">
							<label for="countries" class="col-sm-2 col-form-label">{{tr('add_country')}}</label>
							<div class="col-sm-10">
								<select id="countries" name="countries[]" class="form-control select2"  required multiple="multiple"></select>
							</div>
						</div>

                        {{--                        movie list--}}
						<div class="form-group row">
							<label for="movies" class="col-sm-2 col-form-label">{{tr('add_movies')}}</label>
							<div class="col-sm-10">
								<select id="movies" name="movies[]" class="form-control select2" required multiple="multiple"></select>
							</div>
						</div>

                        {{--                        Description--}}
						<div class="form-group row">
							<label for = "description" class="col-sm-2 col-form-label">{{tr('description')}}</label>
							<div class="col-sm-10">
								<textarea name="description" class="form-control" max="255" style="resize: none;"></textarea>
							</div>
						</div>

                        {{--                        video--}}
						<div class="form-group row">
							<label for = "description" class="col-sm-2 col-form-label">{{tr('video')}}</label>
							<div class="col-sm-10">
								<input type="file" name="video" accept="video/mp4,video/x-matroska" id="video"/>
							</div>
						</div>
					</div>

					<div class="box-footer">
						<a href="{{ route('admin.add.advertisement') }}" class="btn btn-warning">{{tr('reset')}}</a>
						<button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
    <script src="{{asset('assets/js/jstz.min.js')}}"></script>
    <script>
        function populateSelectOptionData(contentType, viewField){
            $.ajax({
                type: "GET",
                url: "{{ route('admin.advertisement.data') }}",
                data: {
                    content: contentType
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function (response) {
                    var option = ''; //<option value="">Select '+contentType+'</option>
                    if (response.statusCode == 1) {
                        $.each(response.data, function (id, value) {
                            option += '<option value="' + id + '" >' + value + '</option>';
                        });

                        $(viewField).html(option);

                    }else{
                       alert(response.message);
                    }

                }
            });
        }

        $(document).ready(function () {

            var dMin = new Date().getTimezoneOffset();
            var dtz = -(dMin / 60);
            $("#userTimezone").val(jstz.determine().name());

            populateSelectOptionData('countries', '#countries');
            populateSelectOptionData('movies', '#movies');

        });

    </script>

@endsection

