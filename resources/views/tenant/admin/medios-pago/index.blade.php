@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
            {{-- <form action="{{route('medios-pagos.update')}}" method="post"> --}}
                {{-- @csrf --}}
                @include('tenant.admin.medios-pago.form')
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ global_asset('js/tenant/admin/mediosdepago.js') }}"></script>
@endsection

