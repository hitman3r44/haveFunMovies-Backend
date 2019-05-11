    @extends('layouts.app')

@section('content')

    @include('pages.show_error_message')
    <div class="wrapper-md">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    <h4>Create New Role </h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                        <form class="bs-example form-horizontal" action="{{ url('/role') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Provide Role Name" type="text"
                                       id="name" required>
                                {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}

                            </div>

                            <div class="form-group">
                                <label>Permissions</label>
                                <div class="row panel panel-default">
                                    <div class="panel-body">
                                        @php $i = 1; @endphp
                                        @foreach($permissions as $permission)
                                            <label class="checkbox-inline i-checks">
                                                <input name="permissions[]" type="checkbox"
                                                       value="{{$permission['name']}}"><i></i> {{$permission['permission'] }}
                                                <small style="width: 60px;display: inline-block;">{{$permission['module'] }}</small>
                                            </label>

                                            @if($i%5 == 0)
                                    </div>
                                </div>
                                <div class="row panel panel-default">
                                    <div class="panel-body">
                                        @endif
                                        @php $i++ @endphp
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <input class="btn btn-primary" type="submit" value="Create Roll">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

