<?php
declare(strict_types=1);
// traemos la clase para operar los conjuntos A y B
require_once '../clases/Conjuntos.php';

$obj = new OperadorConjuntos();
$resultado = null;
$conjuntoAInput = '';
$conjuntoBInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conjuntoAInput = trim((string)($_POST['conjuntoA'] ?? ''));
    $conjuntoBInput = trim((string)($_POST['conjuntoB'] ?? ''));
    $resultado = $obj->operar($conjuntoAInput, $conjuntoBInput);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 4 - Conjuntos | Taller PHP</title>
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
                <li><a href="app4_conjuntos.php" class="active">4. Conjuntos</a></li>
                <li><a href="app5_binario.php">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section>
            <img src="../img/app4.svg" alt="Banner Conjuntos" class="app-banner">
            <h2>4. Operaciones con Conjuntos A y B</h2>
            <p>Ingrese dos series de números enteros separados por comas para calcular unión, intersección y diferencias.</p>

            <form method="POST" action="">
                <label for="conjuntoA">Conjunto A (números enteros separados por coma):</label>
                <input type="text" id="conjuntoA" name="conjuntoA" value="<?php echo htmlspecialchars($conjuntoAInput); ?>" placeholder="Ej: 1, 2, 3, 4, 5" required>
                <label for="conjuntoB">Conjunto B (números enteros separados por coma):</label>
                <input type="text" id="conjuntoB" name="conjuntoB" value="<?php echo htmlspecialchars($conjuntoBInput); ?>" placeholder="Ej: 4, 5, 6, 7, 8" required>
                <button type="submit" class="btn">Calcular Operaciones</button>
            </form>

            <?php if ($resultado !== null): ?>
                <div class="result-box">
                    <p><strong>Conjunto A:</strong> { <?php echo htmlspecialchars($resultado['A']); ?> }</p>
                    <p><strong>Conjunto B:</strong> { <?php echo htmlspecialchars($resultado['B']); ?> }</p>
                    <p class="result-divider"><strong>Unión (A ∪ B):</strong> { <?php echo htmlspecialchars($resultado['union']); ?> }</p>
                    <p><strong>Intersección (A ∩ B):</strong> { <?php echo htmlspecialchars($resultado['interseccion']); ?> }</p>
                    <p><strong>Diferencia (A - B):</strong> { <?php echo htmlspecialchars($resultado['diferenciaAB']); ?> }</p>
                    <p><strong>Diferencia (B - A):</strong> { <?php echo htmlspecialchars($resultado['diferenciaBA']); ?> }</p>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
