<div>
  <h4>Deseja realmente remover este contrato?</h4>
  <h5>Todas as dependências deste serão excluídas em sequência.</h5>
  <form method="post" action="{{ route('contract.destroy', ['contract' => $id]) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn mt-4 float-right btn-danger">{{ __('Confirmar') }}</button>
  </form>
</div>
