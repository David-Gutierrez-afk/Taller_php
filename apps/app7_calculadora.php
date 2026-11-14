<?php
declare(strict_types=1);
// iniciamos sesión para guardar el historial mientras el navegador esté abierto
session_start();
require_once '../clases/Calculadora.php';

if (!isset($_SESSION['historial'])) {
    $_SESSION['historial'] = [];
}

$obj = new CalculadoraAritmetica();
$resultadoActual = null;
$num1Input = '';
$num2Input = '';
$operacionSeleccionada = 'suma';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrar_historial'])) {
        // si le dio al botón de borrar, dejamos el historial vacío
        $_SESSION['historial'] = [];
    } elseif (isset($_POST['calcular'])) {
        $num1Input = trim((string)($_POST['num1'] ?? ''));
        $num2Input = trim((string)($_POST['num2'] ?? ''));
        $operacionSeleccionada = (string)($_POST['operacion'] ?? 'suma');

        $resultadoActual = $obj->calcular($num1Input, $num2Input, $operacionSeleccionada);
        $simbolos = [
            'suma'           => '+',
            'resta'          => '-',
            'multiplicacion' => '×',
            'division'       => '÷',
            'porcentaje'     => '%'
        ];

        // si no hubo error (como dividir por cero), metemos la operación al principio del historial
        if (!$obj->tieneError() && isset($simbolos[$operacionSeleccionada])) {
            array_unshift(
                $_SESSION['historial'],
                "{$num1Input} {$simbolos[$operacionSeleccionada]} {$num2Input} = {$resultadoActual}"
            );
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 7 - Calculadora | Taller PHP</title>
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
                <li><a href="app5_binario.php">5. Binario</a></li>
                <li><a href="app6_arbol.php">6. Árboles</a></li>
                <li><a href="app7_calculadora.php" class="active">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <!-- aquí se usa el layout float junto con clearfix para que el contenedor no se encoja -->
    <main class="container clearfix">
        <img src="../img/app7.svg" alt="Banner Calculadora" class="app-banner">
        <h2>7. Calculadora con Historial (Layout: Float)</h2>
        <p>Permite operar números enteros o decimales y conserva el historial en la sesión actual.</p>

        <!-- columna izquierda con float: left -->
        <section class="float-left">
            <form method="POST" action="">
                <label for="num1">Primer Número (entero o decimal):</label>
                <input type="number" step="any" id="num1" name="num1" value="<?php echo htmlspecialchars($num1Input); ?>" placeholder="Ej: 120.5" required>
                <label for="operacion">Operación:</label>
                <select id="operacion" name="operacion" required>
                    <option value="suma" <?php echo $operacionSeleccionada === 'suma' ? 'selected' : ''; ?>>Suma (+)</option>
                    <option value="resta" <?php echo $operacionSeleccionada === 'resta' ? 'selected' : ''; ?>>Resta (-)</option>
                    <option value="multiplicacion" <?php echo $operacionSeleccionada === 'multiplicacion' ? 'selected' : ''; ?>>Multiplicación (×)</option>
                    <option value="division" <?php echo $operacionSeleccionada === 'division' ? 'selected' : ''; ?>>División (÷)</option>
                    <option value="porcentaje" <?php echo $operacionSeleccionada === 'porcentaje' ? 'selected' : ''; ?>>Porcentaje (%)</option>
                </select>
                <label for="num2">Segundo Número (entero o decimal):</label>
                <input type="number" step="any" id="num2" name="num2" value="<?php echo htmlspecialchars($num2Input); ?>" placeholder="Ej: 15" required>
                <button type="submit" name="calcular" class="btn">Calcular</button>
            </form>

            <?php if ($resultadoActual !== null): ?>
                <div class="<?php echo $obj->tieneError() ? 'result-box alert' : 'result-box'; ?>">
                    <p><strong>Resultado:</strong> <?php echo htmlspecialchars((string)$resultadoActual); ?></p>
                </div>
            <?php endif; ?>
        </section>

        <!-- columna derecha con float: right para el historial -->
        <aside class="float-right card">
            <h3>Historial de Operaciones</h3>
            <?php if (count($_SESSION['historial']) > 0): ?>
                <ul class="history-list">
                    <?php foreach ($_SESSION['historial'] as $item): ?>
                        <li><?php echo htmlspecialchars((string)$item); ?></li>
                    <?php endforeach; ?>
                </ul>
                <form method="POST" action="">
                    <button type="submit" name="borrar_historial" class="btn btn-danger">Borrar Historial</button>
                </form>
            <?php else: ?>
                <p>No hay operaciones registradas en el historial.</p>
            <?php endif; ?>
        </aside>
    </main>
</body>
</html>
