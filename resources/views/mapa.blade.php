<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IkaCoords</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full height viewport */
            margin: 0;
            /* Remove default body margin */
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
            margin-bottom: 5px;
        }
    </style>

</head>

<body>
    <div id="imageContainer">
        <img src="images/coords.png" id="backgroundImage" alt="Background Image">
        <canvas id="drawCanvas" width="674" height="674"></canvas>
    </div>
    <div id="controls">
        <label class="checkbox-label"><input type="checkbox" class="nombre-checkbox" value="SARRACENOS" checked>
            SARRACENOS</label>
        <label class="checkbox-label"><input type="checkbox" class="nombre-checkbox" value="RufianesLatinos" checked>
            RufianesLatinos</label>
        <label class="checkbox-label"><input type="checkbox" class="nombre-checkbox" value="Mercenarios" checked>
            Mercenarios</label>
        <label class="checkbox-label"><input type="checkbox" class="nombre-checkbox" value="CHUCHOS" checked>
            CHUCHOS</label>
        <label class="checkbox-label"><input type="checkbox" class="nombre-checkbox" value="COMA" checked> COMA</label>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const imageContainer = document.getElementById('imageContainer');
            const backgroundImage = document.getElementById('backgroundImage');
            const drawCanvas = document.getElementById('drawCanvas');
            const checkboxes = document.querySelectorAll('.nombre-checkbox');

            // Ensure the canvas matches the size of the image
            drawCanvas.width = 674;
            drawCanvas.height = 674;

            const ctx = drawCanvas.getContext('2d');

            function getColorByNombre(nombre) {
                switch (nombre) {
                    case 'SARRACENOS':
                        return 'green';
                    case 'RufianesLatinos':
                        return 'red';
                    case 'Mercenarios':
                        return 'orange';
                    case 'CHUCHOS':
                        return 'blue';
                    case 'COMA':
                        return 'yellow';
                    case 'more':
                        return 'black';
                    default:
                        return 'gray'; // Default color for any unknown nombre
                }
            }

            // Function to draw a square at the specified position
            function drawSquare(x, y, nombre) {
                const squareSize = 5; // Size of the square
                ctx.fillStyle = getColorByNombre(nombre);
                ctx.fillRect(x, y, squareSize, squareSize);
            }

            async function fetchData() {
                try {
                    const response = await fetch('/api/mapa');
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
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        selectedNombres.add(checkbox.value);
                    }
                });
                return selectedNombres;
            }

            // Function to draw all squares based on the selected nombres
            async function drawPoints() {
                const data = await fetchData();
                const selectedNombres = getSelectedNombres();
                const coordMap = {};

                ctx.clearRect(0, 0, drawCanvas.width, drawCanvas.height); // Clear the canvas

                data.forEach(cord => {
                    const key = `${cord.x},${cord.y}`;
                    if (selectedNombres.has(cord.nombre)) {
                        if (coordMap[key]) {
                            // If the coordinate already exists, set the nombre to 'more'
                            coordMap[key].nombre = 'more';
                        } else {
                            // Otherwise, add the coordinate to the map
                            coordMap[key] = cord;
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
</body>

</html>