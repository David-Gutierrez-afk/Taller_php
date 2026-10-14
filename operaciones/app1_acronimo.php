<?php
// Requerimos el archivo de la clase (Uso de POO)
require_once 'clases/Operaciones.php';

$resultado = '';
// Verificamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fraseIngresada = $_POST['frase'];
    
    // Instanciamos el objeto
    $objOperaciones = new Operaciones();
    // Consumimos el método
    $resultado = $objOperaciones->generarAcronimo($fraseIngresada);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App 1 - Convertidor de Acrónimos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div><strong>Taller PHP POO</strong></div>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="app1_acronimo.php">1. Acrónimos</a></li>
            </ul>
        </nav>
    </header>

    <main style="padding: 40px; max-width: 600px; margin: auto;">
        <h2>Generador de Acrónimos</h2>
        <br>
        <form method="POST" action="">
            <!-- El selector CSS (~) afectará la relación entre este label y el input -->
            <label for="frase">Ingrese la frase (Ej. Portable Network Graphics):</label>
            <input type="text" id="frase" name="frase" required>
            
            <button type="submit">Generar Acrónimo</button>
        </form>

        <?php 
        // Mostrar el resultado si existe
        if ($resultado != '') {
            echo "<div style='margin-top: 20px; padding: 15px; background-color: #d4efdf; border-left: 5px solid #27ae60;'>";
            echo "<strong>Acrónimo resultante: </strong>" . htmlspecialchars($resultado);
            echo "</div>";
        }
        ?>
    </main>
</body>
</html>