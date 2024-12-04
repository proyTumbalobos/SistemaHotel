@extends('layouts.baseLayout')


@section('title', 'Cuartos')

@section('content')

    <div class="list-group mb-5">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Registro de hospedaje</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <form action="{{ route('registro.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_cuarto" value="{{ $cuarto->id }}">

                <fieldset disabled>
                    <legend>Datos de la habitación</legend>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="disabledTextInput" class="form-label">Habitación</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="{{ $cuarto->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="disabledSelect" class="form-label">Categoría</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="@if ($cuarto->categoria) {{ $cuarto->categoria->name }} @else Categoria no encontrada @endif">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="disabledSelect" class="form-label">Piso</label>
                            <input type="text" id="disabledTextInput" class="form-control"
                                placeholder="@if ($cuarto->piso) {{ $cuarto->piso->name }} @else Piso no encontrado @endif">
                        </div>
                    </div>
                </fieldset>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">DNI del cliente</label>
                        <input type="text" class="form-control bg-light p-2" id="dni" name="dni">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre del cliente</label>
                        <input type="text" class="form-control bg-light p-2" id="nombre" name="nombre">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fecha" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control bg-light p-2" id="fecha_entrada" name="fecha_entrada">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fecha" class="form-label">Fecha de salida</label>
                        <input type="date" class="form-control bg-light p-2" id="fecha_salida" name="fecha_salida">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="horaInicio" class="form-label">Hora de Inicio</label>
                        <input type="time" class="form-control bg-light p-2" id="horaInicio" name="horaInicio" value="00:00">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="metodo_de_pago" class="form-label">Método de Pago</label>
                        <select class="form-select bg-light p-2" id="metodo_de_pago" name="metodo_de_pago">
                            <option>Seleccione Método...</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Yape">Yape</option>
                            <option value="Yape">Plin</option>
                            <option value="Yape">Scotibank</option>

                        </select>
                    </div>
                </div>

                <button class="btn btn-success mt-3" type="submit">Registrar</button>
            </form>
        </div>

    </div>

    <script>
        document.getElementById('dni').addEventListener('input', function() {
            let dni = this.value;
            if (dni.length >= 3) { // Empieza a buscar a partir de 3 caracteres
                fetch(`/buscar-cliente?dni=${dni}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('nombre').value = data.name;
                        } else {
                            document.getElementById('nombre').value = '';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('nombre').value = '';
            }
        });
    </script>

@endsection
