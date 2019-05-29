{{--                        gift_card--}}
<div class="form-group row">
    <label for="gift_card_id" class="col-md-3 col-form-label">{{ tr('gift_card') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="gift_card_id" id="gift_card_id" class="form-control">
                <option value=""></option>
                @foreach($giftCards as $giftCard)
                    <option value="{{ $giftCard->id }}"
                        {{ (isset($generateGiftCard->gift_card_id)
                        ?
                        ($generateGiftCard->gift_card_id == $giftCard->id ? 'selected' : '') : '' ) }}
                    >
                        {{ $giftCard->code}}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('gift_card_id', '<small class="text-danger">:message</small>') !!}
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
                        {{ (isset($generateGiftCard->gift_card_id)
                        ?
                        ($generateGiftCard->gift_card_id == $giftCard->id ? 'selected' : '') : '' ) }}
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
{{--<div class="form-group row">--}}
{{--    <label for="customer_id" class="col-md-3 col-form-label">{{  tr('uuid') }}</label>--}}
{{--    <div class="col-md-7">--}}
{{--        <div class="form-group">--}}
{{--            <input class="form-control" id="uuid" name="uuid" placeholder="Generate UUID" required--}}
{{--                   type="text"--}}
{{--                   value="{{ $generateGiftCard->uuid ?? ''}}">--}}
{{--            {!! $errors->first('customer_id', '<small class="text-danger">:message</small>') !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <span id="generate_uuid" class="mt-1 btn btn-primary btn-sm">Generate UUID</span>--}}
{{--    </div>--}}
{{--</div>--}}

<hr>
<div class="box-footer text-center">
    <input class="btn btn-fill btn-primary" type="submit" value="{{ $submitButtonText ?? tr('add_generate_gift_card') }} ">
</div>
