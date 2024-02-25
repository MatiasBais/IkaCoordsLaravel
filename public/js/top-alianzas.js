async function populateDates() {
    try {
        const server = document.getElementById("server").value;

        // Fetch dates from your backend API with the server parameter
        const response = await fetch(`/api/fetch-dates?server=${server}`);
        const dates = await response.json();

        // Populate start date select
        const startDateSelect = document.getElementById("startDate");
        dates.forEach((date) => {
            const option = document.createElement("option");
            option.value = date.numero;
            option.text = new Date(date.fecha).toLocaleDateString("en-GB"); // Assuming 'fecha' is the field containing the date
            startDateSelect.appendChild(option);
        });

        // Populate end date select
        const endDateSelect = document.getElementById("endDate");
        dates.forEach((date, index) => {
            const option = new Option(
                new Date(date.fecha).toLocaleDateString("en-GB"),
                date.numero
            );
            endDateSelect.add(option);
            // Set last date as selected
            if (index === dates.length - 1) {
                endDateSelect.value = date.numero;
            }
        });
    } catch (error) {
        console.error("Error fetching dates:", error);
    }
}

// Call the function to populate dates when the page loads
document.addEventListener("DOMContentLoaded", () => {
    populateDates();
});

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

    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
    const server = document.getElementById("server").value;
    const pagina = document.getElementById("pagina").value;
    const clasificacion = document.getElementById("clasificacion").value;
    const apiUrl = "/api/point-increase-ranking-alliances";
    const queryParams = new URLSearchParams({
        startDate: startDate,
        endDate: endDate,
        server: server,
        clasificacion: clasificacion,
        pagina: pagina,
        order: 0,
    });

    const url = `${apiUrl}?${queryParams.toString()}`;
    try {
        const response = await fetch(url);
        const rankingData = await response.json();

        displayRanking(rankingData, server);
    } catch (error) {
        console.error("Error fetching point increase ranking:", error);
    }
}

function displayRanking(rankingData, server) {
    const resultContainer = document.getElementById("resultContainer");
    resultContainer.innerHTML = "";

    if (rankingData.length === 0) {
        resultContainer.innerHTML = "<p>No alliances found.</p>";
        return;
    }

    const table = document.createElement("table");
    table.innerHTML = `
    <tr>
        <th>Nombre</th>
        <th>Puntos</th>
        <th>Diferencia</th>
    </tr>
`;

    rankingData.forEach((alianza) => {
        const row = document.createElement("tr");
        row.innerHTML = `
        <td>${
            alianza
                ? '<a href="/alianza/' +
                  server +
                  "/" +
                  alianza.idalianza +
                  '">' +
                  alianza.nombre +
                  "</a>"
                : "-"
        }</td>
        <td>${(+alianza.bPuntos).toLocaleString("en-US")}</td>
        <td>${(alianza.bPuntos - alianza.aPuntos).toLocaleString("en-US")}</td>
    `;
        table.appendChild(row);
    });

    resultContainer.appendChild(table);
}
