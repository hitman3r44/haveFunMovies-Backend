<div class="row">
    <div class="col-md-12 text-center">

        @if (Session::has('errors'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <ul class="list-unstyled">
                    @foreach (Session::get('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (Session::has('warning'))
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('warning')}}
            </div>
        @endif


        @if (Session::has('info'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('info')}}
            </div>
        @endif


        @if (Session::has('flash_success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('flash_success')}}
                @php Session::forget('flash_success') @endphp
            </div>
        @endif

        @if (Session::has('flash_error'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('flash_error')}}
                @php Session::forget('flash_error') @endphp
            </div>
        @endif

    </div>
</div>