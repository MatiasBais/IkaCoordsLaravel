async function filterPlayers() {
    const resultContainer = document.getElementById("playerResultContainer");
    const loadingImage = document.createElement("img");
    loadingImage.src = loadingImageUrl;
    loadingImage.alt = "Loading...";
    loadingImage.style.width = "50px"; // Ajustar el ancho de la imagen
    loadingImage.style.height = "50px"; // Ajustar la altura de la imagen
    loadingImage.style.display = "block"; // Hacer que la imagen sea un bloque para centrarla
    loadingImage.style.margin = "0 auto"; // Centrar la imagen horizontalmente
    loadingImage.style.marginTop = "20px"; // Agregar un margen superior para separarla del contenido
    resultContainer.innerHTML = "";
    resultContainer.appendChild(loadingImage);

    const playerName = document.getElementById("playerName").value;
    const allianceName = document.getElementById("allianceName").value;
    const minPoints = document.getElementById("minPoints").value;
    const maxPoints = document.getElementById("maxPoints").value;
    const server = document.getElementById("server").value;

    const apiUrl = "/api/filter-players";
    const queryParams = new URLSearchParams({
        playerName: playerName,
        allianceName: allianceName,
        minPoints: minPoints,
        maxPoints: maxPoints,
        server: server,
    });

    const url = `${apiUrl}?${queryParams.toString()}`;

    try {
        const response = await fetch(url);
        const players = await response.json();

        // Display the filtered players
        displayPlayers(players);
    } catch (error) {
        console.error("Error fetching filtered players:", error);
    }
}

function displayPlayers(players) {
    const resultContainer = document.getElementById("playerResultContainer");
    resultContainer.innerHTML = "";

    if (players.length === 0) {
        resultContainer.innerHTML = "<p>No players found.</p>";
        return;
    }

    const table = document.createElement("table");
    table.innerHTML = `
      <tr>
        <th>Jugador</th>
        <th>Alianza</th>
        <th>Puntos Totales</th>
        <th>Maestro Constructor</th>
        <th>Investigadores</th>
        <th>Generales</th>
        <th>Oro</th>
      </tr>
    `;

    players.forEach((player) => {
        const row = document.createElement("tr");
        row.innerHTML = `
      <td><a href="/player/${player.server}/${player.idplayer}">${
            player.Player
        }</a></td>
      <td><a href="/alianza/${player.server}/${player.idalianza}">${
            player.nombre ? player.nombre : "-"
        }</a></td>
        <td>${
            player.totales
                ? player.totales.toLocaleString("en-US")
                : "No disponible"
        }</td>
        <td>${
            player.constructor
                ? player.constructor.toLocaleString("en-US")
                : "No disponible"
        }</td>
        <td>${
            player.generales
                ? player.generales.toLocaleString("en-US")
                : "No disponible"
        }</td>
        <td>${
            player.investigadores
                ? player.investigadores.toLocaleString("en-US")
                : "No disponible"
        }</td>
        <td>${
            player.oro ? player.oro.toLocaleString("en-US") : "No disponible"
        }</td>
        `;
        table.appendChild(row);
    });

    resultContainer.appendChild(table);
}
