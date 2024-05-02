<div id="side-bar">
    <a href="/search/inactives">Búsqueda de Inactivos</a>
    <a href="/search/islands">Búsqueda de Islas</a>
    <a href="/search/cities">Búsqueda de Ciudades</a>
    <a href="/search/players">Búsqueda de Jugadores</a>
    <select hidden name="pais" id="pais">
        <option value="ES">España</option>
    </select>
    <select name="server" id="server">
        <option value="Alpha">Alpha ES</option>
        <option value="Kerberos">Kerberos ES</option>
        <option value="Pangaia1">Pangaia 1</option>
    </select>
    <script>
    document.getElementById("server").addEventListener("change", function() {
        localStorage.setItem("server", document.getElementById("server").value);
        location.reload();
    });
    document.addEventListener("DOMContentLoaded", function() {
        // Obtiene el elemento select por su ID.
        var selectElement = document.getElementById("server");

        // Establece el valor del select basado en lo almacenado en localStorage.
        var savedValue = localStorage.getItem("server");
        if (savedValue) {
            selectElement.value = savedValue;
        }

        // Añade un controlador de eventos para actualizar localStorage cuando el valor cambie.
        selectElement.addEventListener("change", function() {
            localStorage.setItem("server", selectElement.value);
        });
    });
    </script>

</div>