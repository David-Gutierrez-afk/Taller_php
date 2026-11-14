<?php
declare(strict_types=1);

// representa cada círculo (nodo) del árbol con su valor y sus dos posibles hijos
class NodoArbol {
    private string $valor;
    private ?NodoArbol $izq;
    private ?NodoArbol $der;

    // al crear el nodo empieza sin hijos (null)
    public function __construct(string $valor) {
        $this->valor = $valor;
        $this->izq = null;
        $this->der = null;
    }

    public function getValor(): string {
        return $this->valor;
    }

    public function getIzq(): ?NodoArbol {
        return $this->izq;
    }

    public function setIzq(?NodoArbol $nodo): void {
        $this->izq = $nodo;
    }

    public function getDer(): ?NodoArbol {
        return $this->der;
    }

    public function setDer(?NodoArbol $nodo): void {
        $this->der = $nodo;
    }

    // nos dice si el nodo tiene por lo menos un hijo para saber si hay que dibujarle ramas abajo
    public function tieneHijos(): bool {
        return $this->izq !== null || $this->der !== null;
    }
}
