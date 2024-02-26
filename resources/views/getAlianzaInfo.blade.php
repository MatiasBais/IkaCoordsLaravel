@extends('layouts.app')

@section('content')

<div id="alliance-data" data-server="{{ $server }}" data-alianza-id="{{ $idalianza }}"></div>


<div class="player-info">
    <h2>Alianza</h2>
    <table id="alianza-table">
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nombre</th>
            <td class="data-cell" id="alianza-nombre">Cargando..</td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Totales</th>
            <td class="data-cell" id="alianza-totales"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Maestro Constructor</th>
            <td class="data-cell" id="alianza-constructor"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Investigadores</th>
            <td class="data-cell" id="alianza-investigadores"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Generales</th>
            <td class="data-cell" id="alianza-generales"></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Oro</th>
            <td class="data-cell" id="alianza-oro"></td>
        </tr>
    </table>
</div>

<div class="player-info">
    <h2>Jugadores</h2>
    <table id="jugadores-table">
        <tr>
            <th>Nombre</th>
            <th>Totales</th>
            <th>Maestro Constructor</th>
            <th>Investigadores</th>
            <th>Generales</th>
            <th>Oro</th>
        </tr>
    </table>
</div>



<script src="{{ asset('js/get-alianza-info.js') }}"></script>

@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection