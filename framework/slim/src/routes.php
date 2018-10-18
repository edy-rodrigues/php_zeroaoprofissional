<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/', function(Request $request, Response $response, array $args) {
    $Lista = new Lista($this->db);
    $args['lista'] = $Lista->getLista();
    return $this->renderer->render($response, 'home.phtml', $args);
});

$app->get('/add', function(Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'add.phtml', $args);
});

$app->post('/add', function(Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $Lista = new Lista($this->db);
    $Lista->add($data);
    return $response->withStatus(302)->withHeader("Location", "./");
});

$app->get('/editar/{id}', function(Request $request, Response $response, array $args) {
    $Lista = new Lista($this->db);
    $args['info'] = $Lista->getContato($args['id']);
    return $this->renderer->render($response, 'editar.phtml', $args);
});

$app->post('/editar/{id}', function(Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $Lista = new Lista($this->db);
    $Lista->atualizar($args['id'], $data);
    return $response->withStatus(302)->withHeader("Location", "../");
});

$app->get('/deletar/{id}', function(Request $request, Response $response, array $args) {
    $Lista = new Lista($this->db);
    $Lista->deletar($args['id']);
    return $response->withStatus(302)->withHeader("Location", "../");
});