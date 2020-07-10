<div class="table-responsive">
  <table class="table align-items-center">
    <thead class="thead-light">
      <tr>
        <th scope="col">Nome Fantasia</th>
        <th scope="col">Status</th>
        <th scope="col">Email</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($contracts as $contract)
        <tr>
          <th scope="row">
            <div class="media align-items-center">
              <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" src="{{ asset('img/'.$contract->logo) }}">
              </a>
              <div class="media-body">
                <span class="mb-0 text-sm">{{ $contract->fantasy_name }}</span>
              </div>
            </div>
          </th>
          <td>
            @if($contract->status)
              <span class="badge badge-dot">
                <i class="bg-success"></i> Ativo
              </span>
            @else
              <span class="badge badge-dot">
                <i class="bg-warning"></i> Inativo
              </span>
            @endif
          </td>
          <td>
            {{ $contract->email }}
          </td>
          <td>
            <a href="{{ route('contract.show', ['contract' => $contract->id]) }}" class="text-decoration-none"><i class="far text-primary fa-edit"></i> Editar</a>
          </td>
          <td>
            <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "destroy", 'config' => "contract", 'contract' => $contract->id, 'id' => $contract->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="far text-danger fa-trash-alt"></i> {{__('Excluir')}}</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $contracts->links() }}
</div>
