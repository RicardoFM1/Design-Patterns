<?php

namespace App\Http\Middleware;

use Closure;

class CheckDinheiroRemetente
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        $usuario = Usuario::where('token', $token)->first(); // Buscar o usuário no banco de dados com o model 
        // pelo token guardado na tabela

        $transacao = Transacao::where('usuario_id')->first();
        // Buscar o carrinho do usuário para verificar o valor da transação.

        // Verifica se tem dinheiro

        if ($usuario->dinheiro > $transacao->valor) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Usuário sem dinheiro'
            ], 422);
        }

        // Passa para a próxima requisição
        return $next($request);
    }
}
