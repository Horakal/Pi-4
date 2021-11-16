<?php

namespace App\Http\Middleware;

class Maintenance{

    /**
     * Método responsavel por executar o middleware
     *
     * @param [Request] $request
     * @param [Closure] $next
     * @return Response
     */
    public function handle($request, $next){
        //VERIFICA O ESTADO DE MANUTENÇAO DA PROXIMA
        if(getenv('MAINTENANCE') == 'true'){
            throw new \Exception("Página em manutenção. Tente novamente mais tarde", 200);
            
        }
        //EXECUTA O PROXIMO NIVEL DO MIDDLEWARE
       return $next($request);
    }

}