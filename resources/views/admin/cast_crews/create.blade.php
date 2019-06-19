@extends('layouts.adminator.master')

@section('title', tr('add_cast_crew'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_cast_crew') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="list-inline-item"><a href="{{route('admin.cast_crews.index')}}"><i class="fa fa-users"></i> {{tr('cast_crews')}}</a></li>
    <li class="list-inline-item active">{{tr('add_cast_crew')}}</li>
@endsection


@section('content')

@include('admin.cast_crews._form')

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
        CKEDITOR.replace( 'ckeditor' );
    </script>

    <script src="{{asset('assets/js/jstz.min.js')}}"></script>
    <script>
        function populateSelectOptionData(contentType, viewField){
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

                    }else{
                        alert(response.message);
                    }
                }
            });
        }

        $(document).ready(function () {
            var dMin = new Date().getTimezoneOffset();
            var dtz = -(dMin / 60);
            $("#userTimezone").val(jstz.determine().name    ());

            populateSelectOptionData('cast-and-crews-types', '#cast-and-crews-types');
        });

    </script>
@endsection
