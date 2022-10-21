@extends('layouts.app2')

@section('title', 'Login')

@section('css')

<style type="text/css">
</style>
@endsection

@section('content')

    <div class="login-box">

        <div class="card">

            <div class="card-header">
                <h3>{{ $title }}</h3>
            </div>

            <div class="card-body login-card-body">

                <form method="post" action="{{ route('login.tenant.admin') }}">
                    @csrf
                    @error('message')
                        <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label>Ingresa email</label>
                        <input type="email" name="email" class="form-control" />
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        <label>Ingresa tu contraseña</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        <button type="submit" id="button" name="button" class="btn btn-dark btn-block">
                            {{ 'Iniciar sesion' }}
                            <span class="fas fa-sign-in-alt"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>



    </div>

@endsection
