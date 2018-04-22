@extends('layouts.app')

@section('title', 'listado de Imagenes')

@section('body-class', 'profile-page')

@section('content')
    
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('img/kit/profile_city.jpg') }}'); ">
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">
                    Imagenes del producto "{{ $product->name }}"
                </h2>
                
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <input type="file" name="photo" required />
                            <button type="submit" class="btn btn-primary btn-round">
                                Subir nueva Imagen
                            </button>
                            <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">
                                Volver al listado de productos
                            </a>
                        </form>
                    </div>
                </div>
                
                <div class="row">
                    @foreach ($images as $image)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ $image->image }}" />
                                <button type="submit" class="btn btn-danger btn-round">
                                    Eliminar Imagen
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection
