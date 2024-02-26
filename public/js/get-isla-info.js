window.onload = async function () {
    try {
        const islaData = document.getElementById("isla-data");
        const server = islaData.getAttribute("data-server");
        const idisla = islaData.getAttribute("data-isla-id");
        const response = await fetch(
            "/api/getIslaInfo?servidor=" + server + "&idIsla=" + idisla
        ); // Assuming the route to fetch island data is '/api/isla'
        const isla = await response.json();

        // Populate island table
        document.getElementById("isla-coordenadas").innerText =
            isla.x + ":" + isla.y;
        document.getElementById("isla-recurso").innerText =
            isla.good == "1"
                ? "Vino"
                : isla.good == "2"
                ? "Mármol"
                : isla.good == "3"
                ? "Cristal"
                : "Azufre";
        document.getElementById("isla-aserradero").innerText = isla.woodlv;
        document.getElementById("isla-mina").innerText = isla.goodlv;
        document.getElementById("isla-maravilla").innerText =
            isla.wonderName + " (" + isla.wonderlv + ")";

        // Populate cities table
        const ciudadesTable = document.getElementById("ciudades-table");
        isla.cities.forEach((ciudad) => {
            const row = ciudadesTable.insertRow();
            const nombreCell = row.insertCell(0);
            const jugadorCell = row.insertCell(1);
            const alianzaCell = row.insertCell(2);
            const nivelCell = row.insertCell(3);
            const puntosTotalesCell = row.insertCell(4);
            nombreCell.innerText = ciudad.nombre;
            jugadorCell.innerHTML = `<a href="/player/${ciudad.player.server}/${ciudad.player.idplayer}">${ciudad.player.nombre}</a>`;
            if (ciudad.player.alianza) {
                alianzaCell.innerHTML = `<a href="/alianza/${ciudad.player.alianza.server}/${ciudad.player.alianza.idalianza}">${ciudad.player.alianza.nombre}</a>`;
            } else {
                alianzaCell.innerText = "-";
            }
            nivelCell.innerText = ciudad.nivel;
            puntosTotalesCell.innerText =
                ciudad.player.puntos[0].Totales.toLocaleString("en-US");
        });
    } catch (error) {
        console.error(error);
        // Handle errors
    }

    const headerCells = document.querySelectorAll(".header-cell");

    // Loop through each header cell
    headerCells.forEach((headerCell) => {
        // Get the column index of the current header cell
        const columnIndex = headerCell.cellIndex;

        // Get all data cells in the same column
        const dataCells = document.querySelectorAll(
            `#isla-table td:nth-child(${columnIndex + 1})`
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
};
