<?php

require __DIR__.'/includes/app.php';

use \App\Http\Router;

//INCIA O ROUTER
$obRouter = new Router(URL);

//INCLUDE AS ROTAS DAS PAGINAS
include __DIR__.'/routes/pages.php';

//INCLUI AS ROTAS DO PAINEL
include __DIR__.'/routes/admin.php';


//IMPRIME O RESPONSE DA ROTA
$obRouter->run()
         ->sendResponse();