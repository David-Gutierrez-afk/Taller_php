<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Taller PHP</title>
    <!-- cargamos el archivo de estilos externo -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/jpeg" href="img/logo.jpg">
</head>
<body>
    <!-- encabezado con el logo circular y el menú de todas las aplicaciones -->
    <header>
        <div class="site-title">
            <div class="contenedor_icono"></div>
            <div class="caja-titulo">
                <h1>TALLER</h1>
                <h1>PHP</h1>
            </div>
        </div>
        <!-- aquí actúa el selector nav > ul y el layout flexbox (.flex-nav) -->
        <nav>
            <ul class="flex-nav">
                <li><a href="index.php" class="active">Inicio</a></li>
                <li><a href="apps/app1_acronimo.php">1. Acrónimo</a></li>
                <li><a href="apps/app2_fibonacci.php">2. Sucesiones</a></li>
                <li><a href="apps/app3_estadisticas.php">3. Estadísticas</a></li>
                <li><a href="apps/app4_conjuntos.php">4. Conjuntos</a></li>
                <li><a href="apps/app5_binario.php">5. Binario</a></li>
                <li><a href="apps/app6_arbol.php">6. Árboles</a></li>
                <li><a href="apps/app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <!-- sección de la ruleta 3D giratoria con las 7 apps -->
        <section class="carrusel-section">
            <h2>Vista Previa Interactiva (Ruleta 3D)</h2>
            <!-- este párrafo toma su estilo del selector h2 + p -->
            <p>Haz clic sobre cualquier tarjeta en la ruleta 3D para abrir la aplicación directamente.</p>

            <div class="carrusel-3d-wrapper">
                <div class="content-carrousel">
                    <figure><a href="apps/app1_acronimo.php"><img src="img/app1.svg" alt="App 1 Acrónimos"></a></figure>
                    <figure><a href="apps/app2_fibonacci.php"><img src="img/app2.svg" alt="App 2 Sucesiones"></a></figure>
                    <figure><a href="apps/app3_estadisticas.php"><img src="img/app3.svg" alt="App 3 Estadísticas"></a></figure>
                    <figure><a href="apps/app4_conjuntos.php"><img src="img/app4.svg" alt="App 4 Conjuntos"></a></figure>
                    <figure><a href="apps/app5_binario.php"><img src="img/app5.svg" alt="App 5 Sistema Binario"></a></figure>
                    <figure><a href="apps/app6_arbol.php"><img src="img/app6.svg" alt="App 6 Árbol Binario"></a></figure>
                    <figure><a href="apps/app7_calculadora.php"><img src="img/app7.svg" alt="App 7 Calculadora"></a></figure>
                </div>
            </div>
        </section>

        <!-- segunda sección (se separa de la de arriba gracias al selector section ~ section) -->
        <section>
            <h2>Catálogo de Aplicaciones</h2>
            <p>Seleccione una herramienta del taller desde las tarjetas inferiores (Layout CSS Grid).</p>

            <!-- aquí se aplica el layout css grid (.grid-container) -->
            <div class="grid-container">
                <article class="card">
                    <img src="img/app1.svg" alt="Ilustración Acrónimos" class="card-img">
                    <h3>1. Acrónimos</h3>
                    <p>Convierte frases o nombres largos en su acrónimo en mayúsculas.</p>
                    <a href="apps/app1_acronimo.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app2.svg" alt="Ilustración Sucesiones" class="card-img">
                    <h3>2. Sucesiones</h3>
                    <p>Genera la serie de la Sucesión de Fibonacci o el Factorial de un número.</p>
                    <a href="apps/app2_fibonacci.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app3.svg" alt="Ilustración Estadísticas" class="card-img">
                    <h3>3. Estadísticas</h3>
                    <p>Calcula el Promedio, la Media (Mediana) y la Moda de números reales.</p>
                    <a href="apps/app3_estadisticas.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app4.svg" alt="Ilustración Conjuntos" class="card-img">
                    <h3>4. Conjuntos A y B</h3>
                    <p>Calcula unión, intersección y diferencias entre dos conjuntos enteros.</p>
                    <a href="apps/app4_conjuntos.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app5.svg" alt="Ilustración Sistema Binario" class="card-img">
                    <h3>5. Sistema Binario</h3>
                    <p>Convierte cualquier número entero a su representación en base 2.</p>
                    <a href="apps/app5_binario.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app6.svg" alt="Ilustración Árbol Binario" class="card-img">
                    <h3>6. Árbol Binario</h3>
                    <p>Construye y grafica el árbol según sus recorridos Preorden, Inorden y Postorden.</p>
                    <a href="apps/app6_arbol.php" class="btn">Abrir App</a>
                </article>
                <article class="card">
                    <img src="img/app7.svg" alt="Ilustración Calculadora" class="card-img">
                    <h3>7. Calculadora</h3>
                    <p>Operaciones básicas y porcentaje con historial de sesión y borrado.</p>
                    <a href="apps/app7_calculadora.php" class="btn">Abrir App</a>
                </article>
            </div>
        </section>
    </main>
</body>
</html>
