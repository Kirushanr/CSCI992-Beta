<div class="form-group">
    <label for="title">Enter a great title, for your advert<span class="text text-danger"> *</span></label>
    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" required name="title" value="{{old('title')}}"> 
    
    
    @if ($errors->has('title'))
    <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('title') }}</strong>
    </span> 
    @endif
</div>
<div class="form-group">
    <label for="description">Describe your advert<span class="text text-danger"> *</span></label>
    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="2" name="description" >"{{old('description')}}</textarea>

    @if ($errors->has('description'))
    <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('description') }}</strong>
    </span> 
  @endif
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="price">Enter your best price<span class="text text-danger"> *</span></label>
            <input type="number" min="0" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" required name="price" value="{{old('price')}}">
        
            @if ($errors->has('price'))
            <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('price') }}</strong>
            </span> 
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="photos">Upload photos<span class="text text-danger"> *</span></label>
            <input type="file" class="mt-1 form-control-file{{ $errors->has('photos.0') ? ' is-invalid' : '' }}" id="photos" required name="photos[]" value="" accept=".jpg, .jpeg, .png">
            @if ($errors->has('photos.0'))
            <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('photos.0') }}</strong>
            </span> 
            @endif
        </div>
    </div>

</div>