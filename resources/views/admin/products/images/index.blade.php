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
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="photo" required accept=".jpg, .jpeg, .png" />
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
                                {{-- Campos calculado desde el modelo product_image --}}
                                <img src="{{ $image->url }}" />
                                <form method="POST" action="">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="image_id" value={{ $image->id }}>
                                    <button type="submit" class="btn btn-danger btn-round">
                                        Eliminar Imagen
                                    </button>
                                </form>
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
