<?php
class Operaciones {
    
    // APP 1: Convertir texto en acrónimo
    public function generarAcronimo($frase) {
        // 1. Reemplazar los guiones por espacios en blanco
        $frase = str_replace('-', ' ', $frase);

        // 2. Eliminar todos los signos de puntuación (soporte UTF-8)
        $frase = preg_replace('/[^\p{L}\p{N}\s]/u', '', $frase);

        // 3. Dividir la frase en un arreglo de palabras
        $palabras = preg_split('/\s+/', trim($frase));

        $acronimo = '';

        // 4. Extraer la primera letra de cada palabra
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                $acronimo .= mb_strtoupper(mb_substr($palabra, 0, 1));
            }
        }

        return $acronimo;
    }
    // APP 2: Sucesión de Fibonacci y Factorial
    
    // Método para calcular Sucesión de Fibonacci
    public function calcularFibonacci($n) {
        if ($n <= 0) return [];
        if ($n == 1) return [0];
        
        $fib = [0, 1];
        // Generar la serie sumando los dos anteriores
        for ($i = 2; $i < $n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }
        return $fib;
    }

    // Método para calcular Factorial (Uso de recursividad)
    public function calcularFactorial($n) {
        if ($n <= 1) return 1;
        return $n * $this->calcularFactorial($n - 1);
    }
    // ==========================================
    // APP 3: Promedio, Media y Moda
    // ==========================================
    public function calcularEstadisticas($cadenaNumeros) {
        // Convertir la cadena separada por comas en un arreglo
        $arreglo = explode(',', $cadenaNumeros);
        $numerosValidos = [];

        // Limpiar espacios y validar que sean valores numéricos reales (enteros o decimales)
        foreach ($arreglo as $num) {
            $valor = trim($num);
            if (is_numeric($valor)) {
                $numerosValidos[] = (float)$valor;
            }
        }

        $cantidad = count($numerosValidos);
        if ($cantidad === 0) {
            return ['error' => 'No se ingresaron números válidos.'];
        }

        // Promedio y Media (Matemáticamente en este contexto representan la media aritmética)
        $suma = array_sum($numerosValidos);
        $media = $suma / $cantidad;

        // Moda (El valor o valores que más se repiten)
        // Convertimos a string porque array_count_values no soporta floats directamente
        $frecuencias = array_count_values(array_map('strval', $numerosValidos));
        $maxFrecuencia = max($frecuencias);

        $modas = [];
        foreach ($frecuencias as $numero => $frecuencia) {
            if ($frecuencia == $maxFrecuencia) {
                $modas[] = $numero;
            }
        }

        return [
            'cantidad' => $cantidad,
            'media' => $media,
            'moda' => implode(', ', $modas)
        ];
    }
}
?>