<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rankings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header,
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #007BFF;
            color: #fff;
        }

        header h1,
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
            margin-right: 10px;
        }

        button {
            padding: 5px 10px;
            font-size: 16px;
            background-color: #007BFF;
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
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Torneo Rufián</h1>
        </header>
        <main>
            <section class="ranking-selection">
                <h3>Selecciona una Clasificación: </h3>
                <select name="ranking" id="rankingSelect" class="rankingSelect">
                    <option value="7">General</option>
                    <option value="6">Por Diferencia de Generales</option>
                    <option value="4">Por Batallas Ganadas</option>
                    <option value="2">Por Generales Destruidos</option>
                    <option value="5">Por Batallas Participadas</option>
                    <option value="8">Ligas Menores</option>
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
        </main>
        <div class="subirBatalla">
            <a target="_blank"
                href="https://docs.google.com/forms/d/e/1FAIpQLSfL_ZziGh4-_mebrJUjcbc0t5uKVwBkWweqr0_lDBWRMQ_mFQ/viewform"><button>Subir
                    Batalla</button></a>
        </div>
        <footer>
            <p>&copy; 2024 Torneo Rufián</p>
            <p><a target="_blank"
                    href="https://docs.google.com/document/d/1rnCDY7pu3tKruk09sm6Lsdu7-d0180IZVNUOo47SioE/edit?usp=sharing">Reglas</a>
            </p>
        </footer>
    </div>
    <script>
        document.getElementById('rankingSelect').addEventListener('change', function (event) {
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