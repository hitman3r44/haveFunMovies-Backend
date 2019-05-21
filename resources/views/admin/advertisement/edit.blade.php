@extends('layouts.adminator.master')

@section('title',tr('edit_advertisement'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_advertisement') }}</h4>
@endsection

@section('breadcrumb')

    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.advertisement.list')}}"><i class="fa fa-gift"></i>{{tr('advertisements')}}</a></li>
    <li class="list-inline-item active">{{tr('edit_advertisement')}}</li>

@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b style="font-size: 18px">{{tr('edit_advertisement')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.advertisement.list')}}"
                           class="btn btn-default pull-right"> {{tr('advertisements')}}</a>
                    </div>

                </div>

                <form action="{{route('admin.save.advertisement')}}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$edit_advertisement->id}}">

                    <div class="box-body">

                        {{--                        Title--}}
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"> * {{tr('title')}}</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" role="title" min="5" max="20" class="form-control"
                                       placeholder="{{tr('enter_advertisement_title')}}"
                                       value="{{$edit_advertisement->title ? $edit_advertisement->title : old('title') }}">
                            </div>
                        </div>

                        {{--                        Minimum Play Time--}}
                        <div class="form-group">
                            <label for="min_play_time" class="col-sm-2 control-label">{{tr('min_play_time')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="min_play_time" min="1" max="5000" step="any" class="form-control"
                                       placeholder="{{tr('min_play_time')}}"
                                       value="{{$edit_advertisement->min_play_time ? $edit_advertisement->min_play_time :
                                       old('min_play_time') }}"
                                       title="{{tr('validation')}}">
                            </div>
                        </div>

                        {{--                        Maximum Play Time--}}
                        <div class="form-group">
                            <label for="min_play_time" class="col-sm-2 control-label">{{tr('max_play_time')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="max_play_time" min="1" max="5000" step="any" class="form-control"
                                       placeholder="{{tr('max_play_time')}}"
                                       value="{{$edit_advertisement->max_play_time ? $edit_advertisement->max_play_time :
                                       old('max_play_time') }}"
                                       title="{{tr('validation')}}">
                            </div>
                        </div>

                        {{--                        total_amount--}}
                        <div class="form-group">
                            <label for="total_amount" class="col-sm-2 control-label"> * {{tr('total_amount')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="total_amount" min="1" max="5000" step="any" class="form-control"
                                       placeholder="{{tr('total_amount')}}"
                                       value="{{$edit_advertisement->total_amount ? $edit_advertisement->total_amount :
                                       old('total_amount') }}"
                                       required title="{{tr('only_number')}}">
                            </div>
                        </div>

                        {{--                        Per View Cost--}}
                        <div class="form-group">
                            <label for="per_view_cost" class="col-sm-2 control-label"> * {{tr('per_view_cost')}}</label>
                            <div class="col-sm-10">
                                <input type="number" name="per_view_cost" max="5000" step="any" class="form-control"
                                       placeholder="{{tr('per_view_cost')}}"
                                       value="{{$edit_advertisement->per_view_cost ? $edit_advertisement->per_view_cost :
                                       old('per_view_cost') }}"
                                       required title="{{tr('only_number')}}">
                            </div>
                        </div>

                        {{--                        start_playing_date--}}
                        <div class="form-group">
                            <label for="start_playing_date" class="col-sm-2 control-label">{{tr('start_playing_date_label')}}</label>
                            <div class="col-sm-10">
                                <input type="text" id="start_playing_date" name="start_playing_date" class="form-control"
                                       placeholder="{{tr('start_playing_date')}}"
                                       value="{{$edit_advertisement->start_playing_date ? $edit_advertisement->start_playing_date :
                                       old('start_playing_date') }}"
                                >
                            </div>
                        </div>

                        {{--                        stop_playing_date--}}
                        <div class="form-group">
                            <label for="end_playing_date" class="col-sm-2 control-label">{{tr('end_playing_date_label')}}</label>
                            <div class="col-sm-10">
                                <input type="text" id="end_playing_date" name="end_playing_date" class="form-control"
                                       placeholder="{{tr('end_playing_date')}}"
                                       value="{{$edit_advertisement->end_playing_date ? $edit_advertisement->end_playing_date :
                                       old('end_playing_date') }}"
                                >
                            </div>
                        </div>


                        {{--                        country list--}}
                        <div class="form-group row">
                            <label for="countries" class="col-sm-2 control-label">{{tr('add_country')}}</label>
                            <div class="col-sm-10">
                                <select id="countries" name="countries[]" class="form-control select2" multiple="multiple"></select>
                            </div>
                        </div>

                        {{--                        movie list--}}
                        <div class="form-group row">
                            <label for="movies" class="col-sm-2 control-label">{{tr('add_movies')}}</label>
                            <div class="col-sm-10">
                                <select id="movies" name="movies[]" class="form-control select2" multiple="multiple"></select>
                            </div>
                        </div>

                        {{--                        Description--}}
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">{{tr('description')}}</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" max="255"
                                          style="resize: none;">{{$edit_advertisement->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="" class="btn btn-danger">{{tr('reset')}}</a>
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
                            if(id == 1){ // ::TODO : make selected while edit
                                option += '<option selected value="' + id + '" >' + value + '</option>';
                            }else{
                                option += '<option value="' + id + '" >' + value + '</option>';
                            }
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