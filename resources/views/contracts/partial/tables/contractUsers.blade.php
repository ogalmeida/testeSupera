<div class="table-responsive">
  <table class="table align-items-center">
    <thead class="thead-light">
      <tr>
        <th scope="col">Usuário</th>
        <th scope="col">CPF</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contractUsers as $contractUser)
        <tr>
          <th scope="row">
            {{ $contractUser->name }}
          </th>
          <td>
            {{ $contractUser->cpf }}
          </td>
          <td>
            <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "destroy", 'config' => "contractUser", 'contract' => $contract->id, 'id' => $contractUser->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="far text-danger fa-trash-alt"></i> {{__('Excluir')}}</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $contractUsers->links() }}
</div>
