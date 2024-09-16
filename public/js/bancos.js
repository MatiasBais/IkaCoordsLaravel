
const imageContainer = document.getElementById('imageContainer');
const backgroundImage = document.getElementById('backgroundImage');
const drawCanvas = document.getElementById('drawCanvas');

// Set the canvas size to match the image size
drawCanvas.width = backgroundImage.clientWidth;
drawCanvas.height = backgroundImage.clientHeight;

const ctx = drawCanvas.getContext('2d');

// Variables to store drawing state
let isDrawing = false;
let lastX = 0;
let lastY = 0;

// Function to start drawing
function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

// Function to draw on the canvas
function draw(e) {
    if (!isDrawing) return;
    ctx.strokeStyle = 'red';
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    [lastX, lastY] = [e.offsetX, e.offsetY];
}

// Function to stop drawing
function stopDrawing() {
    isDrawing = false;
}

// Event listeners for drawing
drawCanvas.addEventListener('mousedown', startDrawing);
drawCanvas.addEventListener('mousemove', draw);
drawCanvas.addEventListener('mouseup', stopDrawing);
drawCanvas.addEventListener('mouseout', stopDrawing);
