{{--                        prepaid_plan--}}
<div class="form-group row">
    <label for="prepaid_plan_id" class="col-md-3 col-form-label">{{ tr('prepaid_plan') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="prepaid_plan_id" id="prepaid_plan_id" class="form-control">
                <option value=""></option>
                @foreach($prepaidCodes as $prepaidCode)
                    <option value="{{ $prepaidCode->id }}" {{ (isset($generatePrepaidCode->prepaid_plan_id) ? ($generatePrepaidCode->prepaid_plan_id == $prepaidCode->id ? 'selected' : '') : '' ) }}>{{ $prepaidCode->code.' ('.$prepaidCode->price.')' }}</option>
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
            {{-- ::TODO need to know about customer  ? --}}
            <input class="form-control" name="customer_id" type="number" id="customer_id" placeholder="Customer Unknown"
                   value="{{ $generatePrepaidCode->customer_id ?? ''}}" required>
            {!! $errors->first('customer_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>
{{--                        UUid--}}
<div class="form-group row">
    <label for="customer_id" class="col-md-3 col-form-label">{{  tr('uuid') }}</label>
    <div class="col-md-7">
        <div class="form-group">
            <input class="form-control" name="uuid" type="text" id="uuid" placeholder="Generate UUID"
                   value="{{ $generatePrepaidCode->uuid ?? ''}}" required>
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
