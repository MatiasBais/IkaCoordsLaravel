<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IkaCoords</title>
    <!-- Vincula el archivo CSS de Bootstrap -->
    <script>
        const loadingImageUrl = "{{ asset('images/loading.gif') }}";
    </script>


    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            /* Light gray background color */
        }

        header {
            background-color: #333;
            /* Dark gray header background color */
            padding: 10px;
            color: white;
            text-align: center;
        }

        #main-container {
            display: flex;
        }

        #top-bar {
            width: 100%;
            background-color: #444;
            /* Darker gray top bar background color */
            padding: 10px;
            text-align: center;
        }

        #top-bar a {
            display: inline-block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            background-color: #555;
            /* Dark gray for links */
        }

        #side-bar {
            width: 25%;
            background-color: #f5f5f5;
            /* Light gray side bar background color */
            padding: 20px;
            text-align: center;
        }

        #side-bar a {
            display: block;
            color: #333;
            /* Dark gray text color for links */
            text-decoration: none;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            background-color: #ddd;
            /* Lighter gray for side bar links */
        }

        #main-content {
            width: 60%;
            padding: 20px;
        }

        #right-section {
            flex-grow: 1;
            padding: 20px;
            background-color: #f5f5f5;
            /* Light gray background color for right section */
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            width: 100%;
            max-width: 100%;
            /* Set max-width to 100% */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            /* Center the inputs */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 97%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        select {

            width: 97%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;

        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        #resultContainer {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Light gray for even rows */
        }

        tr:hover {
            background-color: #e0e0e0;
            /* Light gray on hover for all rows */
        }

        #main-content a {
            color: black;
        }
    </style>
    <!-- Otros archivos CSS personalizados -->
    @yield('styles')
</head>

<body>

    <div id="top-bar">
        <a href="/tops/bestPlayers">Tops</a>
        <a href="/search/cities">Buscar</a>
        <a href="/statistics/clasiPlayer">Estadísticas</a>
        <a href="/worldStatistics/clasiPlayer">Mundo</a>
    </div>
    <div id="main-container">
        @yield('searchBar')

        <div id="main-content">
            @yield('content')
            <div style="margin:auto;">

            </div>
        </div>

        <div id="right-section">

        </div>
    </div>

    </div>

</body>

</html>