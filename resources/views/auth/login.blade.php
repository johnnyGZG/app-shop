@extends('layouts.app')

@section('body-class','signup-page')

@section('content')
    
    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{ asset('img/kit/free/bg7.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">
                            Iniciar Sesión
                        </h2>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <form class="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                </div>
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Correo Electronico..." value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña..." required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                Recordar sesión
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-round">
                                                Ingresar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
