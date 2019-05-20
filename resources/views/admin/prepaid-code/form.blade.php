<div class="form-group row">
    <label for="code" class="col-md-3 col-form-label">{{ 'Code' }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <input class="form-control" name="code" type="text" id="code" value="{{ $prepaidcode->code ?? $uniqueId}}">
            {!! $errors->first('code', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="price" class="col-md-3 col-form-label">{{ 'Price' }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <input class="form-control" name="price" type="number" id="price" value="{{ $prepaidcode->price ?? ''}}">
            {!! $errors->first('price', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>


<hr>
<div class="box-footer text-center">
    <input class="btn btn-fill btn-primary" type="submit" value="{{ $submitButtonText ?? 'Generate' }} ">
</div>
