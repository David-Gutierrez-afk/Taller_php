<?php
declare(strict_types=1);
// traemos la clase para convertir de entero a binario
require_once '../clases/ConversorBinario.php';

$obj = new ConversorBinario();
$resultado = null;
$numeroInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroInput = trim((string)($_POST['numeroEntero'] ?? ''));
    $resultado = $obj->convertir($numeroInput);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 5 - Binario | Taller PHP</title>
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
                <li><a href="app3_estadisticas.php">3. Estadísticas</a></li>
                <li><a href="app4_conjuntos.php">4. Conjuntos</a></li>
                <li><a href="app5_binario.php" class="active">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section>
            <img src="../img/app5.svg" alt="Banner Sistema Binario" class="app-banner">
            <h2>5. Conversor de Entero a Binario</h2>
            <p>Ingrese un número entero para obtener su representación equivalente en sistema binario (base 2).</p>

            <form method="POST" action="">
                <label for="numeroEntero">Número Entero:</label>
                <input type="number" id="numeroEntero" name="numeroEntero" value="<?php echo htmlspecialchars($numeroInput); ?>" placeholder="Ej: 42" required>
                <button type="submit" class="btn">Convertir a Binario</button>
            </form>

            <?php if ($resultado !== null): ?>
                <div class="<?php echo $obj->tieneError() ? 'result-box alert' : 'result-box'; ?>">
                    <?php if ($obj->tieneError()): ?>
                        <p><?php echo htmlspecialchars($obj->getUltimoError()); ?></p>
                    <?php else: ?>
                        <p><strong>Número decimal:</strong> <?php echo htmlspecialchars($numeroInput); ?></p>
                        <p><strong>Resultado en binario:</strong> <?php echo htmlspecialchars($resultado); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
