@extends('layouts.baseLayout')

@section('title', 'Cuartos')

@section('content')

<div class="list-group">
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-2">Habitaciones</h5>
            <!-- Filtro de Estado -->
            <form method="GET" action="{{ route('recepcion.index') }}" class="d-flex">
                <select name="estado" class="form-select me-2">
                    <option value="">Todos</option>
                    <option value="libre" {{ request('estado') == 'libre' ? 'selected' : '' }}>Libres</option>
                    <option value="ocupada" {{ request('estado') == 'ocupada' ? 'selected' : '' }}>Ocupadas</option>
                    <option value="limpieza" {{ request('estado') == 'limpieza' ? 'selected' : '' }}>Limpieza</option>
                </select>
                <button type="submit" class="btn btn-outline-light">Filtrar</button>
            </form>
        </div>
    </div>
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex flex-wrap w-100 justify-content-around">
            @foreach ($cuartos as $item)
                <div class="card mb-3" style="max-width: 20rem; border-color: 
                {{ $item->estado == 'libre' ? 'green' : ($item->estado == 'ocupada' ? 'orange' : 'purple') }};">
                    <div class="card-header">{{ $item->detalle }}</div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->name }}</h4>
                        <p class="card-text">Piso: {{ $item->piso->name ?? 'No encontrado' }}</p>
                        <p class="card-text">Categoria: {{ $item->categoria->name ?? 'No encontrado' }}</p>
                        <p class="card-text">Precio: {{ $item->categoria->precio ?? 'No encontrado' }}</p>

                        <!-- Botón dinámico según el estado -->
                        @if($item->estado == 'libre')
                            <a href="{{ route('registro.show', $item->id) }}" class="btn btn-outline-success  m-1">Reservar</a>
                        @else
                            <form action="{{ route('cambiarEstado', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="accion" 
                                    value="{{ $item->estado == 'ocupada' ? 'salida' : 'limpieza' }}">
                                <button type="submit" class="btn 
                                    {{ $item->estado == 'ocupada' ? 'btn-outline-warning' : 'btn-outline-primary' }}">
                                    {{ $item->estado == 'ocupada' ? 'Marcar Salida' : 'Terminar Limpieza' }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
