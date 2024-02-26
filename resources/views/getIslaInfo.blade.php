@extends('layouts.app')

@section('content')

<div id="isla-data" data-server="{{ $server }}" data-isla-id="{{ $idisla }}"></div>

<div class="isla-info">
    <h2>Isla</h2>
    <table id="isla-table">
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Coordenadas</th>
            <td class="data-cell" id="isla-coordenadas">Cargando..</td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Recurso</th>
            <td class="data-cell" id="isla-recurso"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nivel Aserradero</th>
            <td class="data-cell" id="isla-aserradero"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nivel Mina</th>
            <td class="data-cell" id="isla-mina"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Maravilla</th>
            <td class="data-cell" id="isla-maravilla"></td>
        </tr>
    </table>
</div>

<div class="ciudad-info">
    <h2>Ciudades</h2>
    <table id="ciudades-table">
        <tr>
            <th>Nombre</th>
            <th>Jugador</th>
            <th>Alianza</th>
            <th>Nivel</th>
            <th>Puntos Totales</th>
        </tr>
    </table>
</div>

<script src="{{ asset('js/get-isla-info.js') }}"></script>

@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection