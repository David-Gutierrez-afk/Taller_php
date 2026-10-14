<?php
// Requerimos la clase (POO)
require_once 'clases/Operaciones.php';

$resultado = null;
$tipoOperacion = '';

// Verificamos si el usuario envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (int)$_POST['numero'];
    $operacion = $_POST['operacion'];
    
    // Instanciamos el objeto
    $objOperaciones = new Operaciones();
    
    // Ejecutamos el método según la selección
    if ($operacion == 'fibonacci') {
        $resultadoArr = $objOperaciones->calcularFibonacci($numero);
        // Convertimos el arreglo en un texto separado por comas
        $resultado = implode(", ", $resultadoArr);
        $tipoOperacion = 'Serie de Fibonacci';
    } elseif ($operacion == 'factorial') {
        $resultado = $objOperaciones->calcularFactorial($numero);
        $tipoOperacion = 'Factorial';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 2 - Sucesiones</title>
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
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2>Calculadora de Sucesiones</h2>
        <p>Seleccione el número y la operación a calcular.</p>
        <br>
        
        <form method="POST" action="">
            <label for="numero">Ingrese un número (mayor a 0):</label>
            <input type="number" id="numero" name="numero" min="1" required>
            
            <label for="operacion">Seleccione la operación:</label>
            <select id="operacion" name="operacion" required>
                <option value="fibonacci">Sucesión de Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>
            
            <button type="submit">Calcular Resultado</button>
        </form>

        <?php 
        if ($resultado !== null): 
        ?>
            <div class="result-box">
                <strong>Resultado (<?php echo $tipoOperacion; ?>): </strong> <?php echo htmlspecialchars($resultado); ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>