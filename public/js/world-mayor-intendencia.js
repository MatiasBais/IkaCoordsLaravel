async function calculateRanking() {
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

    const pagina = document.getElementById("pagina").value;
    const apiUrl = "/api/cities/mayorNivelWorld";
    const queryParams = new URLSearchParams({
        pagina: pagina,
    });

    const url = `${apiUrl}?${queryParams.toString()}`;

    try {
        const response = await fetch(url);
        const rankingData = await response.json();

        displayRanking(rankingData);
    } catch (error) {
        console.error("Error fetching point increase ranking:", error);
    }
}

function displayRanking(rankingData) {
    const resultContainer = document.getElementById("resultContainer");
    resultContainer.innerHTML = "";

    if (rankingData.length === 0) {
        resultContainer.innerHTML = "<p>No players found.</p>";
        return;
    }
    console.log(rankingData);

    const table = document.createElement("table");
    table.innerHTML = `
        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Isla</th>
            <th>Jugador</th>
            <th>Alianza</th>
            <th>Server</th>
        </tr>
    `;

    rankingData.forEach((city) => {
        const row = document.createElement("tr");
        console.log(city)
        row.innerHTML = `
        <td>${city.ciudad}</a></td>
            <td>${city.nivel}</td>
            <td><a href="/isla/${city.server}/${city.islaid}">${city.x + ":" + city.y
            }</a></td>
            <td><a href="/player/${city.server}/${city.idplayer}">${city.nombre
            }</a></td>
            <td>${city.alianza
                ? '<a href="/alianza/' +
                city.server +
                "/" +
                city.idalianza +
                '">' +
                city.Alianza +
                "</a>"
                : "-"
            }</td>
            <td>${city.server}</td>
        `;
        table.appendChild(row);
    });

    resultContainer.appendChild(table);
}
