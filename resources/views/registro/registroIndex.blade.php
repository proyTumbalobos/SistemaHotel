@extends('layouts.baseLayout')


@section("title", 'Cuartos')

@section('content')
    
    <div class="list-group mb-5">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Registros</h5>
          </div>
          
        </div>
        <div class=" ms-3 d-flex w-100 justify-content-between">
          <button form="form-excel" type="submit" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#createTipoModal">
            Generar reporte
        </button>
        </div>
        <table class="table mt-3">
          <thead>
            <tr>
              <th scope="col">Fecha de inicio</th>
              <th scope="col">Fecha final</th>
            </tr>
          </thead>
          <tbody>
              <form id="form-excel" action="{{route('reporte.store')}}" method="POST">
                @csrf
                  <tr>
                      <th>
                          
                              <label for="fecha" class="form-label">Seleccione fecha</label>
                              <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada">
                            
                      </th>
                      <th>
                          
                          <label for="fecha" class="form-label">Seleccione fecha</label>
                          <input type="date" class="form-control" id="fecha_salida" name="fecha_salida">
                        
                  </th>
                  </tr>
              </form>
  
          </tbody>
        </table>  
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cuarto</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Fecha de entrada</th>
                    <th scope="col">Fecha salida</th>
                    <!--
                    <th scope="col">Opciones</th>
                    -->
                  </tr>
                </thead>
                <tbody>
        
                  
                  
             @foreach ($registros as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    
                    <th>
                      @if ($item->cuarto==null )
                        No encontrado
                      @else
                        {{$item->cuarto->name}}
                      @endif
                    </th>

                    <th>
                      @if ( $item->cuarto==null)
                        No encontrado
                      @elseif($item->cuarto->piso==null)
                      no encontrada
                      @else
                        {{$item->cuarto->piso->name}}
                      @endif
                    </th>
                    <th>
                      @if ($item->cuarto==null)
                      no encontrada
                      @elseif($item->cuarto->categoria==null)
                      no encontrada
                      @else
                      {{$item->cuarto->categoria->name}}
                      @endif
                    </th>
                    <th>{{$item->fecha_entrada}}</th>
                    <th>{{$item->fecha_salida}}</th>
                    <th class="d-flex justify-content-around align-items-center">
                      <!--
                    <a href="{{route("registro.edit", $item)}}" class="btn btn-primary my-3" type="submit">Edit</a>
                        
                    <form action="{{route("registro.destroy", $item)}}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger">X</button>
                    </form>
                    -->
                    </th>
                  </tr>
               
            @endforeach 

                </tbody>
              </table>
          
       </div>
      </div>
@endsection