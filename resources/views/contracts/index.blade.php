@extends('layouts.app')

@section('content')
@include('users.partials.header', [
'title' => __('Contratos'),
'description' => __('Página destinada ao gerenciamento de contratos')
])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="my-0 mx-auto col-xl-10 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-12 mb-0">{{ __('Contratos') }}</h3>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">{{ __($title) }}</h6>

          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if (session('error'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(sizeof($errors->all()))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              @foreach ($errors->all() as $messages)
                {{ $messages }}
              @endforeach
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @switch($page)
            @case('list')
            @include('contracts.partial.tables.contract', ['contracts' => $contracts])
          @break
          @case('create')
            @include('contracts.partial.forms.contract-create')
          @break
          @case('show')
            @include('contracts.partial.show', ['contract' => $contract])
          @break
          @default

          @endswitch
        </div>
      </div>
    </div>
  </div>
  @include('contracts.partial.modals.index')
  @include('layouts.footers.auth')
</div>
@endsection
