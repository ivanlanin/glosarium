<?php

/*
|--------------------------------------------------------------------------
| Word Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Word (Admin) routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your API!
|
 */

Route::resource('word', 'WordController', [
    'names' => [
        'index'   => 'admin.word.index',
        'create'  => 'admin.word.create',
        'store'   => 'admin.word.store',
        'show'    => 'admin.word.show',
        'edit'    => 'admin.word.edit',
        'update'  => 'admin.word.update',
        'destroy' => 'admin.word.destroy',
    ],
]);
