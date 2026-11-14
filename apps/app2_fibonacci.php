<?php
declare(strict_types=1);
// traemos la clase para fibonacci y factorial
require_once '../clases/Sucesiones.php';

$obj = new CalculadoraSucesiones();
$resultado = null;
$tipoOperacion = '';
$numeroInput = '';
$operacionSeleccionada = 'fibonacci';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroInput = trim((string)($_POST['numero'] ?? ''));
    $operacionSeleccionada = (string)($_POST['operacion'] ?? 'fibonacci');
    $numero = (int)$numeroInput;

    // revisamos qué opción escogió en el select para llamar al método correspondiente
    if ($operacionSeleccionada === 'fibonacci') {
        $serie = $obj->calcularFibonacci($numero);
        $resultado = implode(', ', $serie);
        $tipoOperacion = 'Sucesión de Fibonacci';
    } else {
        $resultado = $obj->calcularFactorial($numero);
        $tipoOperacion = 'Factorial';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 2 - Sucesiones | Taller PHP</title>
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
                <li><a href="app2_fibonacci.php" class="active">2. Sucesiones</a></li>
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
            <img src="../img/app2.svg" alt="Banner Sucesiones" class="app-banner">
            <h2>2. Sucesión de Fibonacci y Factorial</h2>
            <p>Ingrese un número entero y seleccione la operación para generar la serie correspondiente.</p>

            <form method="POST" action="">
                <label for="numero">Ingrese un número entero:</label>
                <input type="number" id="numero" name="numero" min="0" value="<?php echo htmlspecialchars($numeroInput); ?>" placeholder="Ej: 6" required>
                <label for="operacion">Seleccione la operación:</label>
                <select id="operacion" name="operacion" required>
                    <option value="fibonacci" <?php echo $operacionSeleccionada === 'fibonacci' ? 'selected' : ''; ?>>Sucesión de Fibonacci</option>
                    <option value="factorial" <?php echo $operacionSeleccionada === 'factorial' ? 'selected' : ''; ?>>Factorial</option>
                </select>
                <button type="submit" class="btn">Calcular Serie</button>
            </form>

            <?php if ($resultado !== null): ?>
                <?php if ($obj->tieneError()): ?>
                    <div class="result-box alert">
                        <p><strong>Error:</strong> <?php echo htmlspecialchars($obj->getUltimoError()); ?></p>
                    </div>
                <?php else: ?>
                    <div class="result-box">
                        <p><strong>Operación:</strong> <?php echo htmlspecialchars($tipoOperacion); ?></p>
                        <p><strong>Serie generada:</strong> <?php echo htmlspecialchars($resultado); ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
