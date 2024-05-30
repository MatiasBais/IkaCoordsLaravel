@extends('layouts.app')

@section('content')
<style>
.mapa {
    display: flex;
    justify-content: center;
    align-items: center;
}

#imageContainer {
    position: relative;
    display: inline-block;
}

#imageContainer img {
    display: block;
}

#drawCanvas {
    position: absolute;
    top: 0;
    left: 0;
}

#controls {
    margin-left: 20px;
}

.checkbox-label {
    display: block;
    align-items: center;
    margin-bottom: 5px;
}

.color-square {
    width: 15px;
    height: 15px;
    margin-right: 5px;
    display: inline-block;
}

#coordinates {
    position: absolute;
    top: 0;
    left: 0;
    padding: 5px;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #ccc;
    border-radius: 5px;
    display: none;
}

.nombre-checkbox {
    width: unset;
    margin-bottom: 0px;
}
</style>
<div class="mapa">
    <div id="imageContainer">
        <img src="images/coords.png" id="backgroundImage" alt="Background Image">
        <canvas id="drawCanvas" width="674" height="674"></canvas>
        <div id="coordinates"></div>
    </div>
    <div id="controls">
        <label class="checkbox-label"><span class="color-square" style="background-color: green;"></span><input
                type="checkbox" class="nombre-checkbox" checked> <input id="input1" class="nombre-checkbox" type="text"
                width="100px"></label>
        <label class="checkbox-label"><span class="color-square" style="background-color: red;"></span><input
                type="checkbox" class="nombre-checkbox" checked> <input id="input2" class="nombre-checkbox" type="text"
                width="100px"></label>
        <label class="checkbox-label"><span class="color-square" style="background-color: orange;"></span><input
                type="checkbox" class="nombre-checkbox" checked> <input id="input3" class="nombre-checkbox" type="text"
                width="100px"></label>
        <label class="checkbox-label"><span class="color-square" style="background-color: blue;"></span><input
                type="checkbox" class="nombre-checkbox" checked> <input id="input4" class="nombre-checkbox" type="text"
                width="100px"></label>
        <label class="checkbox-label"><span class="color-square" style="background-color: yellow;"></span><input
                type="checkbox" class="nombre-checkbox" checked> <input id="input5" class="nombre-checkbox" type="text"
                width="100px"></label>
        <button id="buttonCargar">Cargar</button>
    </div>
</div>
<script>
let button = document.getElementById("buttonCargar");
button.addEventListener('click', async () => {
    const imageContainer = document.getElementById('imageContainer');
    const backgroundImage = document.getElementById('backgroundImage');
    const drawCanvas = document.getElementById('drawCanvas');
    const checkboxes = document.querySelectorAll('.nombre-checkbox');
    const coordinatesDisplay = document.getElementById('coordinates');

    let a1 = document.getElementById("input1").value.toLowerCase();
    let a2 = document.getElementById("input2").value.toLowerCase();
    let a3 = document.getElementById("input3").value.toLowerCase();
    let a4 = document.getElementById("input4").value.toLowerCase();
    let a5 = document.getElementById("input5").value.toLowerCase();
    let server = document.getElementById("server").value;

    const data = await fetchData();
    // Ensure the canvas matches the size of the image
    drawCanvas.width = 674;
    drawCanvas.height = 674;

    const ctx = drawCanvas.getContext('2d');

    function getColorByNombre(nombre) {
        switch (nombre.toLowerCase()) {
            case a1:
                return 'green';
            case a2:
                return 'red';
            case a3:
                return 'orange';
            case a4:
                return 'blue';
            case a5:
                return 'yellow';
            case 'more':
                return 'black';
            default:
                return 'gray'; // Default color for any unknown nombre
        }
    }

    imageContainer.addEventListener('mousemove', (event) => {
        let selectedNombres = getSelectedNombres();
        const rect = backgroundImage.getBoundingClientRect();
        const x = Math.floor((event.clientX - rect.left) / (rect.right - rect.left) *
            backgroundImage.naturalWidth);
        const y = Math.floor((event.clientY - rect.top) / (rect.bottom - rect.top) *
            backgroundImage.naturalHeight);
        let cx = Math.floor((x - 31) / 6);
        let cy = Math.floor((y - 31) / 6);
        let text = `X: ${cx}, Y: ${cy}`;

        let a = 0;
        data.forEach(coord => {
            if (coord.x == cx.toString() && coord.y == cy.toString()) {
                a = 1;
            }

        })
        if (a == 0) {
            coordinatesDisplay.style.display = 'none';
            return;
        }
        data.forEach(coord => {
            if (coord.x == cx.toString() && coord.y == cy.toString()) {
                if (selectedNombres.has(coord.nombre.toLowerCase())) {
                    text += `<br> ${coord.nombre}: ${coord.cant}`;
                }
            }
        })

        coordinatesDisplay.innerHTML = text;

        coordinatesDisplay.style.display = 'block';
        coordinatesDisplay.style.left = `${x}px`;
        coordinatesDisplay.style.top = `${y}px`;

    });

    imageContainer.addEventListener('mouseleave', () => {
        coordinatesDisplay.style.display = 'none';
    });

    imageContainer.addEventListener('click', () => {
        const rect = backgroundImage.getBoundingClientRect();
        const x = Math.floor((event.clientX - rect.left) / (rect.right - rect.left) *
            backgroundImage.naturalWidth);
        const y = Math.floor((event.clientY - rect.top) / (rect.bottom - rect.top) *
            backgroundImage.naturalHeight);
        let cx = Math.floor((x - 31) / 6);
        let cy = Math.floor((y - 31) / 6);
        let text = `X: ${cx}, Y: ${cy}`;

        data.forEach(coord => {
            if (coord.x == cx.toString() && coord.y == cy.toString()) {
                window.open("/isla/Alpha/" + coord.islaid, '_blank');
            }
        })
    });

    // Function to draw a square at the specified position
    function drawSquare(x, y, nombre) {
        const squareSize = 5; // Size of the square
        ctx.fillStyle = getColorByNombre(nombre);
        ctx.fillRect(x, y, squareSize, squareSize);
    }

    async function fetchData() {
        try {
            const params = new URLSearchParams();
            params.append('a1', a1);
            params.append('a2', a2);
            if (a3 != '') params.append('a3', a3);
            if (a4 != '') params.append('a4', a4);
            if (a5 != '') params.append('a5', a5);
            params.append('server', server);

            // Make the fetch request with query parameters
            const response = await fetch(`/api/mapa?${params.toString()}`);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching data:', error);
            return [];
        }
    }

    // Function to check which nombres are selected
    function getSelectedNombres() {
        const selectedNombres = new Set();
        if (checkboxes[0].checked) {
            selectedNombres.add(a1);
        }
        if (checkboxes[2].checked) {
            selectedNombres.add(a2);
        }
        if (checkboxes[4].checked) {
            selectedNombres.add(a3);
        }
        if (checkboxes[6].checked) {
            selectedNombres.add(a4);
        }
        if (checkboxes[8].checked) {
            selectedNombres.add(a5);
        }
        return selectedNombres;
    }
    // Function to draw all squares based on the selected nombres
    async function drawPoints() {

        const selectedNombres = getSelectedNombres();
        const coordMap = {};

        ctx.clearRect(0, 0, drawCanvas.width, drawCanvas.height); // Clear the canvas

        data.forEach(cord => {
            const key = `${cord.x}, ${cord.y}`;
            if (selectedNombres.has(cord.nombre.toLowerCase())) {
                if (coordMap[key]) {
                    // If the coordinate already exists, set the nombre to 'more'
                    coordMap[key].nombre = 'more';
                } else {
                    // Otherwise, add the coordinate to the map
                    coordMap[key] = {
                        ...cord
                    };
                }
            }
        });

        Object.values(coordMap).forEach(cord => {
            drawSquare(31 + 6 * cord.x, 31 + 6 * cord.y, cord.nombre);
        });
    }

    // Redraw points when checkboxes are changed
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', drawPoints);
    });

    // Initial draw
    drawPoints();
});
</script>
@endsection


@section('searchBar')
@include('layouts.searchBar')
@endsection