@extends('layouts.adminator.master')

@section('title', tr('add_credit_money'))

@section('content-header')
    <h4 class="c-grey-900 mT-10 mB-30"> {{ tr('add_credit_money') }}</h4>
@endsection

@section('breadcrumb')
    <li class="list-inline-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}} </a> > </li>
    <li class="list-inline-item"><a href="{{route('admin.credit-money.index')}}"><i class="fa fa-suitcase"></i> {{tr('credit_money')}}</a> > </li>
    <li class="list-inline-item active">{{tr('add_credit_money')}}</li>
@endsection

@section('content')

 <div class="row gap-20">
        <div class="col-md-10">
            <div class="bgc-white p-20 bd">
                <div class="row bgc-grey-400 p-10">
                    <div class="col-8">
                        <h6 class="c-grey-900"><b>{{tr('add_credit_money')}}</b></h6>
                    </div>
                    <div class="col-4">
                        <a href="{{route('admin.credit-money.index')}}"
                           class="btn btn-default pull-right">{{tr('credit_money')}}</a>
                    </div>
                </div>

                <form class="form-horizontal" action="{{route('admin.credit-money.store') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data" role="form">
                        @csrf
                    <div class="box-body">
                        @include ('/admin.credit-money.form')
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        function getUserByRole(roleId, viewField){
            $.ajax({
                type: "POST",
                url: "{{ route('admin.credit-money.user.role') }}",
                data: {
                    role: roleId
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

            $('select#role_id').on('change', function (e) {
                var roleId = $(this).val();
                getUserByRole(roleId, 'select#user_id')
            })

        });

    </script>
@endsection
