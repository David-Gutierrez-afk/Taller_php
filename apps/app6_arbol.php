<?php
declare(strict_types=1);
// traemos la clase que arma y dibuja el árbol binario
require_once '../clases/ArbolBinario.php';

$obj = new ConstructorArbolBinario();
$resultado = null;
$preorden = '';
$inorden = '';
$postorden = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preorden = trim((string)($_POST['preorden'] ?? ''));
    $inorden = trim((string)($_POST['inorden'] ?? ''));
    $postorden = trim((string)($_POST['postorden'] ?? ''));
    $resultado = $obj->generarArbol($preorden, $inorden, $postorden);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 6 - Árbol Binario | Taller PHP</title>
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
                <li><a href="app6_arbol.php" class="active">6. Árboles</a></li>
                <li><a href="app7_calculadora.php">7. Calculadora</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <section>
            <img src="../img/app6.svg" alt="Banner Árbol Binario" class="app-banner">
            <h2>6. Construcción de Árbol Binario</h2>
            <p>Ingrese mínimo dos recorridos. Si ingresa los tres, por defecto se construirá con Preorden e Inorden.</p>

            <form method="POST" action="">
                <label for="preorden">Preorden (Raíz → Izq → Der):</label>
                <input type="text" id="preorden" name="preorden" value="<?php echo htmlspecialchars($preorden); ?>" placeholder="Ej: A → B → D → E → C  o  A, B, D, E, C">
                <label for="inorden">Inorden (Izq → Raíz → Der):</label>
                <input type="text" id="inorden" name="inorden" value="<?php echo htmlspecialchars($inorden); ?>" placeholder="Ej: D → B → E → A → C  o  D, B, E, A, C">
                <label for="postorden">Postorden (Izq → Der → Raíz):</label>
                <input type="text" id="postorden" name="postorden" value="<?php echo htmlspecialchars($postorden); ?>" placeholder="Ej: D → E → B → C → A  o  D, E, B, C, A">
                <button type="submit" class="btn">Construir Árbol Binario</button>
            </form>

            <?php if ($resultado !== null): ?>
                <!-- aquí se imprime el html de los nodos que genera la clase -->
                <div class="card tree-card">
                    <?php echo $resultado; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
