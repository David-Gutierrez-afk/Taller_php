<?php
require_once 'clases/Operaciones.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numerosIngresados = $_POST['numeros'];
    
    // Instanciamos el objeto (POO)
    $objOperaciones = new Operaciones();
    $resultado = $objOperaciones->calcularEstadisticas($numerosIngresados);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 3 - Estadísticas</title>
    <!-- Estilos externos (Cumpliendo la regla) -->
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
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2>Cálculo de Promedio, Media y Moda</h2>
        <!-- Selector CSS (+) aplica aquí -->
        <p>Ingrese una serie de números reales separados por comas.</p>
        <br>
        
        <form method="POST" action="">
            <!-- Selector CSS (~) aplica aquí entre label e input -->
            <label for="numeros">Serie de números (Ej: 2.5, 4, 4, 8.1, 10):</label>
            <input type="text" id="numeros" name="numeros" placeholder="Ejemplo: 2, 4, 6, 4, 8" required>
            
            <button type="submit">Calcular Estadísticas</button>
        </form>

        <?php if ($resultado !== null): ?>
            <div class="result-box">
                <?php if (isset($resultado['error'])): ?>
                    <strong>Error:</strong> <?php echo htmlspecialchars($resultado['error']); ?>
                <?php else: ?>
                    <strong>Cantidad de números analizados:</strong> <?php echo htmlspecialchars($resultado['cantidad']); ?><br><br>
                    <strong>Promedio / Media Aritmética:</strong> <?php echo htmlspecialchars($resultado['media']); ?><br><br>
                    <strong>Moda:</strong> <?php echo htmlspecialchars($resultado['moda']); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>