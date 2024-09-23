async function filterCities() {
    const resultContainer = document.getElementById("resultContainer");
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

    // Extract X Range
    const xRangeStart = document.getElementById("xRangeStart").value;
    const xRangeEnd = document.getElementById("xRangeEnd").value;

    // Extract Y Range
    const yRangeStart = document.getElementById("yRangeStart").value;
    const yRangeEnd = document.getElementById("yRangeEnd").value;

    const cityName = document.getElementById("cityName").value;

    const server = document.getElementById("server").value;

    const apiUrl = "/api/filter-cities";
    const queryParams = new URLSearchParams({
        allianceName: allianceName,
        xRangeStart: xRangeStart,
        xRangeEnd: xRangeEnd,
        yRangeStart: yRangeStart,
        yRangeEnd: yRangeEnd,
        cityName: cityName,
        servidor: server,
        playerName: playerName,
    });

    const url = `${apiUrl}?${queryParams.toString()}`;

    try {
        const response = await fetch(url);
        const cities = await response.json();

        resultContainer.removeChild(loadingImage);
        // Display the filtered cities
        displayCities(cities);
    } catch (error) {
        console.error("Error fetching filtered cities:", error);
    }
}

function displayCities(cities) {
    const resultContainer = document.getElementById("resultContainer");
    resultContainer.innerHTML = "";

    if (cities.length === 0) {
        resultContainer.innerHTML = "<p>No cities found.</p>";
        return;
    }

    const table = document.createElement("table");
    table.innerHTML = `
    <tr>
        <th>Ciudad</th>
        <th>Jugador</th>
        <th>Nivel</th>
        <th>Maravilla</th>
        <th>Alianza</th>
        <th>Coordenadas</th>
        <th>Recurso</th>
        <th>Puntos</th>
    </tr>
    `;

    cities.forEach((city) => {
        const row = document.createElement("tr");
        row.innerHTML = `
    <td>${city["Town-Name"]}</td>
    <td><a href="/player/${city.server}/${city.idplayer}">${city.Player
            }</a></td>
            <td>${city.TownLv}</td>
            <td>${city.Wonder + " (" + city.wonderlv + ")"}</td>
            <td>${city.Alliance ? '<a href="/alianza/' + city.server + '/' + city.idalianza + '">' + city.Alliance : "-"
            }</a></td>
            <td><a href="/isla/${city.server}/${city.idisla}">${city.x + ":" + city.y
            }</a></td>
            <td>${city.good == "1"
                ? "Vino"
                : city.good == "2"
                    ? "Mármol"
                    : city.good == "3"
                        ? "Cristal"
                        : "Azufre"
            }</td>
            <td>${city.Totales ? city.Totales.toLocaleString("en-US") : "-"
            }</td>
    `;
        table.appendChild(row);
    });

    resultContainer.appendChild(table);
}
