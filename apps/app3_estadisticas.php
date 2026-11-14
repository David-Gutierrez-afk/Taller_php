<?php
declare(strict_types=1);
// traemos la clase para calcular promedio, media y moda
require_once '../clases/Estadistica.php';

$obj = new AnalizadorEstadistico();
$resultado = null;
$numerosInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numerosInput = trim((string)($_POST['numeros'] ?? ''));
    $resultado = $obj->calcularEstadisticas($numerosInput);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 3 - Estadísticas | Taller PHP</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/jpeg" href="../img/logo.jpg">
</head>
<body>
    <header>
        <div class="site-title">
            <div class="contenedor_icono"></div>
            <div class="caja-titulo">
                <h1>TALLER</h1>
                <h1>PHP</h1>
            </div>
        </div>
        <nav>
            <ul class="flex-nav">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="app1_acronimo.php">1. Acrónimo</a></li>
                <li><a href="app2_fibonacci.php">2. Sucesiones</a></li>
                <li><a href="app3_estadisticas.php" class="active">3. Estadísticas</a></li>
                <li><a href="app4_conjuntos.php">4. Conjuntos</a></li>
                <li><a href="app5_binario.php">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section>
            <img src="../img/app3.svg" alt="Banner Estadísticas" class="app-banner">
            <h2>3. Promedio, Media y Moda</h2>
            <p>Ingrese la cantidad de números reales que desee separados por comas.</p>

            <form method="POST" action="">
                <label for="numeros">Serie de números reales (Ej: 2.5, 4, 6.2, 4, 8):</label>
                <input type="text" id="numeros" name="numeros" value="<?php echo htmlspecialchars($numerosInput); ?>" placeholder="Ej: 10, 15.5, 20, 15.5, 30" required>
                <button type="submit" class="btn">Calcular Estadísticas</button>
            </form>

            <?php if ($resultado !== null): ?>
                <div class="<?php echo $obj->tieneError() ? 'result-box alert' : 'result-box'; ?>">
                    <?php if ($obj->tieneError()): ?>
                        <p><strong>Error:</strong> <?php echo htmlspecialchars($obj->getUltimoError()); ?></p>
                    <?php else: ?>
                        <p><strong>Cantidad de números ingresados:</strong> <?php echo htmlspecialchars((string)$resultado['cantidad']); ?></p>
                        <p><strong>Promedio:</strong> <?php echo htmlspecialchars((string)$resultado['promedio']); ?></p>
                        <p><strong>Media (Mediana):</strong> <?php echo htmlspecialchars((string)$resultado['mediana']); ?></p>
                        <p><strong>Moda:</strong> <?php echo htmlspecialchars((string)$resultado['moda']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
