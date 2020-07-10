<div class="table-responsive">

  <table class="table align-items-center">
    <thead class="thead-light">
      <tr>
        <th scope="col">Integração</th>
        <th scope="col">Município - Estado</th>
        <th scope="col">Status</th>
        <th scope="col" class="text-center">Atestados</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($unities as $unity)
        <tr>
          <th scope="row">
            <div class="media align-items-center">
              <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" src="{{ asset('img/'.$unity->logo) }}">
              </a>
              <div class="media-body">
                <span class="mb-0 text-sm">{{ $unity->integration }}</span>
              </div>
            </div>
          </th>
          <td>
            {{ $unity->city }} - {{ $unity->state }}
          </td>
          <td>
            @if($unity->status)
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
            <div class="d-flex justify-content-around">
              <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "create", 'config' => "attestation", 'contract' => $contract->id, 'id' => $unity->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="fas text-info fa-plus"></i> {{__('Adicionar')}}</button>
              <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "view", 'config' => "attestations", 'contract' => $contract->id, 'id' => $unity->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="fas text-info fa-folder"></i> {{__('Visualizar')}}</button>
            </div>
          </td>
          <td>
            <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "update", 'config' => "unity", 'contract' => $contract->id, 'id' => $unity->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="far text-primary fa-edit"></i> {{__('Editar')}}</button>
          </td>
          <td>
            <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "destroy", 'config' => "unity", 'contract' => $contract->id, 'id' => $unity->id]) }}" data-toggle="modal" data-target="#modal-index"><i class="far text-danger fa-trash-alt"></i> {{__('Excluir')}}</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $unities->links() }}
</div>
