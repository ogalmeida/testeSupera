<form method="post" action="{{ route('contract.update', ['contract' => $contract->id]) }}" autocomplete="off" enctype="multipart/form-data">
  @csrf
  @method('patch')

  <div class="pl-lg-4">

    <div class="row align-items-center justify-content-start">
      <div class="col form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-cnpj">{{ __('CNPJ') }}</label>
        <input type="text" name="cnpj" id="input-cnpj" class="form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" placeholder="{{ __('CNPJ') }}" value="{{ __($contract->cnpj) }}" required autofocus>

        @if ($errors->has('cnpj'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('cnpj') }}</strong>
        </span>
        @endif
      </div>

      <div class="row col align-items-center justify-content-start">
        <div class="col media align-items-center">
          <img alt="Image placeholder" style="max-width: 200px;" src="{{ asset('img/'.$contract->logo) }}">
        </div>
        <div class="col form-group">
          <label for="file-input">Nos envie sua Logomarca</label>
          <input type="file" name="logo" class="form-control-file form-control-file-alternative{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="file-input">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col form-group{{ $errors->has('corporate_name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-corporate_name">{{ __('Razão social') }}</label>
        <input type="text" name="corporate_name" id="input-corporate_name" value="{{ __($contract->corporate_name) }}" class="form-control form-control-alternative{{ $errors->has('corporate_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Razão social') }}" required>

        @if ($errors->has('corporate_name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('corporate_name') }}</strong>
        </span>
        @endif
      </div>

      <div class="col form-group{{ $errors->has('fantasy_name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-fantasy_name">{{ __('Nome fantasia') }}</label>
        <input type="text" name="fantasy_name" id="input-fantasy_name" value="{{ __($contract->fantasy_name) }}" class="form-control form-control-alternative{{ $errors->has('fantasy_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome fantasia') }}" required>

        @if ($errors->has('fantasy_name'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('fantasy_name') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
        <input type="email" name="email" id="input-email" value="{{ __($contract->email) }}" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="col form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
        <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status" required>
          <option @if($contract->status) selected @endif value="true">Ativo</option>
          <option @if(!$contract->status) selected @endif value="false">Inativo</option>
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

<hr class="my-5" />

<div class="d-flex justify-content-between align-items-start">
  <h6 class="heading-small text-muted mb-4">{{ __('Unidades deste contrato') }}</h6>
  <button type="button" class="btn btn-sm btn-info" data-settings="{{ json_encode((object) ['operation' => "create", 'config' => "unity", 'contract' => $contract->id]) }}" data-toggle="modal" data-target="#modal-index">{{ __('Adicionar') }}</button>
</div>

<div class="my-4">
  @include('contracts.partial.tables.unities')
</div>

<hr class="my-5" />

<div class="d-flex justify-content-between align-items-start">
  <h6 class="heading-small text-muted mb-4">{{ __('Usuários deste contrato') }}</h6>
  <button type="button" class="btn btn-sm btn-info" data-settings="{{ json_encode((object) ['operation' => "create", 'config' => "contractUser", 'contract' => $contract->id]) }}" data-toggle="modal" data-target="#modal-index">{{ __('Adicionar') }}</button>
</div>

<div class="my-4">
  @include('contracts.partial.tables.contractUsers')
</div>
