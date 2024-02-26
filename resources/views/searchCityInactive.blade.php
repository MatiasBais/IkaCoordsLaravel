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

    <label for="pagina">Página:</label>
    <select id="pagina" name="pagina">
        <option value="0">1-50</option>
        <option value="50">51-100</option>
        <option value="100">101-150</option>
        <option value="150">151-200</option>
        <option value="200">201-250</option>
        <option value="250">251-300</option>
        <option value="300">301-350</option>
        <option value="350">351-400</option>
        <option value="400">401-450</option>
        <option value="450">451-500</option>
        <option value="500">501-550</option>
        <option value="550">551-600</option>
        <option value="600">601-650</option>
        <option value="650">651-700</option>
        <option value="700">701-750</option>
        <option value="750">751-800</option>
        <option value="800">801-850</option>
        <option value="850">851-900</option>
        <option value="900">901-950</option>
        <option value="950">951-1000</option>
    </select>

    <button type="button" onclick="filterCities()">Buscar Ciudades</button>
</form>

<div id="resultContainer"></div>

<script src="{{ asset('js/filter-cities-inactives.js') }}"></script>


@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection