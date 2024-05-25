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

        form {
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
                <h2>Selecciona una Clasificación</h2>
                <form id="rankingForm">
                    <select name="ranking" id="rankingSelect">
                        <option value="ambas">General</option>
                        <option value="porpuntos">Por Generales Destruidos</option>
                        <option value="verdes">Por Batallas Ganadas</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button type="submit">Mostrar Ranking</button>
                </form>
            </section>
            <section class="ranking-display">
                <h2 id="rankingTitle"></h2>
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
                    href="https://docs.google.com/document/d/1rnCDY7pu3tKruk09sm6Lsdu7-d0180IZVNUOo47SioE/edit?usp=sharing">TyC</a>
            </p>
        </footer>
    </div>
    <script>
        document.getElementById('rankingForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const ranking = document.getElementById('rankingSelect').value;
            const apiUrl = `/api/torneo?ranking=${encodeURIComponent(ranking)}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        showErrorMessage(data.error);
                    } else {
                        displayRanking(data, ranking);
                    }
                })
                .catch(error => {
                    showErrorMessage('Failed to retrieve data. Error: ' + error.message);
                });
        });

        function displayRanking(data, ranking) {
            const rankingTitle = document.getElementById('rankingTitle');
            const rankingTable = document.getElementById('rankingTable');
            const tableBody = rankingTable.querySelector('tbody');
            const errorMessage = document.getElementById('errorMessage');

            ranking = `${ranking.charAt(0).toUpperCase() + ranking.slice(1)}`

            // Set the ranking title
            if (ranking == "Verdes")
                rankingTitle.textContent = "Por Batallas Ganadas";
            else if (ranking == "Ambas")
                rankingTitle.textContent = "General";
            else
                rankingTitle.textContent = "Por Generales Destruidos";

            // Clear previous table rows
            tableBody.innerHTML = '';
            let i = 1;
            // Populate table rows
            data.forEach(row => {
                const tr = document.createElement('tr');

                const tdPosition = document.createElement('td');
                tdPosition.textContent = i;
                tr.appendChild(tdPosition);

                const tdName = document.createElement('td');
                tdName.textContent = row.name;
                tr.appendChild(tdName);

                const tdPoints = document.createElement('td');
                tdPoints.textContent = row.points;
                tr.appendChild(tdPoints);

                tableBody.appendChild(tr);
                i++;
            });

            // Show the table and hide the error message
            rankingTable.style.display = 'table';
            errorMessage.style.display = 'none';
        }

        addEventListener("DOMContentLoaded", (event) => {
            const ranking = document.getElementById('rankingSelect').value;
            const apiUrl = `/api/torneo?ranking=${encodeURIComponent(ranking)}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        showErrorMessage(data.error);
                    } else {
                        displayRanking(data, ranking);
                    }
                })
                .catch(error => {
                    showErrorMessage('Failed to retrieve data. Error: ' + error.message);
                });
        });

        function showErrorMessage(message) {
            const errorMessage = document.getElementById('errorMessage');
            const rankingTable = document.getElementById('rankingTable');

            // Set the error message
            errorMessage.textContent = message;

            // Hide the table and show the error message
            rankingTable.style.display = 'none';
            errorMessage.style.display = 'block';
        }
    </script>
</body>

</html>