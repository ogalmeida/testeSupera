<div class="table-responsive">
  <table class="table align-items-center">
    <thead class="thead-light">
      <tr>
        <th scope="col">Paciente</th>
        <th scope="col">Acompanhante</th>
        <th scope="col">Óbito</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($attestations as $attestation)
        <tr>
          <th scope="row">
            {{ $attestation->patient }}
          </th>
          <td>
            {{ $attestation->companion }}
          </td>
          <td>
            {{ $attestation->death }}
          </td>
          <td>
            <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "destroy", 'config' => "attestation", 'contract' => $contract->id, 'id' => $attestation->id]) }}" onclick="updateModal()"><i class="far text-danger fa-trash-alt"></i> {{__('Excluir')}}</button>
            {{-- <button type="button" class="bg-transparent btn" data-settings="{{ json_encode((object) ['operation' => "destroy", 'config' => "attestation", 'contract' => $contract->id, 'id' => $attestation->id]) }}" data-target="#modal-index"><i class="far text-danger fa-trash-alt"></i> {{__('Excluir')}}</button> --}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
