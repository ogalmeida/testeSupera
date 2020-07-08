@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Contratos'),
'description' => __('Página destinada ao gerenciamento de contratos')
])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="my-0 mx-auto col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-12 mb-0">{{ __('Contratos') }}</h3>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">{{ __($title) }}</h6>
          @switch($page)
            @case('list')
            @include('contracts.partial.list', ['contracts' => $contracts])
          @break
          @case('create')
            @include('contracts.partial.create')
          @break
          @default

          @endswitch
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footers.auth')
</div>
@endsection
