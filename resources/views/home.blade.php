@extends('layouts.app')

@section('title', 'Dashboard')

@section('body-class', 'profile-page')

@section('content')
    
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('img/kit/profile_city.jpg') }}'); ">

    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">
                    Dashboard
                </h2>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                CARRITO DE COMPRAS 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                PEDIDOS REALIZADOS
                            </a>
                        </li>
                    </ul>
                    
                    <hr />
                    <p class="text-cneter">
                        Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.
                    </p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-cneter">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">SubTotal</th>
                                <th class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->cart->details as $detail)
                                <tr>
                                    <td class="text-cneter">
                                        <img src="{{ $detail->product->featured_image_url }}" height="50" />
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/products/'.$detail->product->id) }}">
                                            {{ $detail->product->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">$ 
                                        {{ $detail->product->price }}
                                    </td>
                                    <td class="text-center">
                                        {{ $detail->quantity }}
                                    </td>
                                    <td class="text-center">
                                        $ {{ $detail->quantity * $detail->product->price }}
                                    </td>
                                    <td class="td-actions text-center">
                                        <form method="POST" action="{{ url('/cart') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}" />
                                            <a href="{{ url('/products/'.$detail->product->id) }}" rel="tooltip" class="btn btn-info btn-link" data-toggle="tooltip" data-placement="top" title="Ver Producto">
                                                <i class="material-icons">info</i>
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
                    
                    <form method="POST" action="{{ url('/order') }}">
                        @csrf
                        <div class="text-center">
                            <button class="btn btn-primary btn-round">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection