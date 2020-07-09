<form method="post" action="{{ route('unity.update', ['unity' => $unity->id]) }}" autocomplete="off" enctype="multipart/form-data">
  @csrf
  @method('patch')

  <div class="pl-lg-4">

    <input type="hidden" name="contract_id" value="{{ $contract->id }}">

    <div class="row">
      <div class="col form-group">
        <label class="form-control-label" for="input-integration">{{ __('Nome Fantasia') }}</label>
        <input type="text" class="form-control form-control-alternative" value="{{ $contract->fantasy_name}}" disabled>
      </div>

      <div class="col form-group{{ $errors->has('integration') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-integration">{{ __('Integração') }}</label>
        <input type="text" value="{{ $unity->integration }}" name="integration" id="input-integration" class="form-control form-control-alternative{{ $errors->has('integration') ? ' is-invalid' : '' }}" placeholder="{{ __('Integração') }}" required autofocus>

        @if ($errors->has('integration'))
          <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('integration') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="row align-items-center">
      <div class="col-3 media">
        <img alt="Image placeholder" style="max-width: 150px;" src="{{ asset('img/'.$unity->logo) }}">
      </div>

      <div class="col form-group">
        <label for="file-input">Nos envie sua Logomarca</label>
        <input type="file" name="logo" class="form-control-file form-control-file-alternative{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="file-input">
      </div>
    </div>

    <div class="row">
      <div class="col form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-state">{{ __('Estado') }}</label>
        <input type="text" name="state" value="{{ $unity->state }}" id="input-state" class="form-control form-control-alternative{{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="{{ __('Estado') }}" required>

        @if ($errors->has('state'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('state') }}</strong>
        </span>
        @endif
      </div>

      <div class="col form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-city">{{ __('Município') }}</label>
        <input type="text" name="city" value="{{ $unity->city }}" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('Município') }}" required>

        @if ($errors->has('city'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('city') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
      <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
      <input type="email" name="email" value="{{ $unity->email }}" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>

    <div class="row">
      <div class="col form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-type">{{ __('Tipo') }}</label>
        <select class="custom-select {{ $errors->has('type') ? ' is-invalid' : '' }}" id="type" name="type" required>
          <option @if($unity->type === 'Json') selected @endif value="Json">Json</option>
          <option @if($unity->type === 'Webview') selected @endif value="Webview">Webview</option>
          <option @if($unity->type === 'XML') selected @endif value="XML">XML</option>
          <option @if($unity->type === 'HL7') selected @endif value="HL7">HL7</option>
        </select>

        @if ($errors->has('type'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('type') }}</strong>
        </span>
        @endif
      </div>

      <div class="col form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
        <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status" required>
          <option @if($unity->status) selected @endif value="true">Ativo</option>
          <option @if(!$unity->status) selected @endif value="false">Inativo</option>
        </select>

        @if ($errors->has('status'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('status') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success mt-4 w-25">{{ __('Salvar') }}</button>
    </div>
  </div>
</form>
