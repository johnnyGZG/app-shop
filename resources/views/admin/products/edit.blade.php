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
                    Editar Producto Seleccionado
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
                
                <form method="POST" action="{{ url('/admin/products/'.$product->id) }}" >
                    @csrf
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nomProduct" class="bmd-label-floating">
                                    Nombre del producto
                                </label>
                                <input type="text" class="form-control" id="nomProduct" name="name" value="{{ old( 'name', $product->name ) }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="precioProduct" class="bmd-label-floating">
                                    Precio del Producto
                                </label>
                                <input type="number" step="0.01" class="form-control" id="precioProduct" name="price" value="{{ old( 'price', $product->price ) }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="decripProduct" class="bmd-label-floating">
                                    Descripción corta
                                </label>
                                <input type="text" class="form-control" id="decripProduct" name="description" value="{{ old( 'description', $product->description ) }}">
                            </div>
                        </div>
                    </div>

                    <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old( 'long_description', $product->long_description ) }}</textarea>

                    <button type="submit" class="btn btn-primary">
                        Guardar Cambios
                        <div class="ripple-container"></div>
                    </button>

                    <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>

                </form>

                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection
