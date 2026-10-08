<?php

//  Interface do produto
interface ProcessadorPagamento {
    public function processar(float $valor): string;
}

//  Produtos concretos
class PagamentoPix implements ProcessadorPagamento {
    public function processar(float $valor): string {
        return "Pagamento de R$ {$valor} gerado via QR Code PIX.";
    }
}

class PagamentoCartao implements ProcessadorPagamento {
    public function processar(float $valor): string {
        return "Pagamento de R$ {$valor} aprovado no Cartão de Crédito.";
    }
}

// Classe Criadora Abstrata (contém o Factory Method)
abstract class GatewayCheckout {
    // Factory Method
    abstract public function criarProcessador(): ProcessadorPagamento;

    public function finalizarPedido(float $valor): string {
        $processador = $this->criarProcessador();
        return $processador->processar($valor);
    }
}

// Criadores concretos
class CheckoutPix extends GatewayCheckout {
    public function criarProcessador(): ProcessadorPagamento {
        return new PagamentoPix();
    }
}

class CheckoutCartao extends GatewayCheckout {
    public function criarProcessador(): ProcessadorPagamento {
        return new PagamentoCartao();
    }
}

// Uso no sistema
$checkout = new CheckoutPix();
echo $checkout->finalizarPedido(150.00); 