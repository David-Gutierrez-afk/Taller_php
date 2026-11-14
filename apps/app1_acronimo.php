<?php
declare(strict_types=1);
// traemos la clase encargada de generar acrónimos
require_once '../clases/Acronimo.php';

$obj = new GeneradorAcronimo();
$frase = '';
$acronimo = '';
$procesado = false;

// cuando el usuario envía el formulario, procesamos la frase con el objeto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $frase = trim((string)($_POST['frase'] ?? ''));
    $acronimo = $obj->generar($frase);
    $procesado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 1 - Convertidor de Acrónimos | Taller PHP</title>
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
        <!-- menú superior con flexbox -->
        <nav>
            <ul class="flex-nav">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="app1_acronimo.php" class="active">1. Acrónimo</a></li>
                <li><a href="app2_fibonacci.php">2. Sucesiones</a></li>
                <li><a href="app3_estadisticas.php">3. Estadísticas</a></li>
                <li><a href="app4_conjuntos.php">4. Conjuntos</a></li>
                <li><a href="app5_binario.php">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section>
            <img src="../img/app1.svg" alt="Banner Acrónimos" class="app-banner">
            <h2>1. Generador de Acrónimos</h2>
            <p>Los guiones separan palabras y los demás signos de puntuación se eliminan automáticamente.</p>

            <!-- el input toma su estilo gracias al selector label ~ input -->
            <form method="POST" action="">
                <label for="frase">Ingrese la frase (Ej: Portable Network Graphics, Liquid-crystal display, Thank George It's Friday!):</label>
                <input type="text" id="frase" name="frase" value="<?php echo htmlspecialchars($frase); ?>" placeholder="Ej: As Soon As Possible" required>
                <button type="submit" class="btn">Generar Acrónimo</button>
            </form>

            <?php if ($procesado): ?>
                <?php if ($obj->tieneError()): ?>
                    <div class="result-box alert">
                        <p><strong>Error:</strong> <?php echo htmlspecialchars($obj->getUltimoError()); ?></p>
                    </div>
                <?php else: ?>
                    <div class="result-box">
                        <p><strong>Frase ingresada:</strong> <?php echo htmlspecialchars($frase); ?></p>
                        <p><strong>Acrónimo resultante:</strong> <?php echo htmlspecialchars($acronimo); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
