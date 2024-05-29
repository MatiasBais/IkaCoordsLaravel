<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('searchCity');
});

Route::get('/search/cities', function () {
    return view('searchCity');
});

Route::get('/search/inactives', function () {
    return view('searchCityInactive');
});

Route::get('/search/players', function () {
    return view('searchPlayer');
});

Route::get('/search/islands', function () {
    return view('searchIsland');
});

Route::get('/tops/bestPlayers', function () {
    return view('topPlayers');
});

Route::get('/tops/worstPlayers', function () {
    return view('flopPlayers');
});

Route::get('/tops/bestAlianzas', function () {
    return view('topAlianzas');
});

Route::get('/tops/worstAlianzas', function () {
    return view('flopAlianzas');
});

Route::get('/statistics/clasiPlayer', function () {
    return view('clasiPlayers');
});

Route::get('/statistics/clasiAlianza', function () {
    return view('clasiAlianza');
});

Route::get('/statistics/mayorIntendencia', function () {
    return view('mayorIntendencia');
});

Route::get('/statistics/masCiudades', function () {
    return view('masCiudades');
});

Route::get('/player/{server}/{idplayer}', function ($server, $idplayer) {
    return view('getPlayerInfo', [
        'server' => $server,
        'idplayer' => $idplayer,
    ]);
});

Route::get('/alianza/{server}/{idalianza}', function ($server, $idalianza) {
    return view('getAlianzaInfo', [
        'server' => $server,
        'idalianza' => $idalianza,
    ]);
});

Route::get('/isla/{server}/{idisla}', function ($server, $idisla) {
    return view('getIslaInfo', [
        'server' => $server,
        'idisla' => $idisla,
    ]);
});

Route::get('/worldStatistics/clasiPlayer', function () {
    return view('worldClasiPlayers');
});

Route::get('/worldStatistics/clasiAlianza', function () {
    return view('worldClasiAlianza');
});

Route::get('/worldStatistics/mayorIntendencia', function () {
    return view('worldMayorIntendencia');
});

Route::get('/worldStatistics/masCiudades', function () {
    return view('worldMasCiudades');
});

Route::get('/torneoRufian', function () {
    return view('torneoRufian');
});

Route::get('/mapa', function () {
    return view('mapa');
});