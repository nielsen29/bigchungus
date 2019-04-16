@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div >

                            <h4>PRODUCTOS</h4>
                            <div>
                                @php
                                if(isset($producto)){
                                    //var_dump($producto);
                                    $metodo = "POST";
                                    $acc = route('producto.update', $producto[0]->id);
                                }else{
                                    $metodo = "POST";
                                    $acc = route('producto.store');
                                }

                                @endphp

                                <form method="{{$metodo}}" action="{{$acc}}">
                                   @if(isset($producto))
                                        @method("PATCH")
                                    @endif
                                    @csrf
                                    <label>Nombre</label>
                                    <input name="nombre" value="{{isset($producto)?$producto[0]->nombre:null}}">

                                    <br>

                                    <label>Descripcion</label>
                                    <input name="descrip" value="{{isset($producto)?$producto[0]->descrip:null}}">

                                    <br><br>
                                    <button class="btn btn-success">{{isset($producto)?"ACTUALIZAR":"GUARDAR"}}</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
