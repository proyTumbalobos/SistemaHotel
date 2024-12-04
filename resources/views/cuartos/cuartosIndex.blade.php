@extends('layouts.baseLayout')


@section("title", 'Cuartos')

@section('content')




<div class="list-group">
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Lista de Habitaciones</h5>
      </div>
    </div>
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class=" mt-2 d-flex justify-content-between">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTipoModal">
            Crear nueva habitación
        </button>
        <form>
            
            <select class="form-select"  id="select-piso" name="piso">
                <option  value="">Todos los pisos</option>
                @foreach($pisos as $piso)
                    <option value="{{ $piso->id }}">{{ $piso->name }}</option>
                @endforeach
            </select>
        </form>
        </div>
        
      <div class="d-flex w-100 justify-content-between">
        
        
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Detalle</th>
            <th scope="col">Estado</th>
            <th scope="col">Piso</th>
            <th scope="col">Categoria</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>

          
          
    @foreach ($cuartos as $item)
          <tr class="cuarto" data-piso="{{ $item->piso->id }}">
            <th>{{$item->id}}</th>
            
                
                @csrf
                @method('PUT')
            <th>{{ $item->name }}</th>
            <th>{{ $item->detalle }}</th>
            <th>{{$item->estado}}</th>
            <th>
                 
                    @if ($item->piso == null)
                        Piso no encontrado
                    @else
                    {{$item->piso->name}}
                    @endif
                
                
            </th>
            <th>
                @if ($item->categoria == null)
                        Categoria no encontrada
                    @else
                    {{$item->categoria->name}}
                    @endif
            </th>
            <th class="d-flex justify-content-around align-items-center">
            
            <a class="btn btn-primary my-3" href="{{route("cuarto.edit", $item)}}">Edit</a>
            </th>
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
                <h5 class="modal-title" id="createTipoModalLabel">Crear nueva habitación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cuarto.store') }}" method="POST">
                @csrf
                <input value="libre" type="hidden" id="estado" name="estado">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Detalle</label>
                        <input type="text" name="detalle" class="form-control" required>
                    </div>
                    <div class="form-group row m-3">
                        <label for="categoria" class="col-sm-2 col-form-label">Pisos</label>
                        <div class="col-sm-10">
                          <input type="hidden" id="id_piso" name="id_piso">
                          <input list="listaPisos" type="text" class="form-control"  id="pisoName"
                                value="">
                                <datalist id="listaPisos">
                                @foreach ($pisos as $item)
                                <option value="{{ $item->name }}"   data-id="{{$item->id}}"></option>
                                @endforeach
                              </datalist>
                        </div>
                        @error('id_piso')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group row m-3">
                        <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                          <input type="hidden" id="id_categoria" name="id_categoria">
                          <input list="listaCategorias" type="text" class="form-control"  id="categoriaName"
                                value="">
                                <datalist id="listaCategorias">

                                @foreach ($categorias as $item)
                                <option value="{{ $item->name }}"   data-id="{{$item->id}}"></option>
                                @endforeach

                              </datalist>
                        </div>
                        @error('id_categoria')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- -------------------- -->
<script>
    
    document.getElementById('pisoName').addEventListener('input', function() {
        var input = this;
        var list = document.getElementById('listaPisos').options;
        var hiddenInput = document.getElementById('id_piso');
    
        hiddenInput.value = ''; // Limpiar el campo oculto si no hay coincidencia
        for (var i = 0; i < list.length; i++) {
            if (list[i].value === input.value) {
                hiddenInput.value = list[i].getAttribute('data-id');
                break;
            }
        }
    });

    document.getElementById('categoriaName').addEventListener('input', function() {
        var input = this;
        var list = document.getElementById('listaCategorias').options;
        var hiddenInput = document.getElementById('id_categoria');
    
        hiddenInput.value = ''; // Limpiar el campo oculto si no hay coincidencia
        for (var i = 0; i < list.length; i++) {
            if (list[i].value === input.value) {
                hiddenInput.value = list[i].getAttribute('data-id');
                break;
            }
        }
    });

    
        // Escucha el cambio en el select
        document.getElementById('select-piso').addEventListener('change', function() {
            var selectedPiso = this.value; // Obtiene el piso seleccionado
            var cuartos = document.querySelectorAll('.cuarto'); // Obtiene todos los divs de cuartos

            cuartos.forEach(function(cuarto) {
                // Si el cuarto pertenece al piso seleccionado o no se ha seleccionado ningún piso, lo mostramos
                if (cuarto.getAttribute('data-piso') === selectedPiso || selectedPiso === "") {
                    cuarto.style.display = '';
                } else {
                    cuarto.style.display = 'none'; // Si no, lo ocultamos
                }
            });
        });
        </script>
    

@endsection