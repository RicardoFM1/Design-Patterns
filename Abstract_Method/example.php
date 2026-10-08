<?php

// Interfaces dos produtos da família
interface Cadeira {
    public function exibeEstilo(): string;
}

interface Sofa {
    public function exibeEstilo(): string;
}

//  Produtos concretos da família "Moderna"
class CadeiraModerna implements Cadeira {
    public function exibeEstilo(): string {
        return "Cadeira de metal minimalista.";
    }
}

class SofaModerno implements Sofa {
    public function exibeEstilo(): string {
        return "Sofá retilíneo minimalista.";
    }
}

//  Produtos concretos da família "Clássica"
class CadeiraClassica implements Cadeira {
    public function exibeEstilo(): string {
        return "Cadeira de madeira entalhada.";
    }
}

class SofaClassico implements Sofa {
    public function exibeEstilo(): string {
        return "Sofá de veludo trabalhado.";
    }
}

//  Interface da Fábrica Abstrata
interface FabricaMoveis {
    public function criarCadeira(): Cadeira;
    public function criarSofa(): Sofa;
}

//  Fábricas Concretas para cada família
class FabricaModerna implements FabricaMoveis {
    public function criarCadeira(): Cadeira { return new CadeiraModerna(); }
    public function criarSofa(): Sofa { return new SofaModerno(); }
}

class FabricaClassica implements FabricaMoveis {
    public function criarCadeira(): Cadeira { return new CadeiraClassica(); }
    public function criarSofa(): Sofa { return new SofaClassico(); }
}

// Uso no sistema
function montarSala(FabricaMoveis $fabrica): void {
    $cadeira = $fabrica->criarCadeira();
    $sofa = $fabrica->criarSofa();

    echo $cadeira->exibeEstilo() . "\n";
    echo $sofa->exibeEstilo() . "\n";
}

// Cliente escolhe a linha clássica
montarSala(new FabricaClassica());
