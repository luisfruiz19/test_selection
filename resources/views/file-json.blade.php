@extends('welcome')
@section('title','Json')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-inline">
                <h1 class="d-inline">Archivo Json</h1> || <a href="{{route('articles.index')}}"
                                                             class="text-decoration-none"> Ir a ARTICULOS</a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody id="tableBody">
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        fetch('./archivo.json')
        .then(response => response.json())
        .then(data => {
            let rows = ``
            for (let i = 0; i < data.length; i++) {
                rows += `
                            <tr>
                            <td>${i + 1}</td>
                            <td>${data[i].title}</td>
                            <td>${data[i].description}</td>
                            <td>${data[i].date}</td>
                        </tr>`
            }


            const tableBody = document.querySelector("#tableBody");
            tableBody.innerHTML = rows;
        });

    </script>

@endpush
