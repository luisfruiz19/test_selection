@extends('welcome')
@section('title','Productos')
@section('content')
    <div class="d-inline">
        <h1 class="d-inline">Articulos</h1> || <a href="{{route('arhivo-json')}}" class="text-decoration-none"> Ir a vista JSON</a>
    </div>

    @include('message.error')
    @include('message.success')
    <div class="row">
        <div class="col-12">
            <button class="btn btn-sm btn-outline-info  mb-2" data-toggle="modal" data-target="#createProduct">Agregar Nuevo</button>
        </div>
    </div>

    @include('modal.create')
    <div class="table-responsive mt-2">
        <table class="table table-hover">
            <caption>Cantidad de articulos: {{$products->count()}}</caption>
            <thead>
            <tr>
                <th>#</th>
                <th>Autor</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @forelse($products as $key =>  $product)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$product->author->name}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            @if($product->state === 1)
                                <p>Activo</p>
                            @else
                                <p>Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-info btn-block" data-toggle="modal" data-target="#editProduct_{{$product->id}}">
                                Editar
                            </a>
                            @include('modal.edit')
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-danger btn-block" data-toggle="modal" data-target="#destroyProduct_{{$product->id}}"
                            >
                                Eliminar
                            </a>
                            @include('modal.destroy')
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay articulos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>



@endsection
