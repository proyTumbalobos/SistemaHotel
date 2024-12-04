@extends('layouts.baseLayout')


@section('title', 'Categoria')

@section('content')


    <!-- Botón para abrir el modal -->

    <!-- -------------------- -->
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Lista de clientes</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTipoModal">
                Registrar cliente
            </button>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <form id="form-{{ $item->id }}" action="{{ route('cliente.update', $item) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <th>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                        id="name-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="number" name="dni" value="{{ $item->dni }}" class="form-control"
                                        id="dni-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="number" name="telefono" value="{{ $item->telefono }}" class="form-control"
                                        id="telefono-{{ $item->id }}" disabled>
                                </th>
                                <th class="d-flex justify-content-around align-items-center">
                                    <button type="button" class="btn btn-primary my-3"
                                        onclick="toggleEdit({{ $item->id }})"
                                        id="edit-btn-{{ $item->id }}">Editar</button>
                            </form>

                            <form action="{{ route('cliente.destroy', $item) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para registrar un nuevo cliente -->
    <div class="modal fade" id="createTipoModal" tabindex="-1" aria-labelledby="createTipoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTipoModalLabel">Registrar Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cliente.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}Debe ser nombre</div>
                            @enderror
                        </div>

                        <!-- Campo DNI -->
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="number" name="dni" class="form-control" value="{{ old('dni') }}" required>
                            @error('dni')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Teléfono -->
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="telefono" class="form-control" value="{{ old('telefono') }}"
                                required>
                            @error('telefono')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Función para habilitar los campos de entrada y mostrar el botón "Guardar"
        function toggleEdit(id) {
            // Obtener los elementos específicos por ID
            const nameField = document.getElementById(`name-${id}`);
            const dniField = document.getElementById(`dni-${id}`);
            const telefonoField = document.getElementById(`telefono-${id}`);
            const editButton = document.getElementById(`edit-btn-${id}`);
            const form = document.getElementById(`form-${id}`);

            // Alternar entre habilitar y deshabilitar
            if (nameField.disabled) {
                // Habilitar los campos y cambiar el botón a "Guardar"
                nameField.disabled = false;
                dniField.disabled = false;
                telefonoField.disabled = false;
                editButton.textContent = "Guardar";
                editButton.classList.remove("btn-primary");
                editButton.classList.add("btn-success");
            } else {
                // Enviar el formulario para guardar los cambios
                form.submit();
            }
        }

        // Evitar que el modal se cierre automáticamente si hay errores
        $('#createTipoModal').on('hidden.bs.modal', function() {
            // Reabrir el modal si existen mensajes de error
            if ($(".alert-danger").length) {
                $('#createTipoModal').modal('show');
            }
        });
    </script>

@endsection
