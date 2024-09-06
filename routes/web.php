<?php

Route::get('/', 'WebSiteController@home')->name('home');
Route::get('/produtos', 'WebSiteController@produtos')->name('produtos');
Route::get('/produtos/{prodselecionado}', 'WebSiteController@produtoselecionado')->name('produtoselecionado');
Route::get('/receitas', 'WebSiteController@receitas')->name('receitas');
Route::get('/receitas/{slug}', ['as' => 'receita.item', 'uses' => 'WebSiteController@getSingleReceita'])->where('slug', '[\w\d\-\_]+');
Route::get('/galeria', 'WebSiteController@galeria')->name('galeria');
Route::get('/contato', 'WebSiteController@contato')->name('contato');

Route::get('/pagenotfound', 'WebSiteController@pagenotfound')->name('pagenotfound');

route::get('mail', 'mailController@index');
route::post('postMail', 'mailController@post');
Route::get('csrf', function () {
    return Session::token();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('empresa', 'EmpresaController');
    Route::resource('receitas', 'ReceitaController');
    Route::resource('produtos', 'ProdutoController');
    Route::resource('historico', 'HistoricoController');

    Route::get('image/upload','ImageUploadController@fileCreate');
    Route::post('image/upload/store','ImageUploadController@fileStore');
    Route::post('image/delete','ImageUploadController@fileDestroy');

    Route::get('galeria/gallery',  'GaleriaController@gallery')->name('galeria.index');
    Route::post('galeria/gallery/do-upload', 'GaleriaController@doImageUpload')->name('gallery.upload');
    Route::get('galeria/gallery/destroy/{image}', ['as' => 'gallery.image.destroy', 'uses' => 'GaleriaController@destroyImage']);
    Route::get('galeria/gallery/edit/{image}', ['as' => 'gallery.image.update', 'uses' => 'GaleriaController@updateMidiaDescription']);

    Route::get('informacaonutricional/{produto}', 'InformacaoNutricionalController@index')->name('informacaonutricional.index');
    Route::get('informacaonutricional/novo/{produto}', 'InformacaoNutricionalController@create')->name('informacaonutricional.create');
    Route::post('informacaonutricional', 'InformacaoNutricionalController@store')->name('informacaonutricional.store');
    Route::get('informacaonutricional/edit/{informacaonutricional}', 'InformacaoNutricionalController@edit')->name('informacaonutricional.edit');
    Route::put('informacaonutricional/{informacaonutricional}', 'InformacaoNutricionalController@update')->name('informacaonutricional.update');
    Route::delete('informacaonutricional/{informacaonutricional}', 'InformacaoNutricionalController@destroy');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});

Auth::routes();
