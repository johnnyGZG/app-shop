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
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Destacado</th>
                                    <th class="text-right">Precio</th>
                                    <th class="text-right">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                        </td>
                                        <td>
                                            2013
                                        </td>
                                        <td class="text-right">&euro; 
                                            {{ $product->price }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ver Detalles">
                                                <i class="material-icons">person</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar Producto">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger"data-toggle="tooltip" data-placement="top" title="Eliminar Producto" >
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer ">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>

@endsection
