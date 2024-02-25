@extends('layouts.app')

@section('content')

<h3>Mayor Intendencia</h3>
<form id="pointIncreaseForm">
    <label for="pagina">Ranking:</label>
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

    <button type="button" onclick="calculateRanking()">Mostrar</button>
</form>

<div id="resultContainer"></div>


<script src="{{ asset('js/mayor-intendencia.js') }}"></script>


@endsection


@section('searchBar')
@include('layouts.statisticsBar')
@endsection