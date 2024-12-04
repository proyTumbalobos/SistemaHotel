@extends('layouts.baseLayout')


@section('title', 'Categoria')

@section('content')


    <!-- Botón para abrir el modal -->

    <!-- -------------------- -->
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Lista de usuarios</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTipoModal">
                Registrar usuario
            </button>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <form id="form-{{ $item->id }}" action="{{ route('usuario.update', $item) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <th>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                        id="name-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="email" name="email" value="{{ $item->email }}" class="form-control"
                                        id="email-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <select name="rol" class="form-select" id="rol-{{ $item->id }}" disabled>
                                        <option value="admin" {{ $item->rol == 'admin' ? 'selected' : '' }}>Administrador
                                        </option>
                                        <option value="recepcionista" {{ $item->rol == 'recepcionista' ? 'selected' : '' }}>
                                            Recepcionista</option>
                                    </select>
                                </th>
                                <th class="d-flex justify-content-around align-items-center">
                                    <button type="button" class="btn btn-primary my-3"
                                        onclick="toggleEdit({{ $item->id }})"
                                        id="edit-btn-{{ $item->id }}">Editar</button>
                            </form>

                            <form action="{{ route('usuario.destroy', $item) }}" method="POST">
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

    <!-- Modal para registrar un nuevo usuario -->
    <div class="modal fade" id="createTipoModal" tabindex="-1" aria-labelledby="createTipoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTipoModalLabel">Registrar Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('usuario.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" class="form-select" required>
                                <option value="admin">Administrador</option>
                                <option value="recepcionista">Recepcionista</option>
                            </select>
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
        function toggleEdit(id) {
            // Obtener los elementos específicos por ID
            const nameField = document.getElementById(`name-${id}`);
            const emailField = document.getElementById(`email-${id}`);
            const rolField = document.getElementById(`rol-${id}`);
            const editButton = document.getElementById(`edit-btn-${id}`);
            const form = document.getElementById(`form-${id}`);

            // Alternar entre habilitar y deshabilitar
            if (nameField.disabled) {
                // Habilitar los campos y cambiar el botón a "Guardar"
                nameField.disabled = false;
                emailField.disabled = false;
                rolField.disabled = false;
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
