@extends('layouts.baseLayout')


@section("title", 'Cuartos')

@section('content')
    
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Habitaciones En limpieza</h5>
          </div>
        </div>
        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            
          <div class="d-flex flex-wrap w-100 justify-content-around">

            @foreach ($cuartos as $item)
            <div class="card border-success mb-3" style="max-width: 20rem;">
                <div class="card-header">{{$item->detalle}}</div>
                <div class="card-body">
                  <h4 class="card-title">{{$item->name}}</h4>
                  <p class="card-text">
                    Piso: 
                    @if ($item->piso==null)
                        No encontrado
                    @else
                        {{$item->piso->name}}
                    @endif
                    
                  </p>
                  <p class="card-text">
                    Categoria: 
                    @if ($item->categoria==null)
                        No encontrado
                    @else
                        {{$item->categoria->name}}
                    @endif
                    
                  </p>

                </div>
                <form id="form-{{ $item->id }}" action="{{ route('limpieza.update',$item->id) }}" method="POST">
                    @csrf
                    @method('put')
  
                    </form>
                  <button form="form-{{ $item->id }}" class="btn btn-outline-success m-1" type="submit">Terminar limpieza</button>
              </div>
              @endforeach 
              
              
              
                         
          </div>
          
        </div>
      </div>
@endsection