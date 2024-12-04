@extends('layouts.baseLayout')


@section("title", 'Cuartos')

@section('content')
    
    <div class="list-group mb-5">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Registro de hospedaje</h5>
          </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            
          
            <form action="{{route('registro.update', $registro)}}" method="POST">
                @csrf
                @method('put')            
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI del cliente</label>
                    <input type="text" value="{{$registro->cliente->dni}}" class="form-control" id="dni" name="dni">
                </div>
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre del cliente</label>
                  <input type="text" value="{{$registro->cliente->name}}" class="form-control" id="nombre" name="nombre">
              </div>
                <div class="mb-3">
                  <label for="dni" class="form-label">Habitación</label>
                  <select name='id_cuarto' class="form-select" aria-label="Default select example">
                    @foreach ($cuartos as $item)
                    <option value="{{$item->id}}"
                      @if ($registro->id_cuarto==$item->id)
                          selected
                      @endif
                      >
                      {{$item->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Seleccione fecha de inicio</label>
                    <input type="date" value="{{$registro->fecha_entrada}}" class="form-control" id="fecha_entrada" name="fecha_entrada">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Seleccione fecha de salida</label>
                    <input type="date" value="{{$registro->fecha_salida}}" class="form-control" id="fecha_salida" name="fecha_salida">
                </div>
                <button  class="btn btn-outline-dark mt-3" type="submit">Modificar</button>
              </form>
            
        </div>
      </div>
@endsection