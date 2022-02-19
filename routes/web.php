<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| TAG Routes
|--------------------------------------------------------------------------
*/
Route::get('criar-tag','TagController@create');
Route::post('criar-tag','TagController@store');
Route::get('lista-tag','TagController@index');
Route::get('editar-tag/{id}','TagController@edit');
Route::post('editar-tag/{id}','TagController@update');
Route::get('deletar-tag/{id}','TagController@destroy');


/*
|--------------------------------------------------------------------------
| PRODUTO Routes
|--------------------------------------------------------------------------
*/
Route::get('criar-produto','ProductController@create');
Route::post('criar-produto','ProductController@store');
Route::get('lista-produto','ProductController@index');
Route::get('visualizar-produto/{id}','ProductController@show');
Route::get('editar-produto/{id}','ProductController@edit');
Route::post('editar-produto/{id}','ProductController@update');
Route::get('deletar-produto/{id}','ProductController@destroy');
Route::get('adicionar-gostei/{id}','ProductController@adicionarGostei');
Route::get('adicionar-naogostei/{id}','ProductController@adicionarNaoGostei');
Route::get('pesquisar','ProductController@pesquisar');
Route::post('pesquisar','ProductController@pesquisar');
Route::get('exportar','ProductController@exportar');

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
