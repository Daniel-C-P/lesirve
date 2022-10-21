@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('menus.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                    <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $menu->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            <a href="{{ $menu->url }}" target="_blank">{{ $menu->url }}</a>
                        </div>
                        <div class="form-group">
                            <strong>Visible:</strong>
                            {{ $menu->visble ? 'Si' : 'No' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
