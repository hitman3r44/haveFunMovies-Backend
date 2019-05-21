<div class="form-group row">
    <label for="retailer_id" class="col-md-3 col-form-label">{{ 'Retailer Id' }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="retailer_id" id="retailer_id" class="form-control">
                <option value=""></option>
                @foreach($retailers as $retailer)
                    <option value="{{ $retailer->id }}" {{ (isset($creditmoney->retailer_id) ? ($creditmoney->retailer_id == $retailer->id ? 'selected' : '') : '' ) }}>{{ $retailer->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('retailer_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="amount" class="col-md-3 col-form-label">{{ 'Amount' }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <input class="form-control" name="amount" type="number" id="amount" value="{{ $creditmoney->amount ?? ''}}"
                   required>
            {!! $errors->first('amount', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>

<hr>
<div class="box-footer text-center">
    <input class="btn btn-fill btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }} ">
</div>
