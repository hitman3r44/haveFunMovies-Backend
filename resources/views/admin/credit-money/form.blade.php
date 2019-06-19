<div class="form-group row">
    <label for="retailer_id" class="col-md-3 col-form-label">{{ tr('role') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select id="role_id" class="form-control">
                <option value=""></option>
                @foreach($roles as $role)
                    <option @if(isset($creditmoney->user_id)) {{ (in_array($role->name, $creditmoney->user->getRoleNames()->toArray())) ? 'selected' : '' }} @endif value="{{$role->id}}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
            {!! $errors->first('retailer_id', '<small class="text-danger">:message</small>') !!}
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="retailer_id" class="col-md-3 col-form-label">{{ tr('user') }}</label>
    <div class="col-md-9">
        <div class="form-group">
            <select name="user_id" id="user_id" class="form-control">
                <option value=""></option>
            </select>
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
