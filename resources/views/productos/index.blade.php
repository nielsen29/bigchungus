@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @include('flash::message')
                            @if (isset($producto))
                                <div class="alert alert-success" role="alert">
                                   se creo el articulo {{ $producto->nombre }}
                                </div>
                            @endif

                        <div >

                            <h4>PRODUCTOS</h4>
                            <div class="card">
                                <a class="btn btn-success" href="{{route('producto.create')}}">agregar</a>
                            </div>

                            </div>
                            <table style="width:100%">
                                <tr>
                                    <th>id</th>
                                    <th>nombre</th>
                                    <th>descrip</th>
                                    <th>ACC</th>
                                </tr>

                                    @if(isset($productos))
                                        @foreach($productos as $dato)
                                        <tr>
                                            <td>{{$dato->id}}</td>
                                            <td>{{$dato->nombre}}</td>
                                            <td>{{$dato->descrip}}</td>
                                            <td>
                                                <a class="btn btn-primary " href="{{ url('producto/'.$dato->id) }}">ver</a>
                                                <a class="btn btn-warning " href="{{ url('producto/'.$dato->id.'/edit') }}">Update</a>
                                                <form method="post" action="{{ url('producto/'.$dato->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection
