<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Landing home.
$router->get('/', function () { return view('home'); });

// CRUD.
$router->get('/notes/{noteId}', 'NotesCrudController@read');
$router->get('/notes', 'NotesCrudController@readAll');
$router->post('/notes', 'NotesCrudController@create');
$router->put('/notes/{noteId}', 'NotesCrudController@update');
$router->patch('/notes/{noteId}', 'NotesCrudController@patch');
$router->delete('/notes/{noteId}', 'NotesCrudController@delete');
