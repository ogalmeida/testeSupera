<div>
  <h4>Deseja realmente remover este usuário?</h4>
  <form method="post" action="{{ route('contractUser.destroy', ['contractUser' => $id]) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn mt-4 float-right btn-danger">{{ __('Confirmar') }}</button>
  </form>
</div>
