@extends('layouts.app')

@section('title', 'listado de Productos')

@section('body-class', 'profile-page')

@section('content')
    
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('img/kit/profile_city.jpg') }}'); ">
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">
                    Listado de Productos
                </h2>
                <div class="team">
                    <div class="row justify-content-center">

                        <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">
                            Nuevo Producto
                        </a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-ms-1 text-cneter">#</th>
                                    <th class="col-md-3 text-center">Nombre</th>
                                    <th class="col-md-2 text-center">Categoria</th>
                                    <th class="col-md-1 text-center">Destacado</th>
                                    <th class="col-ms-2 text-center">Precio</th>
                                    <th class="col-ms-3 text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="col-ms-1 text-cneter">
                                            {{ $product->id }}
                                        </td>
                                        <td class="col-md-3 text-center">
                                            {{ $product->name }}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {{ $product->category ? $product->category->name : 'General' }}
                                        </td>
                                        <td class="col-md-1 text-center">
                                            2013
                                        </td>
                                        <td class="col-ms-2 text-center">$ 
                                            {{ $product->price }}
                                        </td>
                                        <td class="td-actions col-ms-3 text-center">
                                            <form method="POST" action="{{ url('/admin/products/'.$product->id) }}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="#" rel="tooltip" class="btn btn-info btn-link" data-toggle="tooltip" data-placement="top" title="Ver Producto">
                                                    <i class="material-icons">info</i>
                                                </a>
                                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" class="btn btn-success btn-link" data-toggle="tooltip" data-placement="top" title="Editar Producto">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" class="btn btn-warning btn-link" data-toggle="tooltip" data-placement="top" title="Imagenes del Producto">
                                                    <i class="material-icons">image</i>
                                                </a>
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-link" data-toggle="tooltip" data-placement="top" title="Eliminar Producto" >
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{-- Muestra los link de paginacion --}}
                        {{ $products->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection
