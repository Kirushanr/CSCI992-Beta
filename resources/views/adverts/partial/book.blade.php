<div class="book">
        <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="author">Author<span class="text text-danger"> *</span></label>
                        <input type="text" class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}" id="author" required name="author">
      
                        @if ($errors->has('author'))
                        <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('author') }}</strong>
                        </span> 
                        @endif
      
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ISBN">ISBN<span class="text text-danger"> *</span></label>
                            <input type="text" class="form-control {{ $errors->has('ISBN') ? ' is-invalid' : '' }}" id="ISBN" required name="ISBN">
                            @if ($errors->has('ISBN'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ISBN') }}</strong>
                            </span> 
                            @endif
                        </div>
                </div>
        </div>
        <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="edition">Edition<span class="text text-danger"></span></label>
                        <input type="text" class="form-control" id="edition" name="edition">
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="subjectcode" >Subject code 
                               <a href="#" data-toggle="tooltip" 
                                    title="Enter subject code, if you are selling a textbook" class="text text-danger font-weight-bold">?</a>
                               </label>
                            <input type="text" class="form-control" id="subjectcode" name="subjectcode">
                        </div>
                </div>
        </div>
</div>