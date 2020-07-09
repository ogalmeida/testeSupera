
<form method="post" action="{{ route('attestation.store') }}" autocomplete="off">
  @csrf
  @method('post')

  <div class="pl-lg-4">

    <input type="hidden" name="unity_id" value="{{ $unity->id }}">

    <div class="row">
      <div class="col form-group">
        <label class="form-control-label" for="input-fantasy_name">{{ __('Nome Fantasia') }}</label>
        <input type="text" id="input-fantasy_name" class="form-control form-control-alternative" value="{{ $contract->fantasy_name}}" disabled>
      </div>

      <div class="col form-group">
        <label class="form-control-label" for="input-integration">{{ __('Nome Fantasia') }}</label>
        <input type="text" id="input-integration" class="form-control form-control-alternative" value="{{ $unity->integration}}" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col form-group">
        <label class="form-control-label" for="patient">{{ __('Paciente') }}</label>
        <select class="custom-select" id="patient" name="patient" required>
          <option selected value="Paciente 1">Paciente 1</option>
          <option value="Paciente 2">Paciente 2</option>
          <option value="Paciente 3">Paciente 3</option>
          <option value="Paciente 4">Paciente 4</option>
        </select>
      </div>

      <div class="col form-group">
        <label class="form-control-label" for="companion">{{ __('Acompanhante') }}</label>
        <select class="custom-select" id="companion" name="companion" required>
          <option selected value="Acompanhante 1">Acompanhante 1</option>
          <option value="Acompanhante 2">Acompanhante 2</option>
          <option value="Acompanhante 3">Acompanhante 3</option>
          <option value="Acompanhante 4">Acompanhante 4</option>
        </select>
      </div>

      <div class="col form-group">
        <label class="form-control-label" for="death">{{ __('Óbito') }}</label>
        <select class="custom-select" id="death" name="death" required>
          <option selected value="Óbito 1">Óbito 1</option>
          <option value="Óbito 2">Óbito 2</option>
          <option value="Óbito 3">Óbito 3</option>
          <option value="Óbito 4">Óbito 4</option>
        </select>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success mt-4 w-25">{{ __('Adicionar') }}</button>
    </div>
  </div>
</form>
