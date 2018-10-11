<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <label for="model">Model Number  </label>
            <input type="text" class="form-control" id="Model" name="model">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="devicetype">Type of device</label>
            <input type="text" name="devicetype" class="form-control" id="devicetype" placeholder="E.g. Phone/Tablet">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-auto mb-4">
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('price') ? ' is-invalid' : '' }}" type="checkbox" id="haswarranty" name="haswarranty" {{ old('haswarranty') ? 'checked' : '' }} value="on">
            <label class="form-check-label " for="haswarranty">
                                    Check me, if your device has an active warranty
             </label>
             @if ($errors->has('haswarranty'))
            <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('haswarranty') }}</strong>
            </span> 
            @endif
        </div>
    </div>
</div>