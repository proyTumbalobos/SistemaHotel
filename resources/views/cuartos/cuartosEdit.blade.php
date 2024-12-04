@extends('layouts.baseLayout')


@section("title", 'Editar cuarto')

@section('content')
<h4>Editar cuarto</h4>

<form id="form" action="{{ route('cuarto.update',$cuarto) }}" method="POST">
    @csrf
    @method('put')
    <input value="libre" type="hidden" id="estado" name="estado">
     
        <div class="form-group">
            <label for="name">Nombre</label>
            <input value="{{$cuarto->name}}" type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Detalle</label>
            <input value="{{$cuarto->detalle}}" type="text" name="detalle" class="form-control" required>
        </div>
        <div class="form-group row m-3">
            <label for="categoria" class="col-sm-2 col-form-label">Pisos</label>
            <div class="col-sm-10">
                <input type="hidden" id="id_piso" name="id_piso" value="{{ $cuarto->piso->id }}">
                <input list="listaPisos" type="text" class="form-control" id="pisoName" 
                    value="{{ $cuarto->piso->name }}" required>
                <datalist id="listaPisos">
                    @foreach ($pisos as $item)
                        <option value="{{ $item->name }}" data-id="{{ $item->id }}"></option>
                    @endforeach
                </datalist>
            </div>
            @error('id_piso')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row m-3">
            <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
              <input type="hidden" id="id_categoria" name="id_categoria" value="{{$cuarto->categoria->id}}" required>
              <input list="listaCategorias" type="text" class="form-control"  id="categoriaName" value="{{$cuarto->categoria->name}}">
                    <datalist id="listaCategorias">

                    @foreach ($categorias as $item)
                    <option value="{{ $item->name }}"   data-id="{{$item->id}}"></option>
                    @endforeach

                  </datalist>
            </div>
            @error('id_categoria')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </
    <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>








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
    </script>
@endsection