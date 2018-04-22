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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills nav-pills-icons" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
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

                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection