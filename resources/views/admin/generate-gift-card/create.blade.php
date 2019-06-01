@extends('layouts.adminator.master')

@section('title', tr('sell_gift_card'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('sell_gift_card') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i>{{tr('home')}} </a> >
    </li>
    <li class="list-inline-item"><a href="{{route('admin.generate-gift-card.index')}}">
            <i class="fa fa-suitcase"></i> {{tr('sell_gift_card')}}</a> >
    </li>
    <li class="list-inline-item active">{{tr('sell_gift_card')}}</li>
@endsection

@section('content')

    <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('sell_gift_card')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.generate-gift-card.index')}}"
                           class="btn btn-default pull-right">{{tr('sold_gift_card')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.generate-gift-card.store') }}" method="POST" accept-charset="UTF-8"
                      enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">
                        @include ('admin.generate-gift-card.form')
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        function buttonDisable(btnObj, btn_content) {

            btnObj.prop('disabled', true);
            btnObj.html('<i class="fa fa-spinner fa-spin"></i> &nbsp;');
        }

        function buttonEnable(btnObj, btn_content) {

            btnObj.prop('disabled', false);
            btnObj.html(btn_content);
        }

        $(document).ready(function () {

            $('span#generate_uuid').on('click', function (event) {

                var btnObj = $(this);
                var btn_content = btnObj.html();
                buttonDisable(btnObj, btn_content);
                $.ajax({
                    type: "post",
                    url: "{{ route('admin.generate-gift-card.uuid') }}",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        buttonEnable(btnObj, btn_content)
                        if (response.statusCode == 1) {

                            $('input#uuid').val(response.uuid);

                        }else{
                            console.log(response.message)
                        }
                    }
                });
            });
        });
    </script>
@endsection
