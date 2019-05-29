{{--                        prepaid_plan--}}
<div class="form-group row">
    <label for="prepaid_plan_id" class="col-md-3 col-form-label">{{ tr('prepaid_plan') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="prepaid_plan_id" id="prepaid_plan_id" class="form-control">
                <option value=""></option>
                @foreach($prepaidCodes as $prepaidCode)
                    <option value="{{ $prepaidCode->id }}"
                        {{ (isset($generatePrepaidCode->prepaid_plan_id)
                        ?
                        ($generatePrepaidCode->prepaid_plan_id == $prepaidCode->id ? 'selected' : '') : '' ) }}
                    >
                        {{ $prepaidCode->title}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('prepaid_plan_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>

{{--                        customer--}}
<div class="form-group row">
    <label for="customer_id" class="col-md-3 col-form-label">{{  tr('customer') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="customer_id" id="customer_id" class="form-control">
                <option value=""></option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ (isset($generatePrepaidCode->prepaid_plan_id)
                        ?
                        ($generatePrepaidCode->prepaid_plan_id == $prepaidCode->id ? 'selected' : '') : '' ) }}
                    >
                        {{$customer->name}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('customer_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>

{{--                        UUid--}}
<div class="form-group row">
    <label for="customer_id" class="col-md-3 col-form-label">{{  tr('uuid') }}</label>
    <div class="col-md-7">
        <div class="form-group">
            <input class="form-control" id="uuid" name="uuid" placeholder="Generate UUID" required
                   type="text"
                   value="{{ $generatePrepaidCode->uuid ?? ''}}">
            {!! $errors->first('customer_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
    <div class="col-md-2">
        <span id="generate_uuid" class="mt-1 btn btn-primary btn-sm">Generate UUID</span>
    </div>
</div>

<hr>
<div class="box-footer text-center">
    <input class="btn btn-fill btn-primary" type="submit" value="{{ $submitButtonText ?? tr('add_generate_prepaid_code') }} ">
</div>
