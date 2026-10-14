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
                <li><a href="app2_fibonacci.php">2. Sucesiones</a></li>
                <li><a href="app3_estadisticas.php">3. Estadísticas</a></li>
                <li><a href="app4_conjuntos.php">4. Conjuntos</a></li>
                <li><a href="app5_binario.php">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="clearfix container">
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
                <article class="card">
                    <h3>3. Estadísticas</h3>
                    <p>Cálculo de Promedio, Media y Moda.</p>
                    <a href="app3_estadisticas.php">Abrir Aplicación</a>
                </article>
                <article class="card">
                    <h3>4. Conjuntos A y B</h3>
                    <p>Unión, intersección y diferencia.</p>
                    <a href="app4_conjuntos.php">Abrir Aplicación</a>
                </article>
                <article class="card">
                    <h3>5. Número a Binario</h3>
                    <p>Conversor de enteros a código binario.</p>
                    <a href="app5_binario.php">Abrir Aplicación</a>
                </article>
                <article class="card">
                    <h3>6. Árbol Binario</h3>
                    <p>Construcción por preorden, inorden, postorden.</p>
                    <a href="app6_arbol.php">Abrir Aplicación</a>
                </article>
                <article class="card">
                    <h3>7. Calculadora</h3>
                    <p>Operaciones básicas con historial.</p>
                    <a href="app7_calculadora.php">Abrir Aplicación</a>
                </article>
            </div>
        </section>
    </main>
</body>
</html>