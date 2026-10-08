<?php

namespace App\Http\Middleware;

use Closure;

class Auth {
    public function handle($request, Closure $next){
        $token = $request->header('Authorization');

        if(empty($token)){
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Usuário não autenticado'
            ], 401);
        }

        return $next($request);
    }
}

