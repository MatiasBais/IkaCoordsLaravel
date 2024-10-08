<?php

use Illuminate\Http\Request;
use App\Models\Alianza;
use App\Models\City;
use App\Models\Player;
use App\Models\Isla;
use App\Models\Puntos;
use App\Models\Updates;

// Ruta para obtener información de una alianza
Route::get('/getAlianzaInfo', function (Request $request) {
    $servidor = $request->input('servidor');
    $idAlianza = $request->input('idAlianza');


    $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');

    $alianza = Alianza::with([
        'players' => function ($query) use ($servidor, $maxUpdatePuntos) {
            $query->where('server', $servidor)->with([
                'puntos' => function ($query) use ($maxUpdatePuntos) {
                    $query->where('update', $maxUpdatePuntos);
                }
            ]);
        }
    ])->where('idalianza', $idAlianza)->where('server', $servidor)->first();

    return response()->json($alianza);
});

// Ruta para obtener las ciudades con el mayor nivel
Route::get('/cities/mayorNivel', function (Request $request) {
    $servidor = $request->input('servidor');
    $pagina = $request->input('pagina') ? $request->input('pagina') : 0;


    $maxUpdateCiudad = City::where('server', $servidor)->max('update');
    $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');

    $ciudades = City::with([
        'isla',
        'player' => function ($query) use ($servidor, $maxUpdatePuntos) {
            $query->where('server', $servidor)->with([
                'alianza',
                'puntos' => function ($query) use ($maxUpdatePuntos, $servidor) {
                    $query->where('update', $maxUpdatePuntos)
                        ->where('server', $servidor);
                }
            ]);
        }
    ])->where('server', $servidor)
        ->where('update', $maxUpdateCiudad)
        ->orderBy('nivel', 'desc')
        ->limit(50)
        ->offset($pagina)
        ->get();

    return response()->json($ciudades);
});

Route::get('/filter-cities', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('servidor');
        $cityName = $request->input('cityName') ? $request->input('cityName') : "";
        $allianceName = $request->input('allianceName') ? $request->input('allianceName') : "";
        $xRangeStart = $request->input('xRangeStart') ? $request->input('xRangeStart') : 0;
        $xRangeEnd = $request->input('xRangeEnd') ? $request->input('xRangeEnd') : 100;
        $yRangeStart = $request->input('yRangeStart') ? $request->input('yRangeStart') : 0;
        $yRangeEnd = $request->input('yRangeEnd') ? $request->input('yRangeEnd') : 100;
        $pagina = $request->input('pagina') ? $request->input('pagina') : 0;
        $playerName = $request->input('playerName') ? $request->input('playerName') : "";


        $maxUpdateCiudad = City::where('server', $servidor)->max('update');
        $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');
        // Inicializar la consulta con las relaciones cargadas
        $query = "select players.nombre as 'Player', cities.server, players.idplayer, alianzas.idalianza, islas.wonderlv, islas.idisla, alianzas.nombre as 'Alliance', cities.nombre as 'Town-Name', cities.nivel as 'TownLv', x, y, wonderName as 'Wonder', woodlv as 'Wood', good, goodlv, Totales 
        from players
        left outer join alianzas on players.idAlianza = alianzas.idalianza and alianzas.server='" . $servidor . "' 
        join cities on cities.playerid=players.idplayer and cities.server='" . $servidor . "' and cities.update='" . $maxUpdateCiudad . "'  
        join islas on cities.islaid = islas.idisla and islas.server='" . $servidor . "' and x >= " . $xRangeStart . "  and x <= " . $xRangeEnd . "  and y >= " . $yRangeStart . "  and y <= " . $yRangeEnd . " 
        join puntos on players.idplayer=puntos.idPlayer and puntos.update='" . $maxUpdatePuntos . "' 
        where players.server='" . $servidor . "' and cities.nombre LIKE '%" . $cityName . "%'";

        if ($playerName == "BOOOOCA") {
            $query = $query . "and players.idplayer in (100010, 100044, 100085, 100131, 100182, 100220, 100254, 100389, 100400, 100442, 100468, 100573, 100649, 100686, 100737, 100755, 100803, 100831, 100846, 100918, 100960, 101006, 101034, 101063, 101112, 101150, 101283, 101331, 101354, 101578, 101601, 101632, 101643, 101679, 101705, 101735, 101787, 101821, 101840, 101943, 101962, 101995, 102021, 102037, 102067, 102102, 102123, 102168, 102188, 102231, 102340, 102362, 102390, 102396, 102404, 102417, 102437, 102443, 102456, 102464, 102482, 102582, 102595, 102614, 102645, 102652, 102658, 102674, 102688, 102701, 102770, 102789, 102800, 102827, 102859, 102874, 102886, 102897, 102921, 102932, 102942, 103278, 103331, 101393, 100276, 101476)";
        } elseif ($playerName == "BOOOOT") {
            $query = $query . "and players.idplayer in (100022, 100049, 100087, 100125, 100144, 100195, 100206, 100210, 100253, 100259, 100300, 100332, 100351, 100379, 100404, 100444, 100453, 100499, 100520, 100564, 100577, 100669, 100710, 100736, 100765, 100780, 100810, 100853, 100899, 100931, 101005, 101025, 101040, 101048, 101102, 101146, 101151, 101181, 101197, 101202, 101253, 101280, 101286, 101347, 101380, 101416, 101427, 101438, 101448, 101539, 101550, 101570, 101603, 101608, 101638, 101676, 101701, 101725, 101736, 101741, 101770, 101781, 101785, 101836, 101843, 101907, 101924, 101927, 101938, 101944, 101956, 101960, 101979, 101984, 102006, 102015, 102039, 102052, 102068, 102079, 102085, 102116, 102228, 102307, 102308)";

        } else {
            $query = $query . "and players.nombre LIKE '%" . $playerName . "%'";
        }

        if ($allianceName != "") {
            $query = $query . "  and alianzas.nombre LIKE '%" . $allianceName . "%'";
        }

        if ($playerName == "BOOOOCA") {

        } elseif ($playerName == "BOOOOT") {
        } else {
            $query = $query . " limit " . $pagina . ", 50";
        }
        $ciudades = DB::select($query);


        // Devolver la respuesta JSON
        return response()->json($ciudades);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error' . $e], 500);
    }
});

// Ruta para filtrar ciudades inactivas
Route::get('/filter-cities-inactives', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('servidor');
        $cityName = $request->input('cityName') ? $request->input('cityName') : "";
        $allianceName = $request->input('allianceName') ? $request->input('allianceName') : "";
        $xRangeStart = $request->input('xRangeStart') ? $request->input('xRangeStart') : 0;
        $xRangeEnd = $request->input('xRangeEnd') ? $request->input('xRangeEnd') : 100;
        $yRangeStart = $request->input('yRangeStart') ? $request->input('yRangeStart') : 0;
        $yRangeEnd = $request->input('yRangeEnd') ? $request->input('yRangeEnd') : 100;
        $pagina = $request->input('pagina') ? $request->input('pagina') : 0;


        $maxUpdateCiudad = City::where('server', $servidor)->max('update');
        $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');
        // Inicializar la consulta con las relaciones cargadas
        $query = "select players.nombre as 'Player', cities.server, players.idplayer, alianzas.idalianza, islas.wonderlv, islas.idisla, alianzas.nombre as 'Alliance', cities.nombre as 'Town-Name', cities.nivel as 'TownLv', x, y, wonderName as 'Wonder', woodlv as 'Wood', good, goodlv, Totales 
        from players
        left outer join alianzas on players.idAlianza = alianzas.idalianza and alianzas.server='" . $servidor . "' and alianzas.nombre LIKE '%" . $allianceName . "%' 
        join cities on cities.playerid=players.idplayer and cities.server='" . $servidor . "' and cities.update='" . $maxUpdateCiudad . "'  
        join islas on cities.islaid = islas.idisla and islas.server='" . $servidor . "' and x >= " . $xRangeStart . "  and x <= " . $xRangeEnd . "  and y >= " . $yRangeStart . "  and y <= " . $yRangeEnd . " 
        join puntos on players.idplayer=puntos.idPlayer and puntos.update='" . $maxUpdatePuntos . "' 
        where players.server='" . $servidor . "' and cities.nombre LIKE '%" . $cityName . "%' and players.estado = 'inactive' order by totales desc 
        limit " . $pagina . ", 50";
        $ciudades = DB::select($query);


        // Devolver la respuesta JSON
        return response()->json($ciudades);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error' . $e], 500);
    }
});

// Ruta para filtrar islas
Route::get('/filter-islands', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('servidor');
        $goodlvStart = $request->input('goodlvStart');
        $goodlvEnd = $request->input('goodlvEnd');
        $woodlvStart = $request->input('woodlvStart');
        $woodlvEnd = $request->input('woodlvEnd');
        $selectedGood = $request->input('specificGood');
        $xRangeStart = $request->input('xRangeStart');
        $xRangeEnd = $request->input('xRangeEnd');
        $yRangeStart = $request->input('yRangeStart');
        $yRangeEnd = $request->input('yRangeEnd');

        // Construir el filtro de consulta

        $query = Isla::where('server', $servidor);

        // Filtrar por nivel bueno (goodlv)
        if ($goodlvStart !== null && $goodlvEnd !== null) {
            $query->whereBetween('goodlv', [$goodlvStart, $goodlvEnd]);
        } elseif ($goodlvStart !== null) {
            $query->where('goodlv', '>=', $goodlvStart);
        } elseif ($goodlvEnd !== null) {
            $query->where('goodlv', '<=', $goodlvEnd);
        }

        // Filtrar por nivel de madera (woodlv)
        if ($woodlvStart !== null && $woodlvEnd !== null) {
            $query->whereBetween('woodlv', [$woodlvStart, $woodlvEnd]);
        } elseif ($woodlvStart !== null) {
            $query->where('woodlv', '>=', $woodlvStart);
        } elseif ($woodlvEnd !== null) {
            $query->where('woodlv', '<=', $woodlvEnd);
        }

        // Otros filtros
        if ($selectedGood) {
            $query->where('good', $selectedGood);
        }
        if ($xRangeStart) {
            $query->where('x', '>=', $xRangeStart);
        }
        if ($xRangeEnd) {
            $query->where('x', '<=', $xRangeEnd);
        }
        if ($yRangeStart) {
            $query->where('y', '>=', $yRangeStart);
        }
        if ($yRangeEnd) {
            $query->where('y', '<=', $yRangeEnd);
        }

        // Realizar la consulta
        $islas = $query->get();

        // Devolver las islas filtradas
        return response()->json($islas);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => $e], 500);
    }
});

// Ruta para obtener información de una isla
Route::get('/getIslaInfo', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $idIsla = $request->input('idIsla');
        $servidor = $request->input('servidor');
        // Obtener los máximos updates para ciudades y puntos
        $maxUpdateCiudad = City::where('server', $servidor)->max('update');

        // Realizar la consulta para obtener información de la isla
        $isla = Isla::where('idisla', $idIsla)
            ->where('server', $servidor)
            ->with([
                'cities' => function ($query) use ($servidor, $maxUpdateCiudad) {
                    $query->where('server', $servidor)
                        ->where('update', $maxUpdateCiudad)
                        ->with([
                            'player' => function ($query) use ($servidor, $maxUpdateCiudad) {
                                $query->where('server', $servidor)
                                    ->with([
                                        'puntos' => function ($query) use ($maxUpdateCiudad, $servidor) {
                                            $query->where('update', $maxUpdateCiudad)
                                                ->where('server', $servidor);
                                        }
                                    ])
                                    ->with([
                                        'alianza' => function ($query) use ($servidor) {
                                            $query->where('server', $servidor);
                                        }
                                    ]);
                            }
                        ]);
                }
            ])
            ->first();

        // Devolver la información de la isla
        return response()->json($isla);

    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error' . $e], 500);
    }
});

// Ruta para obtener jugadores con más ciudades
Route::get('/players/masCiudades', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('servidor');
        $pagina = $request->input('pagina');

        $maxUpdateCiudad = City::where('server', $servidor)->max('update');

        $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');

        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select players.nombre as 'nombre',
        players.idplayer,  
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        totales,
        count(cities.idcity) as Cantidad 
        from players 
        join cities on playerid=idplayer and cities.update = " . $maxUpdateCiudad . " 
        join puntos on puntos.idplayer = players.idplayer and puntos.server=players.server and puntos.update='" . $maxUpdatePuntos . "' 
        left outer join alianzas on players.idalianza = alianzas.idalianza and alianzas.server='" . $servidor . "'  
                where players.server='" . $servidor . "' and cities.server='" . $servidor . "'   
                group by idplayer 
                order by Cantidad desc 
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

// Ruta para obtener información de un jugador
Route::get('/getPlayerInfo', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $idPlayer = $request->input('idPlayer');
        $servidor = $request->input('servidor');

        $maxUpdate = City::where('server', $servidor)->max('update');

        // Realizar la consulta para obtener información del jugador
        $jugador = Player::with([
            'alianza',
            'puntos' => function ($query) use ($maxUpdate) {
                $query->where('update', $maxUpdate)
                    ->with('updates');
            },
            'cities' => function ($query) use ($maxUpdate, $servidor) {
                $query->where('update', $maxUpdate)
                    ->with('isla', function ($islaQuery) use ($servidor) {
                        $islaQuery->where('server', $servidor);
                    });
            }
        ])
            ->where('idplayer', $idPlayer)
            ->where('server', $servidor)
            ->first();

        // Devolver la información del jugador
        return response()->json($jugador);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json($e, 500);
    }
});

// Ruta para filtrar jugadores
Route::get('/filter-players', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('server');
        $playerName = $request->input('playerName') ? $request->input('playerName') : "";
        $allianceName = $request->input('allianceName') ? $request->input('allianceName') : "";
        $minPoints = $request->input('minPoints') ? $request->input('minPoints') : 0;
        $maxPoints = $request->input('maxPoints') ? $request->input('maxPoints') : 9999999999;
        $pagina = $request->input('pagina') ? $request->input('pagina') : 0;

        $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');
        // Realizar la consulta para filtrar jugadores
        $query = "select players.nombre as 'Player',players.server, puntos.update, players.idplayer, alianzas.nombre, alianzas.idalianza, totales, constructor, investigadores, generales, oro 
         from players
		 join puntos on players.idplayer=puntos.idPlayer and puntos.update = '" . $maxUpdatePuntos . "'
		 left outer join alianzas on players.idalianza=alianzas.idalianza and alianzas.server = '" . $servidor . "' and alianzas.nombre LIKE '%" . $allianceName . "%' 
         where players.server='" . $servidor . "' and players.nombre LIKE '%" . $playerName . "%' and totales >='" . $minPoints . "' and totales <='" . $maxPoints . "'  
         order by Totales 
         desc limit " . $pagina . ",50";

        $jugadores = DB::select($query);

        // Devolver los jugadores filtrados
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json($e, 500);
    }
});

// Ruta para obtener puntos de los jugadores
Route::get('/puntos/players', function (Request $request) {
    try {
        $pagina = $request->input('pagina');
        $servidor = $request->input('servidor');
        $clasificacion = $request->input('clasificacion');

        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select players.nombre as 'nombre',
        players.idplayer, 
        players.server,
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        " . $clasificacion . " as 'Puntos'
        from players 
        join puntos on players.idplayer = puntos.idplayer and puntos.server = players.server and puntos.update in(select max(numero) from updates group by updates.server)
        left outer join alianzas on players.idalianza = alianzas.idalianza and alianzas.server=players.server
        where players.server = '" . $servidor . "' 
		order by " . $clasificacion . " desc
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

// Ruta para obtener puntos de las alianzas
Route::get('/puntos/alianzas', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $servidor = $request->input('servidor');
        $pagina = $request->input('pagina');
        $clasificacion = $request->input('clasificacion');
        $maxUpdatePuntos = Updates::where('server', $servidor)->max('numero');

        $puntosAlianzas = "select sum(" . $clasificacion . ") as puntos, alianzas.idalianza as idalianza, alianzas.nombre as nombre from puntos 
         join players on players.idplayer = puntos.idplayer 
         join alianzas on alianzas.idalianza = players.idAlianza and alianzas.server ='" . $servidor .
            "' where players.server='" . $servidor . "' and puntos.update=" . $maxUpdatePuntos . "
         group by alianzas.idAlianza, alianzas.nombre order by puntos DESC limit " . ($pagina) . ", 50";

        $puntosAlianzas = DB::select($puntosAlianzas);



        return response()->json($puntosAlianzas);
    } catch (\Exception $e) {

        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error', $e], 500);
    }
});

// Ruta para obtener fechas de actualización
Route::get('/fetch-dates', function (Request $request) {
    try {
        // Obtener el servidor desde la solicitud
        $servidor = $request->input('server');

        // Realizar la consulta para obtener las fechas de actualización
        $fechasActualizacion = Updates::select('numero', 'fecha')
            ->where('server', $servidor)
            ->orderBy('numero', 'asc')
            ->get();

        // Formatear las fechas en el formato deseado
        $formattedDates = $fechasActualizacion->map(function ($fecha) {
            return [
                'numero' => $fecha->numero,
                'fecha' => $fecha->fecha // Formato DD-MM-YYYY
            ];
        });

        // Devolver las fechas de actualización formateadas
        return response()->json($formattedDates);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

// Ruta para calcular el ranking de aumento de puntos de los jugadores
Route::get('/point-increase-ranking', function (Request $request) {
    $query = "";
    try {
        // Obtener los parámetros de la solicitud
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $servidor = $request->input('server');
        $pagina = $request->input('pagina') ? $request->input('pagina') : 0;
        $clasificacion = $request->input('clasificacion');
        $order = $request->input('order');
        //order 0 es para crecimiento, order 1 para decrecimiento
        // Realizar la consulta para filtrar jugadores
        $query = "SELECT alianzas.idalianza, players.idplayer, alianzas.nombre as 'alianza', players.nombre, DATE_FORMAT(ub.fecha, '%d/%m/%y') as 'fecha'," .
            " b." . $clasificacion . " as 'bPuntos'," .
            " a." . $clasificacion . " as 'aPuntos'," .
            " ub.numero, ua.numero as 'aNumero' " .
            " FROM players " .
            " LEFT JOIN puntos a ON players.idplayer = a.idPlayer " .
            " LEFT JOIN puntos b ON players.idplayer = b.idPlayer " .
            " JOIN updates ua ON ua.numero = a.update " .
            " JOIN updates ub ON ub.numero = b.update " .
            " LEFT outer JOIN alianzas ON players.idAlianza = alianzas.idalianza AND alianzas.server = '" . $servidor . "'  " .
            " WHERE ub.numero = " . $endDate . "" .
            " AND ua.numero = (SELECT MIN(p2.update) FROM puntos p2 WHERE p2.idplayer = players.idplayer AND p2.update >= " . $startDate . ") " .
            " AND players.server = '" . $servidor . "' " .
            " AND ua.server = '" . $servidor . "' " .
            " AND ub.server = '" . $servidor . "' ";
        if ($order == 0)
            $query = $query . " order by b." . $clasificacion . "-a." . $clasificacion . " desc";
        else
            $query = $query . " order by a." . $clasificacion . "-b." . $clasificacion . " desc";

        $query = $query . " limit " . ($pagina) . ", 50;";

        $jugadores = DB::select($query);

        // Devolver los jugadores filtrados
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json($e, 500);
    }
});

// Ruta para calcular el ranking de aumento de puntos de las alianzas
Route::get('/point-increase-ranking-alliances', function (Request $request) {
    try {
        // Obtener los parámetros de la solicitud
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $servidor = $request->input('server');
        $pagina = $request->input('pagina') ? $request->input('pagina') : 0;
        $clasificacion = $request->input('clasificacion');
        $order = $request->input('order');
        //order 0 es para crecimiento, order 1 para decrecimiento
        // Realizar la consulta para filtrar jugadores
        $query = "SELECT alianzas.idalianza, alianzas.nombre as 'nombre'," .
            " sum(b." . $clasificacion . ") as 'bPuntos'," .
            " sum(a." . $clasificacion . ") as 'aPuntos'" .
            " FROM players " .
            " LEFT JOIN puntos a ON players.idplayer = a.idPlayer " .
            " LEFT JOIN puntos b ON players.idplayer = b.idPlayer " .
            " JOIN updates ua ON ua.numero = a.update " .
            " JOIN updates ub ON ub.numero = b.update " .
            " JOIN alianzas ON players.idAlianza = alianzas.idalianza AND alianzas.server = '" . $servidor . "'  " .
            " WHERE ub.numero = " . $endDate . "" .
            " AND ua.numero = (SELECT MIN(p2.update) FROM puntos p2 WHERE p2.idplayer = players.idplayer AND p2.update >= " . $startDate . ") " .
            " AND players.server = '" . $servidor . "' " .
            " AND ua.server = '" . $servidor . "' " .
            " AND ub.server = '" . $servidor . "' " .
            " group by idalianza, alianzas.nombre ";
        if ($order == 0)
            $query = $query . " order by sum(b." . $clasificacion . ")-sum(a." . $clasificacion . ") desc";
        else
            $query = $query . " order by sum(a." . $clasificacion . ")-sum(b." . $clasificacion . ") desc";

        $query = $query . " limit " . ($pagina) . ", 50;";

        $jugadores = DB::select($query);

        // Devolver los jugadores filtrados
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json($e, 500);
    }
});

// Ruta para obtener jugadores con más ciudades
Route::get('/players/masCiudadesWorld', function (Request $request) {
    try {
        $pagina = $request->input('pagina');
        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select players.nombre as 'nombre',
        players.idplayer, 
        players.server,
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        count(cities.idcity) as Cantidad 
        from players 
        join cities on playerid=idplayer and players.server = cities.server and cities.update in(select max(numero) from updates group by updates.server)
        left outer join alianzas on players.idalianza = alianzas.idalianza and alianzas.server=players.server  
                group by idplayer, players.server, players.nombre, alianzas.nombre, alianzas.idalianza
                order by Cantidad desc
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error' . $e], 500);
    }
});

// Ruta para obtener las ciudades con el mayor nivel
Route::get('/cities/mayorNivelWorld', function (Request $request) {
    try {
        $pagina = $request->input('pagina');
        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select players.nombre as 'nombre',
        players.idplayer, 
        players.server,
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        nivel,
        cities.nombre as 'ciudad',
        x,
        y,
        islaid
        from players 
        join cities on playerid=idplayer and players.server = cities.server and cities.update in(select max(numero) from updates group by updates.server)
        left outer join alianzas on players.idalianza = alianzas.idalianza and alianzas.server=players.server
        join islas on islaid=idisla and islas.server=cities.server
                order by nivel desc
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});


Route::get('/puntos/playersWorld', function (Request $request) {
    try {
        $pagina = $request->input('pagina');
        $clasificacion = $request->input('clasificacion');

        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select players.nombre as 'nombre',
        players.idplayer, 
        players.server,
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        " . $clasificacion . " as 'Puntos'
        from players 
        join puntos on players.idplayer = puntos.idplayer and puntos.server = players.server and puntos.update in(select max(numero) from updates group by updates.server)
        left outer join alianzas on players.idalianza = alianzas.idalianza and alianzas.server=players.server
		order by " . $clasificacion . " desc
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

Route::get('/puntos/alianzasWorld', function (Request $request) {
    try {
        $pagina = $request->input('pagina');
        $clasificacion = $request->input('clasificacion');

        // Realizar la consulta para obtener los jugadores con más ciudades
        $jugadores = "select  alianzas.server,
        alianzas.nombre as 'Alianza',
        alianzas.idalianza,
        sum(" . $clasificacion . ") as 'Puntos' 
        from players 
        join puntos on players.idplayer = puntos.idplayer and puntos.server = players.server and puntos.update in(select max(numero) from updates group by updates.server)
        join alianzas on players.idalianza = alianzas.idalianza and alianzas.server=players.server
        group by alianzas.idalianza, alianzas.nombre, alianzas.server
		order by sum(" . $clasificacion . ") desc
                limit " . $pagina . ",50";
        $jugadores = DB::select($jugadores);
        // Devolver los jugadores con más ciudades
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Manejar cualquier error que ocurra
        return response()->json(['error' => 'Internal Server Error' . $e], 500);
    }
});

Route::get('/mapa', function (Request $request) {
    try {
        $a1 = $request->input('a1');
        $a2 = $request->input('a2');
        $a3 = $request->input('a3');
        $a4 = $request->input('a4');
        $a5 = $request->input('a5');
        $server = $request->input('server');

        // Initialize the base query
        $query = 'select count(cities.idcity) as cant, islaid, x, y, alianzas.idalianza, alianzas.nombre
        from islas
        join cities on islaid=idisla and cities.server="' . $server . '" and cities.update in(select max(numero) from updates where updates.server = "' . $server . '")
        join players on playerid=idplayer and players.server="' . $server . '"
        join alianzas on alianzas.idalianza = players.idalianza and alianzas.server="' . $server . '"
        where islas.server="' . $server . '" and cities.update in(select max(numero) from updates where updates.server = "' . $server . '") and (alianzas.nombre = ? or alianzas.nombre = ?)';

        // Prepare the bindings array
        $bindings = [$a1, $a2];

        // Append conditions and bindings for a3, a4, and a5 if they are defined
        if ($a3) {
            $query .= ' or alianzas.nombre = ?';
            $bindings[] = $a3;
        }
        if ($a4) {
            $query .= ' or alianzas.nombre = ?';
            $bindings[] = $a4;
        }
        if ($a5) {
            $query .= ' or alianzas.nombre = ?';
            $bindings[] = $a5;
        }

        // Finalize the query
        $query .= ' group by islaid, alianzas.idalianza, x, y, alianzas.nombre';

        // Execute the query with bindings
        $jugadores = DB::select($query, $bindings);

        // Return the players with the most cities
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Handle any error that occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
});

Route::get('/ikariamguru', function (Request $request) {
    try {
        $id = $request->input('id');

        // Initialize the base query
        $query = 'select * from ikariamguru where id="' . $id . '" and hasta >= CURRENT_DATE;';
        // Execute the query with bindings
        $jugadores = DB::select($query);

        // Return the players with the most cities
        return response()->json($jugadores);
    } catch (\Exception $e) {
        // Handle any error that occurs
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
});