<div class="{{ $errors->has('password') ? 'has-error' : '' }} form-group col-md-12">
		<label for="password">Senha</label>
		<input type="password" name="password" value="{{$tenista->password}}">
		@if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
	</div>
	