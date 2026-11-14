<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// clase para el punto 3: calcula promedio, media (mediana) y moda
class AnalizadorEstadistico extends OperacionBase {
    private array $numeros = [];

    public function __construct(string $cadenaNumeros = '') {
        if ($cadenaNumeros !== '') {
            $this->cargarDesdeCadena($cadenaNumeros);
        }
    }

    // separa el texto por comas, quita espacios y deja solo los valores que sean números
    public function cargarDesdeCadena(string $cadenaNumeros): void {
        $partes = array_map('trim', explode(',', $cadenaNumeros));
        $filtrados = array_filter($partes, static fn(string $val): bool => $val !== '' && is_numeric($val));
        $this->numeros = array_values(array_map('floatval', $filtrados));
    }

    public function getNumeros(): array {
        return $this->numeros;
    }

    public function calcularEstadisticas(?string $cadenaNumeros = null): array {
        $this->limpiarError();
        if ($cadenaNumeros !== null) {
            $this->cargarDesdeCadena($cadenaNumeros);
        }

        if (empty($this->numeros)) {
            $this->registrarError('No se ingresaron números válidos.');
            return ['error' => $this->getUltimoError()];
        }

        $cantidad = count($this->numeros);

        // promedio: suma de todos los números dividida entre la cantidad
        $promedio = round(array_sum($this->numeros) / $cantidad, 4);

        // mediana: primero ordenamos el arreglo de menor a mayor
        $ordenados = $this->numeros;
        sort($ordenados);
        $mid = intdiv($cantidad, 2);
        // si la cantidad es par se promedian los dos del centro, si es impar se toma el de la mitad
        $mediana = ($cantidad % 2 === 0)
            ? round(($ordenados[$mid - 1] + $ordenados[$mid]) / 2, 4)
            : $ordenados[$mid];

        // moda: contamos cuántas veces se repite cada número
        $frecuencias = array_count_values(array_map('strval', $ordenados));
        $maxFrecuencia = max($frecuencias);
        $modas = [];
        foreach ($frecuencias as $num => $frec) {
            if ($frec === $maxFrecuencia) {
                $modas[] = $num;
            }
        }

        // si todos se repiten solo 1 vez, significa que no hay moda
        $modaTexto = ($maxFrecuencia === 1 && count($modas) > 1)
            ? 'Sin moda (todos los valores tienen frecuencia 1)'
            : implode(', ', $modas) . " (frecuencia: $maxFrecuencia)";

        return [
            'cantidad' => $cantidad,
            'promedio' => $promedio,
            'mediana'  => $mediana,
            'moda'     => $modaTexto
        ];
    }
}
