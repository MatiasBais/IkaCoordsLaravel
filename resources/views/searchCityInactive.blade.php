@extends('layouts.app')

@section('content')

<h3>Buscar Inactivos</h3>
<form id="cityFilterForm">
    <label for="allianceName">Alianza:</label>
    <input type="text" id="allianceName">

    <label for="xRange">X:</label>
    <input type="text" id="xRangeStart" placeholder="Mínimo">
    <input type="text" id="xRangeEnd" placeholder="Máximo">

    <label for="yRange">Y:</label>
    <input type="text" id="yRangeStart" placeholder="Mínimo">
    <input type="text" id="yRangeEnd" placeholder="Máximo">

    <label for="townName">Ciudad:</label>
    <input type="text" id="cityName">

    <button type="button" onclick="filterCities()">Filter Cities</button>
</form>

<div id="resultContainer"></div>

<script src="{{ asset('js/filter-cities-inactives.js') }}"></script>


@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection