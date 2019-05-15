@extends('layouts.adminator.master')

@section('title',tr('mail_camp'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('mail_camp') }}</h4>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('admin-css/plugins/tokenize2-1.1-dist/tokenize2.min.css')}}">
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-12">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('new_message')}}</b></h6>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.email.success')}}" method="POST"
                      enctype="multipart/form-data" role="form">
                    @csrf

                    <div class="box-body">

                        <div class="form-group row">
                            <label for="from" class="col-sm-2 control-label">* {{tr('to')}}</label>

                            <div class="col-sm-6">
                                <!-- Users -->
                                <label for="users">
                                    <input type="radio" name="to" id="users" value="{{USERS}}">&nbsp;{{tr('users')}}
                                </label>


                                <!-- Moderators-->
                                <label for="moderators">
                                    <input type="radio" name="to" id="moderators"
                                           value="{{MODERATORS}}">&nbsp;{{tr('moderators')}}
                                </label>

{{--                                <label for="custom_users">--}}
{{--                                    <input type="radio" name="to" id="custom_user" value="{{CUSTOM_USERS}}">--}}
{{--                                    &nbsp; {{tr('custom_users')}}--}}
{{--                                </label>--}}

                                <br><br>
                                <!-- Users -->
                                <div id="preview" style="display: none">

                                    <input type="radio" name="users_type" id="users_list" value="{{ALL_USER}}">
                                    &nbsp;<label for="all_user">{{tr('all_user')}}</label>

                                    <input type="radio" name="users_type" id="users_list1" value="{{NORMAL_USERS}}">
                                    &nbsp;<label for="normal_user">{{tr('normal_user')}}</label>

                                    <input type="radio" name="users_type" id="users_list2" value="{{PAID_USERS}}">&nbsp;<label
                                            for="paid_user">{{tr('paid_user')}}</label>

                                    <input type="radio" name="users_type" value="{{SELECT_USERS}}" id="select_user">&nbsp;<label
                                            for='select_user'>{{tr('select_user')}}</label>
                                </div>

                                <!-- Moderators-->
                                <div id="mod_preview" style="display: none">

                                    <input type="radio" name="users_type" id="moderators_list"
                                           value="{{ALL_MODERATOR}}"><label
                                            for="all_moderators">{{tr('all_moderators')}}</label>

                                    <input type="radio" name="users_type" value="{{SELECT_MODERATOR}}"
                                           id="select_mod"><label for="select_moderators">
                                        {{tr('select_moderators')}}</label>

                                </div>
                            </div>
                            <!-- User -->
                            @if(count($users_list)>0)
                                <div class="col-md-10 pull-right" id="select" style="display: none">
                                    <label for="custom_user" class="control-label"><p class="help-block">{{tr('note')}}
                                            : {{tr('select_users')}}</p></label>

                                    <select style="display: none" id="multi-select-user" name="select_user[]"
                                            class="form-control" multiple>

                                        @foreach($users_list as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="col-md-10 pull-right btn-disabled" id="select" style="display: none">
                                    <p style="color: red">{{tr('user_detail_not_found')}}</p>
                                </div>
                            @endif

                        <!-- Moderator -->
                            @if(count($moderator_list)>0)

                                <div class="col-md-10 pull-right" id="select_moderator" style="display: none">

                                    <label for="custom_user" class="control-label"><p class="help-block">{{tr('note')}}
                                            : {{tr('select_moderators_list')}}</p></label>
                                    <select style="display: none" id="multi-select-moderator" name="select_moderator[]"
                                            class="form-control" multiple>
                                        @foreach($moderator_list as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="col-md-10 pull-right" id="select_moderator" style="display: none">
                                    <p style="color: red">{{tr('moderator_detail_not_found')}}</p>
                                </div>
                            @endif
                            <div class="col-sm-10 pull-right" id="custom" style="display: none">
                                <label for="custom_user" class="control-label"><p class="help-block">{{tr('note')}}
                                        : {{tr('custom_user_notes')}}</p></label>
                                <input type="text" max="255" name="custom_user" class="form-control"
                                       placeholder="{{tr('custom_users')}}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="subject" class="col-sm-2 control-label">* {{tr('subject')}}</label>

                            <div class="col-sm-10">
                                <input type="text" min="5" max="255" pattern=".{5,}" required name="subject"
                                       class="form-control" id="subject" placeholder="{{tr('subject_note')}}"
                                       title="{{tr('subject_note')}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-sm-2 control-label">*{{tr('content')}}</label>

                            <div class="col-sm-10">

                                <textarea type="content" min="5" required name="content" class="form-control"
                                          id="ckeditor" placeholder="{{tr('content_notes')}}"></textarea>
                            </div>
                        </div>

                    </div>

                    <!--Footer Section -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/tokenize2-1.1-dist/tokenize2.min.js')}}"></script>

    <script src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('ckeditor');
    </script>

    <script type="text/javascript">

        $('#multi-select-user').tokenize2();

        $('#multi-select-moderator').tokenize2();

        $(document).ready(function () {

            $("input[name='to']").click(function () {

                $('#preview').css('display', ($(this).val() === '{{USERS}}') ? 'block' : 'none');

                $('#select_moderator').hide();

            });

            $("input[name='to']").click(function () {

                $('#mod_preview').css('display', ($(this).val() === '{{MODERATORS}}') ? 'block' : 'none');

                $('#select').hide();

            });


            $("input[name='to']").click(function () {

                $('#custom').css('display', ($(this).val() === '{{CUSTOM_USERS}}') ? 'block' : 'none');

                $('#select').hide();

                $('#select_moderator').hide();
            });

        });
    </script>

    <script type="text/javascript">

        $('#select_user').click(function () {

            $('#select').css('display', ($(this).val() === '{{SELECT_USERS}}') ? 'block' : 'none');
            $('#custom').hide();
            $('#select_moderator').hide();
        });

        $("#users_list").click(function () {
            $('#select').hide();
            $('#custom').hide();
            $('#select_moderator').hide();
        });

        $("#users_list1").click(function () {
            $('#select').hide();
            $('#custom').hide();
            $('#select_moderator').hide();
        });

        $("#users_list2").click(function () {
            $('#select').hide();
            $('#custom').hide();
            $('#select_moderator').hide();
        });

        $('#select_mod').click(function () {

            $('#select_moderator').css('display', ($(this).val() === '{{SELECT_MODERATOR}}') ? 'block' : 'none');
            $('#custom').hide();
            $('#select').hide();
        });
        $('#moderators_list').click(function () {
            $('#select').hide();
            $('#custom').hide();
            $('#select_moderator').hide();
        });
    </script>
@endsection
