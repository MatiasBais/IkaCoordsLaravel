<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="normalize.css">
    <meta charset="UTF-8">
    <title>Torneo Rufián</title>
    <style>
    header {
        background-color: #00796b;
        /* Teal background color with 80% opacity */
        text-align: center;
        /* Centers the text and image horizontally */
        padding: 20px;
        /* Adds some padding around the content */
    }

    .header-image {
        width: 100%;
        /* Adjust this as needed for your layout */
        height: auto;
        /* Maintains the aspect ratio */
        display: block;
        margin: 0 auto;
        /* Centers the image */
    }

    h1 {
        color: white;
        /* Changes the text color to white for better contrast */
        margin: 20px 0 0 0;
        /* Adds margin on top and bottom for spacing */
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .desplegable {
        margin: 1em;
        background-color: #00796b;
    }


    .desplegable {
        text-decoration: none;
        color: #fff
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    footer {
        text-align: center;
        padding: 10px 0;
        background-color: #007BFF;
        color: #fff;
    }


    footer p {
        margin: 0;
    }

    main {
        margin: 20px 0;
    }

    .ranking-selection,
    .ranking-display,
    .subirBatalla {
        margin-bottom: 20px;
    }

    .ranking-selection h2 {
        margin-bottom: 10px;
    }

    .ranking-selection,
    .subirBatalla {
        display: flex;
        align-items: center;
        justify-content: center;
    }


    select {
        padding: 5px;
        font-size: 16px;
        margin-left: 10px;
    }

    button {
        padding: 5px 10px;
        font-size: 16px;
        background-color: #00796b;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .ranking-display h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        /* Removes gaps between cells */
        margin: 20px 0;
        /* Adds some margin around the table */
    }

    th,
    td {
        border: 1px solid #ddd;
        /* Adds a border to the table cells */
        padding: 8px;
        /* Adds padding to the table cells */
        text-align: left;
        /* Aligns text to the left */
    }

    th {
        background-color: #00796b;
        /* Dark background for the header */
        color: white;
        /* White text color for the header */
    }

    tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
        /* Light gray background for odd rows */
    }

    tbody tr:nth-child(even) {
        background-color: #ffffff;
        /* White background for even rows */
    }

    p {
        margin-left: 20px;
        margin-right: 20px;
    }

    ul {
        margin-left: 30px;
        text-align: left;
    }

    li {

        margin-left: 30px;
        text-align: left;

    }

    .batalla {
        text-align: left;
        font-size: 8;
    }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <img src="images\Banner 2.png" alt="Torneo Rufián Image" class="header-image">
            <h1>Torneo Rufián 2024 -
                The Return of The Golden Cow</h1>
        </header>>
        <main>
            <section class="ranking-selection">
                <h3>Selecciona una Clasificación: </h3>
                <select name="ranking" id="rankingSelect" class="rankingSelect">
                    <option value="7">General</option>
                    <option value="6">Por Diferencia de Generales</option>
                    <option value="4">Por Batallas Ganadas</option>
                    <option value="8">Ligas Menores</option>
                    <option value="2">Por Generales Destruidos</option>
                    <option value="5">Por Batallas Participadas</option>
                    <!-- Add more options as needed -->
                </select>
            </section>
            <section class="ranking-display">
                <h2 id="rankingTitle"></h2>
                <div id="divTabla">
                    <table id="rankingTable" style="display: none;">
                        <thead>
                            <tr>
                                <th>Posición</th>
                                <th>Jugador</th>
                                <th>Puntos</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <p id="errorMessage" style="display: none; color: red;"></p>
            </section>

            <div class="subirBatalla">
                <a target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSfL_ZziGh4-_mebrJUjcbc0t5uKVwBkWweqr0_lDBWRMQ_mFQ/viewform"><button>Subir
                        Batalla</button></a>

            </div>
            <div class="subirBatalla">
                <p>El form se hará disponible el 08/06/2024 cuando comience el torneo!</p>

            </div>
        </main>
        <div>
            <div id="band" class="container text-center">

                <div>
                    <div>
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">
                            <p class="desplegable">Reglas del torneo</p>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">El Torneo Rufián 2024 -
                                    The Return of The Golden Cow se configura como una instancia de competencia entre
                                    jugadores de las alianzas RufianesLatinos [-RL-], Rufián d ikario [Rdel] y de todas
                                    las alianzas afines a las mencionadas antes, en el mundo Alpha, servidor .es,
                                    Ikariam. Cabe destacar que la competencia no requiere que los participantes luchen
                                    entre sí. </span><span style="color:rgb(33, 33, 33);"><strong>No fomentaremos la
                                        lucha entre jugadores de alianzas aliadas</strong></span><span
                                    style="color:rgb(33, 33, 33);">.</span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">La competencia se
                                    llevará a cabo en el intervalo comprendido entre las 0:00 h del 08/06/2024 y las
                                    23:59 h del 07/08/2021 inclusive (hora servidor). Se realizará en base a los
                                    siguientes criterios: número de batallas ganadas, monto total en diferencia de
                                    generales perdidos, una mezcla entre las dos anteriores, número de batallas
                                    participadas, cantidad de generales destruidos y las ligas menores. Se informará de
                                    manera oportuna si se evaluará la incorporación de otros indicadores. La competencia
                                    clasificará a los participantes en un número de rankings iguales al número de
                                    criterios a considerar.</span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Para cada criterio se
                                    definirá un indicador que cuantificará el desempeño de cada jugador. Debido a la
                                    falta de funcionalidades internas en el juego para mostrar el desempeño de cada
                                    jugador, </span><span style="color:rgb(33, 33, 33);"><strong>se requiere cada
                                        participante reporte manualmente los datos solicitados</strong></span><span
                                    style="color:rgb(33, 33, 33);"> utilizando el formulario provisto en esta
                                    competencia. A continuación se enuncian los lineamientos generales a tener en
                                    cuenta.</span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Respecto a los
                                    participantes:</span></p>
                            <ul>
                                <li>Cada jugador que desee participar deberá formar parte de la alianza RufianesLatinos
                                    [-RL-], Rufián d ikario [Rdel] o de alianzas afines. No existen límites en los
                                    puntos totales de su cuenta.</li>
                            </ul>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Respecto al sistema de
                                    puntuación del torneo:</span></p>
                            <ul>
                                <li>Todos los jugadores se evaluarán de la misma manera, cuantificando su desempeño como
                                    guerrero de acuerdo a los siguientes criterios definidos de manera cualitativa:</li>
                                <ul>
                                    <li><em>Número de batallas ganadas</em>: contabiliza únicamente las batallas que se
                                        hayan indicado como victoriosas, ignorándose la diferencia de generales de la
                                        batalla.</li>
                                    <li><em>Monto total en diferencia de generales perdidos</em>: para cada
                                        participante, en función de las batallas que haya reportado, se determinará el
                                        total de puntos generales perdidos por éste (o el bando en el que participó en
                                        cada batalla) y los puntos generales perdidos por los contrincantes. Luego se
                                        realizará la diferencia entre estos montos. Cuanto mayor la diferencia a favor
                                        del participante, mejor será su desempeño respecto a este indicador.</li>
                                    <li><em>Clasificación general:</em> se consigue un punto cada 1k generales de
                                        diferencia en <em>Monto total en diferencia de generales perdidos y 3 puntos por
                                            cada punto en Número de batallas ganadas</em>:</li>
                                    <li><em>Ligas Menores: </em>igual a la modalidad anterior pero solo clasificaron
                                        jugadores con menos de 5 millones de puntos totales al empezar la competición
                                    </li>
                                    <li>Cantidad de Generales Destruidos: se determinará el total de generales
                                        destruidos a lo largo de la competición</li>
                                    <li>Número de batallas participadas: se determinará la cantidad de batallas en las
                                        que cada jugador participe</li>
                                </ul>
                                <li>Cada jugador recibirá una puntuación en relación a cada criterio contemplado. Se
                                    generará un listado ordenado de forma decreciente en puntuación de los jugadores
                                    respecto a cada criterio considerado.</li>
                                <li>Los valores de puntuación de cada participante podrá conocerse en forma parcial
                                    durante la realización del torneo y en forma definitiva al finalizar el mismo.</li>
                            </ul>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Respecto al registro de
                                    batallas:</span></p>
                            <ul>
                                <li>Cada reporte de batalla demanda completar: el participante, los puntos generales
                                    totales perdidos por el participante o sus aliados, los puntos generales perdidos
                                    por los rivales en la batalla y el el tipo de reporte (pérdida o victoria). No
                                    informar alguno de estos datos invalidará el reporte de esa batalla. De igual modo
                                    ocurrirá si se falsean los datos provistos.</li>
                                <li>Para que una batalla sea contabilizada en el torneo deberá ser registrada utilizando
                                    <a target="_blank" href="https://forms.gle/LidzBUZuQj7js7Cf6"><span
                                            style="color:rgb(17, 85, 204);">este formulario</span></a>. No se
                                    contabilizarán batallas que no hayan sido registradas por ese medio.
                                </li>
                                <li>Cada batalla registrada deberá iniciar y concluir en el intervalo comprendido entre
                                    las 0:00 h del 08/06/2024 y las 23:59 h del 07/08/2021 inclusive (hora servidor).
                                </li>
                                <li>La batalla que reporte un participante puede ser individual o grupal.</li>
                                <li>Una batalla válida para el torneo es aquella llevada a cabo contra jugadores
                                    "activos". Las batallas contra jugadores inactivos del servidor quedarán descartadas
                                    de la competencia.</li>
                                <li>La batalla deberá implicar un total de al menos 5000 puntos generales perdidos entre
                                    los dos bandos que se enfrentarán. No se contabilizarán batallas de menor tamaño.
                                </li>
                                <li>En el caso de una batalla grupal, es menester que cada jugador participante
                                    interesado en contabilizarla para su puntaje realice el registro de la batalla.</li>
                                <li>En una batalla grupal pueden participar, como aliados, jugadores de otras alianzas.
                                </li>
                                <li>No es relevante el número de unidades que tuviera en batalla el participante.</li>
                                <li>Deberá informarse únicamente el reporte de batalla concluida. No se considerarán
                                    válidos reportes de batallas sin concluir.</li>
                                <li>A efectos de realizar una validación final del registro efectuado, se solicita que
                                    el participante copie y pegue el reporte de acuerdo al convertidor de batallas del
                                    juego, o en su defecto, el link de la batalla subida al foro oficial de Ikariam.
                                    Para ello tendrá un espacio bien delimitado en <a target="_blank"
                                        href="https://forms.gle/LidzBUZuQj7js7Cf6"><span
                                            style="color:rgb(17, 85, 204);">el formulario</span></a>.</li>
                                <li>Actualización (01/10/2021): A partir de la fecha 01/10/21, no se contabilizarán las
                                    batallas que disputen los participantes contra jugadores que no formen parte de
                                    alguna alianza.</li>
                            </ul>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Respecto de los
                                    premios:</span></p>
                            <ul>
                                <li>Los participantes que al finalizar la competencia ocupen posiciones de premio de
                                    cada ranking serán valerosamente reconocidos como grandes leyendas e inmortalizados
                                    sus nicks como ganadores de la competencia.</li>
                                <li>Si un jugador resultara victorioso en más de una categoría, tendrá que elegir uno de
                                    los premios</li>
                                <li>Los jugadores que posean, al momento de iniciar la competencia, una cuenta con menos
                                    de 5.000.000 puntos totales participarán también de un ranking especial exclusivo y
                                    separado del resto de los jugadores, Las Ligas Menores.&nbsp;</li>
                                <li>Los ganadores de la <em>Clasificación General, Monto de Diferencia por Pérdida de
                                        Generales y Cantidad de Batallas Ganadas </em>recibirán como premio un cupón de
                                    10 euros, los segundos y terceros puestos recibirán 3m de recursos.</li>
                            </ul>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">En cuanto a las ligas
                                    menores se entregará lo siguiente:</span></p>
                            <ul>
                                <li><span style="color:rgb(0, 0, 0);">Primer lugar: 5m de recursos</span></li>
                                <li>Segundo lugar: 4m de recursos</li>
                                <li>Tercer lugar: 3m de recursos</li>
                                <li>Cuarto lugar: 2m de recursos</li>
                                <li>Quinto lugar: 1m de recursos</li>
                            </ul>
                            <ul>
                                <li>Sponsors para reparto de premios de recursos <span
                                        style="text-decoration:underline;">al finalizar el torneo</span>: Liluchi22,
                                    Celi-SyN, McLaren, The Kingslayer, Sir Muuu, Calito, -TRANQUILASO-. Cabe aclarar que
                                    la entrega de los bienes será gradual debido a la disponibilidad limitada de barcos
                                    mercantes y los tiempos de viaje, dependientes de las ubicaciones de las ciudades de
                                    quienes resulten favorecidos.</li>
                            </ul>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Que tengan buena caza!!
                                    A divertirse.</span></p>
                            <!--Texto de las reglas-->
                        </div>
                    </div>

                    <div>
                        <a data-toggle="collapse" href="#collapseExample2" aria-expanded="false"
                            aria-controls="collapseExample2">
                            <p class="desplegable">Preguntas frecuentes</p>
                        </a>
                        <div class="collapse" id="collapseExample2">
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);"><strong>¿Cuántos puntos
                                        representa una batalla?</strong></span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Una batalla no se
                                    contabiliza una única vez, puede ser considerada en todos los rankings del torneo.
                                    Así, si se trata de una batalla en la que el participante ganó, suma 1 punto en el
                                    ranking de "Número de batallas ganadas". La diferencia de generales obtenida por el
                                    participante para el ranking de "Monto total en diferencia de generales perdidos".
                                    Se aplicará la fórmula pertinente para aplicar los puntos para la </span><span
                                    style="color:rgb(33, 33, 33);"><em>Clasificación General. </em></span><span
                                    style="color:rgb(33, 33, 33);">Todos los generales destruidos contarán para la
                                    clasificación </span><span style="color:rgb(33, 33, 33);"><em>Cantidad de Generales
                                        Destruidos. </em></span><span style="color:rgb(33, 33, 33);">Si el jugador tiene
                                    menos de 5.000.000 de puntos totales la batalla contará para la clasificación
                                </span><span style="color:rgb(33, 33, 33);"><em>Ligas Menores </em></span><span
                                    style="color:rgb(33, 33, 33);">de igual manera a la </span><span
                                    style="color:rgb(33, 33, 33);"><em>Clasificación General</em></span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);"><strong>¿Podrías
                                        brindarme un ejemplo de cómo se contabiliza la batalla?</strong></span></p>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Suponte el siguiente
                                    registro de batalla:</span></p>
                            <div class="batalla">
                                <p><span style="color:rgb(33, 33, 33);">Batalla marítima frente a Polis</span></p>
                                <p><span style="color:rgb(33, 33, 33);">(02.07.2021 2:30:46)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Participante1[-R-] de Ciudad</span></p>
                                <p><span style="color:rgb(33, 33, 33);">vs</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Rival[GRANJA] de Polis</span></p>
                                <p><span
                                        style="color:rgb(33, 33, 33);">---------------------------------------------------------------------------------------------</span>
                                </p>
                                <p><span style="color:rgb(33, 33, 33);">Barco-espolón........................364(-36) -
                                        Barco-espolón.......................3290(-72)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Barco lanza-llamas...................26(-102) -
                                        Barco lanza-llamas..................241(-206)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Barco-mortero..........................84(-0) -
                                        Barco-mortero.........................400(-0)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Barco-espolón de vapor................160(-0) -
                                        Barco-espolón de vapor...............1500(-0)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">............................................. -
                                        Barco lanzamisiles...................931(-24)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Lancha de palas.......................200(-0) -
                                        Lancha de palas......................609(-64)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Barco de mantenimiento.................10(-0) -
                                        Barco de mantenimiento................100(-0)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Submarino..............................75(-0) -
                                        Submarino..............................10(-0)</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Barco-catapulta........................42(-0) -
                                        .............................................</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Portaglobos...........................110(-0) -
                                        .............................................</span></p>
                                <p><span
                                        style="color:rgb(33, 33, 33);">---------------------------------------------------------------------------------------------</span>
                                </p>
                                <p><span style="color:rgb(33, 33, 33);">Generales..............................-812.4 -
                                        Generales.............................-2718.8</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Puntos ofensivos.........................6797 -
                                        Puntos de defensa........................2031</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Daño recibido...........................40620 -
                                        Daño
                                        recibido..........................135940</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Porcentaje de daño........................23% -
                                        Porcentaje de daño........................77%</span></p>
                                <p><span
                                        style="color:rgb(33, 33, 33);">---------------------------------------------------------------------------------------------</span>
                                </p>
                                <p><span style="color:rgb(33, 33, 33);">Ganador: Participante1[-R-]</span></p>
                                <p><span style="color:rgb(33, 33, 33);">Perdedor: Rival[GRANJA]</span></p>
                            </div>
                            <p style="text-align:justify;"><span style="color:rgb(33, 33, 33);">Cuando el Participante1
                                    registre esa batalla:</span></p>
                            <ul>
                                <li>Sumará 1 punto para el ranking "Número de batallas ganadas".</li>
                                <li>Sumará 1906.4 puntos (2718.8 - 812.4) para el ranking "Monto total en diferencia de
                                    generales perdidos".</li>
                                <li>Sumará 4 puntos en la <em>Clasificación General </em>(1 por la diferencia en
                                    generales perdidos y 3 por la batalla ganada)</li>
                                <li>Sumará 2718.8 puntos en la clasificación de <em>Generales Destruidos</em></li>
                                <li>Sumará 1 punto en la clasificación <em>Batallas Participadas</em></li>
                                <li>Si Participante1 tiene menos de 5.000.000 de puntos totales sumará 4 puntos ( de
                                    igual manera que en la <em>Clasificación General) </em>en la clasificación <em>Ligas
                                        Menores</em></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>






            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
                integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
                integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
                crossorigin="anonymous"></script>

</body>
</div>
</div>
<script>
document.getElementById('rankingSelect').addEventListener('change', function(event) {
    let ranking = document.getElementById('rankingSelect').value;
    let menores = false;
    if (ranking == "8") {
        menores = true;
        ranking = "7";
    }
    fetchSheetData(ranking, ranking, menores)
});


addEventListener("DOMContentLoaded", (event) => {
    let ranking = document.getElementById('rankingSelect').value;
    let menores = false;
    if (ranking == "8") {
        menores = true;
        ranking = "7";
    }
    fetchSheetData(ranking, ranking, menores)
});


function extractJSON(text) {
    const startIndex = text.indexOf('{');
    const endIndex = text.lastIndexOf('}');
    const jsonString = text.substring(startIndex, endIndex + 1);
    return JSON.parse(jsonString);
}

async function fetchSheetData(columnIndexToDisplay, columnIndexToSort, menores) {
    const sheetURL =
        'https://docs.google.com/spreadsheets/d/1dkQhXsdJ-hXLgDT8eby-G1zLjpaXHLnir-TeKBnPUcc/gviz/tq'; // Replace with the URL of your text response
    try {
        const response = await fetch(sheetURL);
        const text = await response.text();
        const jsonData = extractJSON(text);
        displaySheetData(jsonData, columnIndexToDisplay, columnIndexToSort, menores);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

async function fetchMenores() {
    const sheetURL =
        'https://docs.google.com/spreadsheets/d/1-XoZo3js-SQkMb-xnYtLmo1ppppss0NN_1uJduG7MDg/gviz/tq'; // Replace with the URL of your text response
    try {
        const response = await fetch(sheetURL);
        const text = await response.text();
        const jsonData = extractJSON(text);
        let a = [];
        jsonData.table.rows.forEach(row => {
            a.push(row.c[0].v);
        });
        return a;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

async function displaySheetData(data, columnIndexToDisplay, columnIndexToSort, menores) {

    let html = '<table border="1"><tr>';
    // Include headers for position, first, and the specified column
    html += '<th>Posición</th>';
    html += `<th>Jugador</th>`;
    html += `<th>Puntos</th>`;
    html += '</tr>';

    // Sort the rows based on the specified column in descending order
    data.table.rows.sort((a, b) => {
        const valueA = a.c[columnIndexToSort - 1].v;
        const valueB = b.c[columnIndexToSort - 1].v;
        return valueB < valueA ? -1 : (valueB > valueA ? 1 : 0);
    });

    let playersList = await fetchMenores();
    console.log(playersList)

    let filteredRows = data.table.rows;
    if (menores) {
        filteredRows = filteredRows.filter(row => playersList.includes(row.c[0].v));
    }


    // Loop through sorted rows and generate table HTML
    filteredRows.forEach((row, index) => {
        html += '<tr>';
        // Include position, data for the first, and the specified column
        html += `<td>${index + 1}</td>`;
        html += `<td>${row.c[0].v}</td>`;
        html += `<td>${row.c[columnIndexToDisplay - 1].v}</td>`;
        html += '</tr>';
    });

    html += '</table>';
    let sheetDataElement = document.getElementById('divTabla');
    if (!sheetDataElement) {
        sheetDataElement = document.createElement("div");
        sheetDataElement.id = "sheetData";
        sheetDataElement.innerHTML = html;
        document.getElementsByClassName("subirBatalla")[0].appendChild(sheetDataElement);
    } else {
        sheetDataElement.innerHTML = html;
    }
    var selectElement = document.getElementById('rankingSelect');

    // Obtener el texto de la opción seleccionada
    var selectedOptionText = selectElement.options[selectElement.selectedIndex].text;

    // Asignar el texto de la opción seleccionada al elemento con ID 'rankingTitle'
    document.getElementById("rankingTitle").innerText = selectedOptionText;

}
</script>
</body>

</html>