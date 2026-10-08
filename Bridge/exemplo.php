<?php

// 1. As cores
interface Cor {
    public function getNome(): string;
}

// Implements aqui porque é para Classe -> Interfaces e extends é para Classe -> Classe.
class Vermelho implements Cor {
    public function getNome(): string { return "Vermelho"; }
}

// Cria uma nova cor com base na interface de cor e retorna cor.
class Azul implements Cor {
    public function getNome(): string { return "Azul"; }
}

// 2. O Veículo (recebe a cor por parâmetro).
class CarroEsportivo {
    private Cor $cor; // Esta propriedade é a "Ponte" (Bridge).

    public function __construct(Cor $cor) {
        $this->cor = $cor;
    }

    public function mostrar(): string {
        return "Carro Esportivo " . $this->cor->getNome();
    }
}

// 3. Montando o objeto na prática.
$carroVermelho = new CarroEsportivo(new Vermelho());
$carroAzul = new CarroEsportivo(new Azul());

echo $carroVermelho->mostrar(); // Carro Esportivo Vermelho
echo $carroAzul->mostrar();     // Carro Esportivo Azul