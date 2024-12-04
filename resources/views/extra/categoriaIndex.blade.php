@extends('layouts.baseLayout')


@section('title', 'Categoria')

@section('content')


    <!-- Botón para abrir el modal -->

    <!-- -------------------- -->
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Lista de categorías</h5>
            </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTipoModal">
                Crear categoría
            </button>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <form id="form-{{ $item->id }}" action="{{ route('categoria.update', $item) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <th>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                        id="name-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="text" name="detalle" value="{{ $item->detalle }}" class="form-control"
                                        id="detalle-{{ $item->id }}" disabled>
                                </th>
                                <th>
                                    <input type="number" name="precio" value="{{ $item->precio }}" class="form-control"
                                        id="precio-{{ $item->id }}" disabled>
                                </th>
                                <th class="d-flex justify-content-around align-items-center">
                                    <button type="button" class="btn btn-primary my-3"
                                        onclick="toggleEdit({{ $item->id }})" id="edit-btn-{{ $item->id }}">Editar
                                    </button>
                            </form>

                            <form action="{{ route('categoria.destroy', $item) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para crear una nueva categoría -->
    <div class="modal fade" id="createTipoModal" tabindex="-1" aria-labelledby="createTipoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTipoModalLabel">Crear Nueva Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categoria.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="detalle">Detalle de categoría</label>
                            <textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" name="precio" class="form-control" step="0.01" min="0"
                                required>
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
            // Obtener los elementos específicos por ID
            const nameField = document.getElementById(`name-${id}`);
            const detalleField = document.getElementById(`detalle-${id}`);
            const precioField = document.getElementById(`precio-${id}`);
            const editButton = document.getElementById(`edit-btn-${id}`);
            const form = document.getElementById(`form-${id}`);

            // Alternar entre habilitar y deshabilitar
            if (nameField.disabled) {
                // Habilitar los campos y cambiar el botón a "Guardar"
                nameField.disabled = false;
                detalleField.disabled = false;
                precioField.disabled = false;
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
