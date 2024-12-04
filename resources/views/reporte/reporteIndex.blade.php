@extends('layouts.baseLayout')


@section('title', 'Categoria')

@section('content')


    <!-- Botón para abrir el modal -->

    <!-- -------------------- -->
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Reporte</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#createTipoModal">
                Generar reporte
            </button>
            <div class="d-flex w-100 justify-content-between">

            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha final</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="">
                        <tr>
                            <th>

                                <label for="fecha" class="form-label">Seleccione fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">

                            </th>
                            <th>

                                <label for="fecha" class="form-label">Seleccione fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">

                            </th>
                        </tr>
                    </form>

                </tbody>
            </table>
        </div>
    </div>
@endsection
