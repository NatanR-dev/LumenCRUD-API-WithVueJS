<?php

$router->get('/', function () {
    return response()->json([
        'message' => 'Welcome to the Lumen API',
        'status' => 'success',
        'version' => '1.0.0'
    ]);
});

// Catch-all para rotas não encontradas
$router->get('{any:.*}', function () {
    return response()->json([
        'message' => 'Not Found.'
    ], 404);
}); 