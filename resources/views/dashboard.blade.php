{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.baseLayout')


@section("title", 'Inicio')

@section('content')

<div class="list-group">
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">Estado del hotel</h5>
      </div>
    </div>
    <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        
      <div class="d-flex flex-wrap w-100 justify-content-around">
   
          <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
            <div class="card-header">Habitaciones libres</div>
            <div class="card-body">
              <h4 class="card-title">N° Habitaciones: {{$disponibles}}</h4>
            </div>
          </div>
          <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
            <div class="card-header">Habitaciones en limpieza</div>
            <div class="card-body">
              <h4 class="card-title">N° Habitaciones: {{$limpieza}}</h4>
            </div>
          </div>
          
          <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
            <div class="card-header">Habitaciones ocupadas</div>
            <div class="card-body">
              <h4 class="card-title">N° Habitaciones: {{$ocupadas}}</h4>
            </div>
          </div>
          
          
                     
      </div>
      
    </div>
  </div>
@endsection