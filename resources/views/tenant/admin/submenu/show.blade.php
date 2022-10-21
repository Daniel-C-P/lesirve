@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categorias Menu</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('submenus.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Menu:</strong>
                            {{ $categoriasMenu->id_menu }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            {{ $categoriasMenu->id_categoria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
