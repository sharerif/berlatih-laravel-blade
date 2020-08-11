<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('adminlte.partials.home');
});

Route::get('/data-tables', function () {
    return view('adminlte.partials.tables');
});

// tugas CRUD Week 3

Route::get('/pertanyaan', 'PertanyaanController@index'); // list data pertanyaan"
Route::get('/pertanyaan/create', 'PertanyaanController@create'); // form membuat pertanyaan baru
Route::post('/pertanyaan', 'PertanyaanController@store'); // menyimpan data baru ke table pertanyaan
Route::get('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@show'); // menampilkan detail pertanyaan dengan id tertentu
Route::get('/pertanyaan/{pertanyaan_id}/edit', 'PertanyaanController@edit'); // menampilkan form untuk edit pertanyaan dengan id tertentu
Route::put('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@update'); // menyimpan perubahan data pertanyaan (update) dengan id tertentu
Route::delete('/pertanyaan/{pertanyaan_id}', 'PertanyaanController@destroy'); // menghapus pertanyaan dengan id tertentu