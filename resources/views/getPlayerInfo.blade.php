@extends('layouts.app')

@section('content')

<div id="player-data" data-server="{{ $server }}" data-player-id="{{ $idplayer }}"></div>
<div class="player-info">
    <h3>Jugador</h3>
    <table id="player-table">
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nombre</th>
            <td class="data-cell" id="player-name">Cargando...</td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Alianza</th>
            <td class="data-cell" id="alianza"><a id="alianzalink" href=""></a></td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Totales</th>
            <td class="data-cell" id="totales">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Constructor</th>
            <td class="data-cell" id="constructor">
            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nivel Construccion</th>
            <td class="data-cell" id="nivelConstruccion">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Investigadores</th>
            <td class="data-cell" id="investigadores">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Nivel Investigadores</th>
            <td class="data-cell" id="nivelInvestigadores">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Generales</th>
            <td class="data-cell" id="generales">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Oro</th>
            <td class="data-cell" id="oro">

            </td>
        </tr>
        <tr>
            <th class="header-cell" style="background-color: #444; color: white;">Donacion</th>
            <td class="data-cell" id="donacion">

            </td>
        </tr>

    </table>
</div>

<div class="ciudad-info">
    <h4>Ciudades</h4>
    <table id="cities-table">
        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Coordenadas</th>
            <th>Recurso</th>
            <th>Mina</th>
            <th>Aserradero</th>
            <th>Maravilla</th>
        </tr>
        <!-- Las ciudades se cargarán aquí -->
    </table>
</div>

<div class="points-info">
    <h4>Puntos</h4>
    <table id="points-table">
        <tr>
            <th>Fecha</th>
            <th>Totales</th>
            <th>Constructor</th>
            <th>Nivel Construcción</th>
            <th>Investigadores</th>
            <th>Nivel Investigadores</th>
            <th>Generales</th>
            <th>Oro</th>
            <th>Donacion</th>
        </tr>
        <!-- Los puntos se cargarán aquí -->
    </table>
</div>

<script src="{{ asset('js/get-player-info.js') }}"></script>

@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection