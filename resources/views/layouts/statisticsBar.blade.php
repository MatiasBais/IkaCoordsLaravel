<div id="side-bar">
    <a href="/statistics/clasiPlayer">Clasificación Jugadores</a>
    <a href="/statistics/clasiAlianza">Clasificación Alianza</a>
    <a href="/statistics/mayorIntendencia">Mayor Intendencia</a>
    <a href="/statistics/masCiudades">Más Ciudades</a>
    <select hidden name="pais" id="pais">
        <option value="ES">España</option>
    </select>
    <select name="server" id="server">
        <option value="Alpha">Alpha ES</option>
        <option value="Beta">Beta ES</option>
        <option value="Delta">Delta ES</option>
        <option value="Rho">Rho ES</option>
        <option value="Pi">Pi ES</option>
        <option value="Acheron">Acheron ES</option>
        <option value="Kerberos">Kerberos ES</option>
        <option value="Telemachos">Telemachos ES</option>
        <option value="Persephone">Persephone ES</option>
        <option value="Ares">Ares</option>
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