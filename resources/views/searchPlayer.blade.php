@extends('layouts.app')

@section('content')

<h3>Buscar Jugador</h3>
<form id="playerFilterForm">
    <label for="playerName">Jugador:</label>
    <input type="text" id="playerName">

    <label for="allianceName">Alianza:</label>
    <input type="text" id="allianceName">

    <label for="minPoints">Puntos:</label>
    <input type="number" id="minPoints" placeholder="Mínimo">
    <input type="number" id="maxPoints" placeholder="Mínimo">

    <button type="button" onclick="filterPlayers()">Buscar Jugadores</button>
</form>

<div id="playerResultContainer"></div>

<script src="{{ asset('js/filter-player.js') }}"></script>


@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection