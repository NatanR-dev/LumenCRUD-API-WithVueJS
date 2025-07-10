<?php

$router->get('/notes', 'NotesController@index');
$router->get('/notes/{id}', 'NotesController@show');
$router->post('/notes', 'NotesController@store');
$router->put('/notes/{id}', 'NotesController@update');
$router->patch('/notes/{id}', 'NotesController@update');
$router->delete('/notes/{id}', 'NotesController@destroy'); 