<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';

// clase para el punto 4: maneja la unión, intersección y diferencias de dos conjuntos
class OperadorConjuntos extends OperacionBase {
    private array $conjuntoA = [];
    private array $conjuntoB = [];

    public function __construct(string $strA = '', string $strB = '') {
        if ($strA !== '' || $strB !== '') {
            $this->setConjuntos($strA, $strB);
        }
    }

    public function setConjuntos(string $strA, string $strB): void {
        $this->conjuntoA = $this->parsearConjunto($strA);
        $this->conjuntoB = $this->parsearConjunto($strB);
    }

    // pasa el texto separado por comas a un arreglo de enteros sin repetidos y ordenado
    private function parsearConjunto(string $cadena): array {
        $items = array_map('trim', explode(',', $cadena));
        $numeros = array_filter($items, static fn(string $v): bool => $v !== '' && is_numeric($v));
        $enteros = array_unique(array_map('intval', $numeros));
        sort($enteros);
        return array_values($enteros);
    }

    public function operar(?string $strA = null, ?string $strB = null): array {
        $this->limpiarError();
        if ($strA !== null && $strB !== null) {
            $this->setConjuntos($strA, $strB);
        }

        // unión: junta ambos conjuntos y quita los repetidos
        $union = array_unique(array_merge($this->conjuntoA, $this->conjuntoB));
        // intersección: deja solo los números que están en A y también en B
        $interseccion = array_values(array_intersect($this->conjuntoA, $this->conjuntoB));
        // diferencia A - B: lo que está en A pero no en B
        $diferenciaAB = array_values(array_diff($this->conjuntoA, $this->conjuntoB));
        // diferencia B - A: lo que está en B pero no en A
        $diferenciaBA = array_values(array_diff($this->conjuntoB, $this->conjuntoA));

        sort($union);
        sort($interseccion);
        sort($diferenciaAB);
        sort($diferenciaBA);

        return [
            'A'            => !empty($this->conjuntoA) ? implode(', ', $this->conjuntoA) : 'Vacío',
            'B'            => !empty($this->conjuntoB) ? implode(', ', $this->conjuntoB) : 'Vacío',
            'union'        => !empty($union) ? implode(', ', $union) : 'Vacío',
            'interseccion' => !empty($interseccion) ? implode(', ', $interseccion) : 'Vacío',
            'diferenciaAB' => !empty($diferenciaAB) ? implode(', ', $diferenciaAB) : 'Vacío',
            'diferenciaBA' => !empty($diferenciaBA) ? implode(', ', $diferenciaBA) : 'Vacío'
        ];
    }
}
