<div>
  <h4>Deseja realmente remover este atestado?</h4>
  <form method="post" action="{{ route('attestation.destroy', ['attestation' => $id]) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn mt-4 float-right btn-danger">{{ __('Confirmar') }}</button>
  </form>
</div>
