@extends('layouts.adminator.master')

@section('title', tr('edit_cast_crew'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('edit_cast_crew') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.cast_crews.index')}}"><i class="fa fa-users"></i> {{tr('cast_crews')}}</a></li>
    <li class="list-inline-item active">{{tr('edit_cast_crew')}}</li>
@endsection


@section('content')

@include('admin.cast_crews._form')



<div class="modal fade" id="add_cast_type_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cast Crew Type </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Type Name:</label>
                        <input type="text" class="form-control" name="title" id="type_name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Type Description:</label>
                        <textarea class="form-control" name="type_description" id="type_description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Type</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">

        function loadFile(event,id){

            $('#'+id).show();

            var reader = new FileReader();

            reader.onload = function(){

                var output = document.getElementById(id);

                output.src = reader.result;
            };

            reader.readAsDataURL(event.files[0]);
        }

    </script>

    <script src="https://cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('ckeditor');
    </script>

    <script src="{{asset('assets/js/jstz.min.js')}}"></script>
    <script>
        function populateSelectOptionData(contentType, viewField) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.cast-and-crew-type.data') }}",
                data: {
                    content: contentType
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function (response) {
                    var option = '';
                    if (response.statusCode === 1) {

                        $.each(response.data, function (id, value) {
                            option += '<option value="' + id + '" >' + value + '</option>';
                        });

                        $(viewField).html(option);

                        $(viewField).val(parseInt({{$model->cast_and_crew_type_id}}));
                        $(viewField).trigger('change.select2');


                    } else {
                        alert(response.message);
                    }
                }
            });
        }


        function addNewCastType(data) {
            $.ajax({
                type: "POST",
                url: "{{ route('admin.cast_and_crew_type.store') }}",
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function (response) {
                    if (response.statusCode === 1) {

                        populateSelectOptionData('cast-and-crews-types', '#cast-and-crews-types');
                    }else{
                        alert(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.responseJSON.errors.title[0]);
                }
            });
        }

        $(document).ready(function () {
            var dMin = new Date().getTimezoneOffset();
            var dtz = -(dMin / 60);
            $("#userTimezone").val(jstz.determine().name());

            populateSelectOptionData('cast-and-crews-types', '#cast-and-crews-types');
        });


        $('.modal#add_cast_type_modal form').on('submit', function (event) {

            $('#add_cast_type_modal').modal('hide');
            event.preventDefault();
            addNewCastType($(this).serialize());
        })


    </script>
@endsection
