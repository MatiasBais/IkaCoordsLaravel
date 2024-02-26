window.onload = async function () {
    try {
        const allianceData = document.getElementById("alliance-data");
        const server = allianceData.getAttribute("data-server");
        const idalianza = allianceData.getAttribute("data-alianza-id");
        const response = await fetch(
            "/api/getAlianzaInfo?servidor=" + server + "&idAlianza=" + idalianza
        ); // Assuming the route to fetch alliance data is '/api/alianza'
        const alianza = await response.json();

        // Populate alliance table
        let totales = 0;
        let constructor = 0;
        let investigadores = 0;
        let generales = 0;
        let oro = 0;

        alianza.players.forEach((player) => {
            try {
                totales += player.puntos[0].Totales;
                constructor += player.puntos[0].Constructor;
                investigadores += player.puntos[0].Investigadores;
                generales += player.puntos[0].Generales;
                oro += player.puntos[0].Oro;
            } catch {}
        });

        // Populate alliance table
        document.getElementById("alianza-nombre").innerText = alianza.nombre;
        document.getElementById("alianza-totales").innerText =
            totales.toLocaleString("en-US");
        document.getElementById("alianza-constructor").innerText =
            constructor.toLocaleString("en-US");
        document.getElementById("alianza-investigadores").innerText =
            investigadores.toLocaleString("en-US");
        document.getElementById("alianza-generales").innerText =
            generales.toLocaleString("en-US");
        document.getElementById("alianza-oro").innerText =
            oro.toLocaleString("en-US");

        // Populate players table
        const jugadoresTable = document.getElementById("jugadores-table");
        alianza.players.forEach((player) => {
            try {
                let a = player.puntos[0].Totales;

                const row = jugadoresTable.insertRow();
                const nombreCell = row.insertCell(0);
                const totalesCell = row.insertCell(1);
                const constructorCell = row.insertCell(2);
                const investigadoresCell = row.insertCell(3);
                const generalesCell = row.insertCell(4);
                const oroCell = row.insertCell(5);
                nombreCell.innerHTML = `<a href="/player/${player.server}/${player.idplayer}">${player.nombre}</a>`;
                totalesCell.innerText =
                    player.puntos[0].Totales.toLocaleString("en-US");
                constructorCell.innerText =
                    player.puntos[0].Constructor.toLocaleString("en-US");
                investigadoresCell.innerText =
                    player.puntos[0].Investigadores.toLocaleString("en-US");
                generalesCell.innerText =
                    player.puntos[0].Generales.toLocaleString("en-US");
                oroCell.innerText =
                    player.puntos[0].Oro.toLocaleString("en-US");
            } catch {}
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
            `#alianza-table td:nth-child(${columnIndex + 1})`
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
