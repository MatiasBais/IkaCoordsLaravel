async function filterIslands() {
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

    const goodlvStart = document.getElementById("goodlvStart").value;
    const goodlvEnd = document.getElementById("goodlvEnd").value;
    const woodlvStart = document.getElementById("woodlvStart").value;
    const woodlvEnd = document.getElementById("woodlvEnd").value;
    const specificGood = document.getElementById("specificGood").value;
    const xRangeStart = document.getElementById("xRangeStart").value;
    const xRangeEnd = document.getElementById("xRangeEnd").value;
    const yRangeStart = document.getElementById("yRangeStart").value;
    const yRangeEnd = document.getElementById("yRangeEnd").value;
    const server = document.getElementById("server").value;

    const apiUrl = "/api/filter-islands";
    const queryParams = new URLSearchParams({
        goodlvStart: goodlvStart,
        goodlvEnd: goodlvEnd,
        woodlvStart: woodlvStart,
        woodlvEnd: woodlvEnd,
        specificGood: specificGood,
        xRangeStart: xRangeStart,
        xRangeEnd: xRangeEnd,
        yRangeStart: yRangeStart,
        yRangeEnd: yRangeEnd,
        servidor: server,
    });

    const url = `${apiUrl}?${queryParams.toString()}`;
    try {
        const response = await fetch(url);
        const islands = await response.json();

        // Display the filtered islands
        displayIslands(islands);
    } catch (error) {
        console.error("Error fetching filtered islands:", error);
    }
}

function displayIslands(islands) {
    const resultContainer = document.getElementById("resultContainer");
    resultContainer.innerHTML = "";
    console.log(islands);
    if (islands.length === 0) {
        resultContainer.innerHTML = "<p>No islands found.</p>";
        return;
    }

    const table = document.createElement("table");
    table.innerHTML = `
    <tr>
        <th>Mina</th>
        <th>Aserradero</th>
        <th>Recurso</th>
        <th>Coordenadas</th>
        <th>Maravilla</th>
    </tr>
`;

    islands.forEach((island) => {
        const row = document.createElement("tr");
        row.innerHTML = `
        <td>${island.goodlv}</td>
        <td>${island.woodlv}</td>
        <td>${
            island.good === "1"
                ? "Vino"
                : island.good === "2"
                ? "Mármol"
                : island.good === "3"
                ? "Cristal"
                : "Azufre"
        }</td>
        <td><a href="/isla/${island.server}/${island.idisla}">${
            island.x + ":" + island.y
        }</a></td>
        <td>${island.wonderName} (${island.wonderlv})</td>
    `;
        table.appendChild(row);
    });

    resultContainer.appendChild(table);
}
