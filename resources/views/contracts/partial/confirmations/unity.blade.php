<div>
  <h4>Deseja realmente remover esta unidade?</h4>
  <h5>Todos os atestados cadastrados nesta também serão excluídos.</h5>
  <form method="post" action="{{ route('unity.destroy', ['unity' => $id]) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn mt-4 float-right btn-danger">{{ __('Confirmar') }}</button>
  </form>
</div>
