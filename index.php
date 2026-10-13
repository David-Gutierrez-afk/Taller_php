<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller PHP - Menú Principal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div><strong>Taller PHP POO</strong></div>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="app1_acronimo.php">1. Acrónimos</a></li>
                <li><a href="app2_fibonacci.php">2. Fibonacci/Factorial</a></li>
            </ul>
        </nav>
    </header>

    <main class="clearfix">
        <aside class="float-box">
            <h2>Acerca del Proyecto</h2>
            <p>Este proyecto implementa HTML5 puro, CSS3 externo (Grid, Flex, Float) y lógica de programación en PHP Orientado a Objetos (POO).</p>
        </aside>

        <section>
            <h1>Aplicaciones Disponibles</h1>
            <p>Seleccione una aplicación para interactuar con el sistema.</p>
            <div class="grid-container">
                <article class="card">
                    <h3>1. Acrónimos</h3>
                    <p>Convierte nombres largos en acrónimos.</p>
                    <a href="app1_acronimo.php">Abrir Aplicación</a>
                </article>
                <article class="card">
                    <h3>2. Sucesiones</h3>
                    <p>Calculadora de Fibonacci y Factorial.</p>
                    <a href="app2_fibonacci.php">Abrir Aplicación</a>
                </article>
            </div>
        </section>
    </main>
</body>
</html>