<?php
declare(strict_types=1);
require_once __DIR__ . '/OperacionBase.php';
require_once __DIR__ . '/NodoArbol.php';

// clase para el punto 6: arma el árbol binario según los recorridos que ingrese el usuario
class ConstructorArbolBinario extends OperacionBase {
    private ?NodoArbol $raiz = null;
    private string $metodoUsado = '';

    public function getRaiz(): ?NodoArbol {
        return $this->raiz;
    }

    public function getMetodoUsado(): string {
        return $this->metodoUsado;
    }

    public function generarArbol(string $preStr, string $inStr, string $postStr): string {
        $this->limpiarError();
        $this->raiz = null;
        $this->metodoUsado = '';

        $pre = $this->limpiarRecorrido($preStr);
        $in = $this->limpiarRecorrido($inStr);
        $post = $this->limpiarRecorrido($postStr);

        $nodosReferencia = [];

        // ponemos primero preorden + inorden porque el punto pide usar ese por defecto si meten los 3
        if (!empty($pre) && !empty($in)) {
            if (!$this->mismosElementos($pre, $in)) {
                $this->registrarError('Los recorridos Preorden e Inorden no contienen los mismos elementos.');
                return "<p class=\"result-box alert\"><strong>Error:</strong> {$this->getUltimoError()}</p>";
            }
            $preCopia = $pre;
            $this->raiz = $this->construirDesdePreIn($preCopia, $in);
            $this->metodoUsado = 'Preorden + Inorden';
            $nodosReferencia = $in;
        }
        // si no metieron preorden, probamos con inorden + postorden
        elseif (!empty($in) && !empty($post)) {
            if (!$this->mismosElementos($in, $post)) {
                $this->registrarError('Los recorridos Inorden y Postorden no contienen los mismos elementos.');
                return "<p class=\"result-box alert\"><strong>Error:</strong> {$this->getUltimoError()}</p>";
            }
            $postCopia = $post;
            $this->raiz = $this->construirDesdeInPost($in, $postCopia);
            $this->metodoUsado = 'Inorden + Postorden';
            $nodosReferencia = $in;
        }
        // última combinación posible: preorden + postorden
        elseif (!empty($pre) && !empty($post)) {
            if (!$this->mismosElementos($pre, $post)) {
                $this->registrarError('Los recorridos Preorden y Postorden no contienen los mismos elementos.');
                return "<p class=\"result-box alert\"><strong>Error:</strong> {$this->getUltimoError()}</p>";
            }
            $preCopia = $pre;
            $this->raiz = $this->construirPrePost($preCopia, $post);
            $this->metodoUsado = 'Preorden + Postorden';
            $nodosReferencia = $pre;
        } else {
            $this->registrarError('Debe ingresar mínimo dos recorridos para construir el árbol.');
            return "<p class=\"result-box alert\"><strong>Error:</strong> {$this->getUltimoError()}</p>";
        }

        // revisamos que la cantidad de nodos creados sí coincida con los que metió el usuario
        if ($this->raiz !== null && $this->contarNodos($this->raiz) === count($nodosReferencia)) {
            $encabezado = '<p><strong>Árbol construido usando:</strong> ' . htmlspecialchars($this->metodoUsado) . '</p>';
            return $encabezado . '<div class="tree-container">' . $this->renderizarArbolHTML($this->raiz) . '</div>';
        }

        $this->registrarError('Los recorridos ingresados no coinciden para formar un árbol binario válido.');
        return "<p class=\"result-box alert\"><strong>Error:</strong> {$this->getUltimoError()}</p>";
    }

    // permite que el usuario separe las letras con comas, flechas (→), guiones o espacios
    private function limpiarRecorrido(string $str): array {
        $texto = trim($str);
        if ($texto === '') {
            return [];
        }
        $partes = preg_split('/\s*(?:→|->|,|;|-|\s+)\s*/u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        return $partes ?: [];
    }

    // ordena copias de los dos arreglos para comprobar que tengan exactamente las mismas letras
    private function mismosElementos(array $a, array $b): bool {
        if (count($a) !== count($b)) {
            return false;
        }
        $copiaA = $a;
        $copiaB = $b;
        sort($copiaA);
        sort($copiaB);
        return $copiaA === $copiaB;
    }

    // cuenta cuántos nodos quedaron conectados en el árbol final
    private function contarNodos(?NodoArbol $nodo): int {
        if ($nodo === null) {
            return 0;
        }
        return 1 + $this->contarNodos($nodo->getIzq()) + $this->contarNodos($nodo->getDer());
    }

    // arma el árbol usando preorden e inorden
    // el &$pre va con & para que al quitar la raíz realmente se borre del arreglo original
    private function construirDesdePreIn(array &$pre, array $in): ?NodoArbol {
        if (empty($in) || empty($pre)) {
            return null; // ya no hay más nodos por este lado
        }

        // en preorden el primero siempre es la raíz
        $rootVal = (string)array_shift($pre);

        // buscamos esa raíz en inorden para partir el arreglo en izquierda y derecha
        $idx = array_search($rootVal, $in, true);
        if ($idx === false) {
            return null;
        }

        $root = new NodoArbol($rootVal);
        // lo que está antes de la raíz en inorden va a la izquierda y lo de después a la derecha
        $root->setIzq($this->construirDesdePreIn($pre, array_slice($in, 0, (int)$idx)));
        $root->setDer($this->construirDesdePreIn($pre, array_slice($in, (int)$idx + 1)));

        return $root;
    }

    // arma el árbol usando inorden y postorden
    private function construirDesdeInPost(array $in, array &$post): ?NodoArbol {
        if (empty($in) || empty($post)) {
            return null;
        }

        // en postorden la raíz está al final, por eso la sacamos con array_pop
        $rootVal = (string)array_pop($post);
        $idx = array_search($rootVal, $in, true);
        if ($idx === false) {
            return null;
        }

        $root = new NodoArbol($rootVal);
        // aquí se arma primero la derecha porque al ir sacando del final de postorden aparecen primero los derechos
        $root->setDer($this->construirDesdeInPost(array_slice($in, (int)$idx + 1), $post));
        $root->setIzq($this->construirDesdeInPost(array_slice($in, 0, (int)$idx), $post));

        return $root;
    }

    // arma el árbol usando preorden y postorden
    private function construirPrePost(array &$pre, array $post): ?NodoArbol {
        if (empty($pre) || empty($post)) {
            return null;
        }

        // sacamos la raíz del principio de preorden y del final de postorden
        $rootVal = (string)array_shift($pre);
        array_pop($post);
        $root = new NodoArbol($rootVal);

        if (!empty($pre) && !empty($post)) {
            // el siguiente en preorden es la raíz del hijo izquierdo
            $leftRootVal = $pre[0];
            $idx = array_search($leftRootVal, $post, true);
            if ($idx !== false) {
                // hasta donde aparezca ese nodo en postorden es la rama izquierda, y el resto es la derecha
                $root->setIzq($this->construirPrePost($pre, array_slice($post, 0, (int)$idx + 1)));
                $root->setDer($this->construirPrePost($pre, array_slice($post, (int)$idx + 1)));
            }
        }

        return $root;
    }

    // convierte los nodos en etiquetas div anidadas para que el css dibuje los círculos y las líneas
    private function renderizarArbolHTML(?NodoArbol $nodo): string {
        if ($nodo === null) {
            return '';
        }

        $html = '<div class="tree-node">';
        $html .= '<div class="tree-value">' . htmlspecialchars($nodo->getValor()) . '</div>';

        if ($nodo->tieneHijos()) {
            $html .= '<div class="tree-children">';
            if ($nodo->getIzq() !== null) {
                $html .= $this->renderizarArbolHTML($nodo->getIzq());
            }
            if ($nodo->getDer() !== null) {
                $html .= $this->renderizarArbolHTML($nodo->getDer());
            }
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }
}
