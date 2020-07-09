
<form method="post" action="{{ route('contractUser.store') }}" autocomplete="off">
  @csrf
  @method('post')

  <div class="pl-lg-4">

    <input type="hidden" name="contract_id" value="{{ $contract->id }}">

    <div class="form-group">
      <label class="form-control-label" for="input-fantasy_name">{{ __('Nome Fantasia') }}</label>
      <input type="text" id="input-fantasy_name" class="form-control form-control-alternative" value="{{ $contract->fantasy_name}}" disabled>
    </div>

    <div class="row">
      <div class="col form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-cpf">{{ __('CPF') }}</label>
        <input type="text" name="cpf" id="input-cpf" class="form-control form-control-alternative{{ $errors->has('cpf') ? ' is-invalid' : '' }}" placeholder="{{ __('CPF - somente números') }}" required>

        @if ($errors->has('cpf'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('cpf') }}</strong>
        </span>
        @endif
      </div>

      <div class="col form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" required>

        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success mt-4 w-25">{{ __('Adicionar') }}</button>
    </div>
  </div>
</form>
