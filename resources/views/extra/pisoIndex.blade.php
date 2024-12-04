@extends('layouts.baseLayout')


@section('title', 'Pisos')

@section('content')


    {{-- <!-- listado de pisos -->
<div class="">
    @foreach ($pisos as $item)
       <form class="my-4" action="{{ route('piso.update', $item) }}" method="POST">
           Piso: {{ $item->name }}
           @csrf
           @method('PUT')

            <div class="form-group">
                <label for="name">Nombre de piso</label>
                <input type="text" name="name" value="{{ $item->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Numero de cuartos</label>
                <input type="text" name="num_cuartos" value="{{ $item->num_cuartos }}" class="form-control">
            </div>
           <button class="btn btn-outline-danger my-3" type="submit">Actualizar</button>
       </form>
       <form action="{{route("piso.destroy", $item)}}" method="POST">
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    @endforeach 
</div> --}}


    <!-- -------------------- -->
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Lista de pisos</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTipoModal">
                Crear nuevo piso
            </button>
            <div class="d-flex w-100 justify-content-between"></div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Habitaciones</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pisos as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <form id="form-{{ $item->id }}" class="my-4" action="{{ route('piso.update', $item) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <th>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                        id="name-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="text" name="num_cuartos" value="{{ $item->num_cuartos }}"
                                        class="form-control" id="num_cuartos-{{ $item->id }}" disabled>
                                </th>
                                <th class="d-flex justify-content-around align-items-center">
                                    <button type="button" class="btn btn-primary my-3"
                                        onclick="toggleEdit({{ $item->id }})" id="edit-btn-{{ $item->id }}">Editar
                                    </button>
                                </th>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de nuevo piso -->
    <div class="modal fade " id="createTipoModal" tabindex="-1" aria-labelledby="createTipoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTipoModalLabel">Crear Nuevo Piso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('piso.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Numero de cuartos</label>
                            <input type="number" name="num_cuartos" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleEdit(id) {
            // Obtener elementos específicos por ID
            const nameField = document.getElementById(`name-${id}`);
            const numCuartosField = document.getElementById(`num_cuartos-${id}`);
            const editButton = document.getElementById(`edit-btn-${id}`);
            const form = document.getElementById(`form-${id}`);

            // Alternar entre habilitar y deshabilitar
            if (nameField.disabled) {
                // Habilitar campos y cambiar el botón a "Guardar"
                nameField.disabled = false;
                numCuartosField.disabled = false;
                editButton.textContent = "Guardar";
                editButton.classList.remove("btn-primary");
                editButton.classList.add("btn-success");
            } else {
                // Enviar el formulario para guardar los cambios
                form.submit();
            }
        }
    </script>


@endsection
