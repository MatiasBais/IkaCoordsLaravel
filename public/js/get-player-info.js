document.addEventListener("DOMContentLoaded", function () {
    const playerData = document.getElementById("player-data");
    const server = playerData.getAttribute("data-server");
    const playerId = playerData.getAttribute("data-player-id");
    const apiUrl = `/api/getPlayerInfo?idPlayer=${playerId}&servidor=${server}`;

    fetch(apiUrl)
        .then((response) => response.json())
        .then((playerInfo) => {
            // Actualizar los datos del jugador
            document.getElementById("player-name").textContent =
                playerInfo.nombre;
            document.getElementById("alianzalink").textContent =
                playerInfo.alianza.nombre;
            var link = document.getElementById("alianzalink");
            link.setAttribute(
                "href",
                "/alianza/" +
                    playerInfo.alianza.server +
                    "/" +
                    playerInfo.alianza.idalianza
            );
            document.getElementById("totales").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Totales.toLocaleString("en-US");
            document.getElementById("constructor").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Constructor.toLocaleString("en-US");
            document.getElementById("nivelConstruccion").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].NivelConstruccion.toLocaleString("en-US");
            document.getElementById("investigadores").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Investigadores.toLocaleString("en-US");
            document.getElementById("nivelInvestigadores").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].NivelInvestigadores.toLocaleString("en-US");
            document.getElementById("generales").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Generales.toLocaleString("en-US");
            document.getElementById("oro").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Oro.toLocaleString("en-US");
            document.getElementById("donacion").textContent =
                playerInfo.puntos[
                    playerInfo.puntos.length - 1
                ].Donacion.toLocaleString("en-US");

            // Actualizar la tabla de ciudades
            const citiesTable = document.getElementById("cities-table");
            playerInfo.cities.forEach((ciudad) => {
                const row = citiesTable.insertRow();
                row.innerHTML = `
                    <td>${ciudad.nombre}</td>
                    <td>${ciudad.nivel}</td>
                    <td><a href="/isla/${ciudad.isla.server}/${
                    ciudad.isla.idisla
                }">${ciudad.isla.x}:${ciudad.isla.y}</a></td>
                    <td>${
                        ciudad.isla.good === "1"
                            ? "Vino"
                            : ciudad.isla.good === "2"
                            ? "Mármol"
                            : ciudad.isla.good === "3"
                            ? "Cristal"
                            : "Azufre"
                    }</td>
                    <td>${ciudad.isla.goodlv}</td>
                    <td>${ciudad.isla.woodlv}</td>
                    <td>${ciudad.isla.wonderName} (${ciudad.isla.wonderlv})</td>
                `;
            });

            // Actualizar la tabla de puntos
            const pointsTable = document.getElementById("points-table");
            playerInfo.puntos.reverse().forEach((punto) => {
                const row = pointsTable.insertRow();
                row.innerHTML = `
                    <td>${punto.Totales.toLocaleString("en-US")}</td>
                    <td>${punto.Constructor.toLocaleString("en-US")}</td>
                    <td>${punto.NivelConstruccion.toLocaleString("en-US")}</td>
                    <td>${punto.Investigadores.toLocaleString("en-US")}</td>
                    <td>${punto.NivelInvestigadores.toLocaleString(
                        "en-US"
                    )}</td>
                    <td>${punto.Generales.toLocaleString("en-US")}</td>
                    <td>${punto.Oro.toLocaleString("en-US")}</td>
                    <td>${punto.Donacion.toLocaleString("en-US")}</td>
                `;
            });
        });

    const headerCells = document.querySelectorAll(".header-cell");

    // Loop through each header cell
    headerCells.forEach((headerCell) => {
        // Get the column index of the current header cell
        const columnIndex = headerCell.cellIndex;

        // Get all data cells in the same column
        const dataCells = document.querySelectorAll(
            `#player-table td:nth-child(${columnIndex + 1})`
        );

        // Find the maximum width among all cells in the column
        let maxWidth = 0;
        dataCells.forEach((dataCell) => {
            const cellWidth = dataCell.offsetWidth;
            if (cellWidth > maxWidth) {
                maxWidth = cellWidth;
            }
        });

        // Set the width of all cells in the column to the maximum width
        headerCell.style.width = `${maxWidth}px`;
        dataCells.forEach((dataCell) => {
            dataCell.style.width = `${maxWidth}px`;
        });
    });
});
