<?php

namespace App\Http;

use \Closure;
use \Exception;
use \ReflectionFunction;
use \App\Http\Middleware\Queue as MiddlewareQueue;

class Router{

    private $url = '';

    private $prefix = '';

    private $routes = [];

    private $request;

    public function __construct($url){
        $this->request = new Request($this);
        $this->url = $url;
        $this->setPrefix();
    }

    private function setPrefix(){
        $parseUrl = parse_url($this->url);
        
        $this->prefix = $parseUrl['path'] ?? '';
    }
    /**
     * Método responsavel por adicionar uma rota na classe
     *
     * @param string $method
     * @param string $route
     * @param array $params
     * 
     */
    private function addRoute($method, $route, $params = []){
        //VALIDAÇÃO DOS PARAMETROS
        foreach($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //MIDDLEWARES DA ROTA
        $params['middlewares'] = $params['middlewares'] ?? [];

        //VARIAVERIS DA ROTA
        $params['variables'] = [];

        //PADRAO DE VALIDAÇAO DAS VARIAVEIS DAS ROTAS
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable, $route, $matches)){
           $route = preg_replace($patternVariable,'(.*?)', $route);
           $params['variables'] = $matches[1];
        }
        
        //PAGRAO DE VALIDAÇAO DA URLj
        $patternRoute = '/^'.str_replace('/', '\/',$route).'$/';
        
        //ADICIONA A ROTA DENTRO DA CLASSE

        $this->routes[$patternRoute][$method] = $params;

    }

    //Variaves da rota

  

     public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }

    public function post($route, $params = []){
        return $this->addRoute('POST', $route, $params);
    }
    public function put($route, $params = []){
        return $this->addRoute('PUT', $route, $params);
    }
    public function delete($route, $params = []){
        return $this->addRoute('DELETE', $route, $params);
    }


    private function getUri(){
        $uri = $this->request->getUri();
        
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        
        return end($xUri);
    }
    /**
     * Método reponsável por teronar os dados da rota atual
     *
     * @return array
     */
    private function getRoute(){

        $uri =$this->getUri();
        
        $httpMethod = $this->request->getHttpMethod();
       
        foreach($this->routes as $patternRoute=>$methods){
            if(preg_match($patternRoute, $uri, $matches)){
                if(isset($methods[$httpMethod])){
                    unset($matches[0]);
                    
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys,$matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;
                   
                    return $methods[$httpMethod];
                }

                throw new Exception("Método não permitido", 405);
                
            }
        }
        throw new Exception("URL não encontrada", 404);
        
    }
    /**
     * Metódo responsavel por executar a rota atual
     *
     * @return Response
     */
    public function run(){
        try{
            $route = $this->getRoute();
            
            if(!isset($route['controller'])){
                throw new Exception("URL não pode ser processada.", 500);   
            }
            $args = [];

            $reflection = new ReflectionFunction($route['controller']);
            foreach($reflection->getParameters() as $parameter){
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            //RETORNA A EXECUÇAO DA FILA DE MIDDLEWARES 
            return (new MiddlewareQueue($route['middlewares'], $route['controller'], $args))->next($this->request);
            
                     
        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }


    public function getCurrtenUrl(){
        return $this->url.$this->getUri();
    }

    /**
     * Método responsavel por redirecionar a URL
     *
     * @param [string] $route
     */
    public function redirect($route){
        $url = $this->url.$route;
       
        //EXECUTA O REDIRECT
        header('location: '.$url);
        exit;
    }

}