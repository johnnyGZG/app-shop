@extends('layouts.app')

@section('title', 'Crear Nuevo Productos')

@section('body-class', 'profile-page')

@section('content')
    
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('img/kit/profile_city.jpg') }}'); ">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">
                    Crear Nuevo Productos
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ url('/admin/products') }}" >
                    @csrf
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nomProduct" class="bmd-label-floating">
                                    Nombre del producto
                                </label>
                                <input type="text" class="form-control" id="nomProduct" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="precioProduct" class="bmd-label-floating">
                                    Precio del Producto
                                </label>
                                <input type="number" class="form-control" id="precioProduct" name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="decripProduct" class="bmd-label-floating">
                                    Descripción corta
                                </label>
                                <input type="text" class="form-control" id="decripProduct" name="description" value="{{ old('description') }}">
                            </div>
                        </div>
                    </div>

                    <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description')</textarea>

                    <button type="submit" class="btn btn-primary">
                        Registrar Producto
                        <div class="ripple-container"></div>
                    </button>

                </form>

                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection
