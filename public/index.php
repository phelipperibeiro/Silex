<?php

require_once('./bootstrap.php');

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Code\App\Services\ClienteService;

$response = new Response();

// pimple DI
$app['clienteService'] = function () use ($entityManager) {
    
    $clienteService = new ClienteService($entityManager);
    
    return $clienteService;
};

##################################API###################################

$app->get("/api/clientes", function() use ($app) {
    $dados = $app['clienteService']->fetchAll();
    return $app->json($dados);
});

$app->get("/api/clientes/{id}", function($id) use ($app) {
    $dados = $app['clienteService']->find($id);
    return $app->json($dados);
});

$app->post("/api/clientes", function(Request $request) use ($app) {

    $dados['cliente'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    return $app->json($app['clienteService']->insert($dados));
});

$app->delete("/api/clientes/{id}", function($id) use ($app) {
    $dados = $app['clienteService']->delete($id);
    return $app->json($dados);
});

$app->put("/api/clientes/{id}", function($id, Request $request) use ($app) {

    $dados['id'] = $id;
    $dados['cliente'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $dados = $app['clienteService']->update($dados);

    return $app->json($dados);
});

##################################API###################################





$app->get("/", function() use ($app) {
    return $app['twig']->render('index.twig', []);
})->bind('index'); // (bind) apelido da rota

$app->get("/hello/{nome}", function($nome) use ($app) {
    return $app['twig']->render('hello.twig', ['nome' => $nome]);
});

//$app->get("/", function() use ($response) {
//    $response->setContent("Olá Mundo...");
//    return $response;
//});

$app->get("/clientes", function() use($app) {
    $dados = $app['clienteService']->fetchAll();
    return $app['twig']->render('clientes.twig', ['clientes' => $dados]);
});

//$app->get("/cliente", function() use($app) {
//
//    $dados['cliente'] = "Cliente";
//    $dados['email'] = "cliente@hotmail.com";
//
//    $result = $app['clienteService']->insert($dados);
//
//    return $app->json($result);
//});

$app->run();
