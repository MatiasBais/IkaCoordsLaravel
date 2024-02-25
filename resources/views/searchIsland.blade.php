@extends('layouts.app')

@section('content')

<h3>Buscar Islas</h3>
<form id="islandFilterForm">
    <label for="goodlvRange">Nivel Mina:</label>
    <input type="number" id="goodlvStart" placeholder="Mínimo">
    <input type="number" id="goodlvEnd" placeholder="Máximo">

    <label for="woodlvRange">Nivel Aserradero:</label>
    <input type="number" id="woodlvStart" placeholder="Mínimo">
    <input type="number" id="woodlvEnd" placeholder="Máximo">

    <label for="specificGood">Recurso de Lujo:</label>
    <select id="specificGood">
        <option value="">Cualquiera</option>
        <option value="1">Vino</option>
        <option value="2">Mármol</option>
        <option value="3">Cristal</option>
        <option value="4">Azufre</option>
    </select>

    <label for="xRange">X:</label>
    <input type="number" id="xRangeStart" placeholder="Mínimo">
    <input type="number" id="xRangeEnd" placeholder="Máximo">

    <label for="yRange">Y:</label>
    <input type="number" id="yRangeStart" placeholder="Mínimo">
    <input type="number" id="yRangeEnd" placeholder="Máximo">

    <button type="button" onclick="filterIslands()">Buscar Islas</button>
</form>

<div id="resultContainer"></div>

<script src="{{ asset('js/filter-island.js') }}"></script>


@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection