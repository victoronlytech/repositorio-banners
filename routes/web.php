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
    return redirect()->action(
        'CampanhaController@Index'
    );
});

Route::prefix('campanhas')->group(function () {
    Route::get('/', 'CampanhaController@Index');
    Route::get('/criar', 'CampanhaController@Criar');
    Route::get('/editar/{id}', 'CampanhaController@Editar');
    Route::post('/criar', 'CampanhaController@Salvar');
    Route::get('/excluir/{id}', 'CampanhaController@Excluir');

    Route::prefix('portais')->group(function () {
        Route::get('/{campanha_id}', 'PortalController@PortaisCampanha');
        Route::get('/addportal/{campanha_id}', 'PortalController@AddPortal');
        Route::get('/editar/{id}', 'PortalController@Editar');
        Route::post('/addportal', 'PortalController@SalvarPortal');
        Route::get('/excluir/{id}', 'PortalController@Excluir');

        Route::prefix('linhascriativas')->group(function () {
            Route::get('/listar/{camapanha_id}/{portal_id}', 'LinhacriativaController@Index');
            Route::get('/criar/{camapanha_id}/{portal_id}', 'LinhacriativaController@Criar');
            Route::get('/editar/{portal_id}', 'LinhacriativaController@Editar');
            Route::post('/criar', 'LinhacriativaController@Salvar');
            Route::get('/excluir/{portal_id}', 'LinhacriativaController@Excluir');

            Route::prefix('formatos')->group(function () {
                Route::get('/{linhacriativa_id}', 'FormatoController@Index');
                Route::get('/criar/{id}', 'FormatoController@Criar');
                Route::get('/editar/{id}', 'FormatoController@Editar');
                Route::post('/criar', 'FormatoController@Salvar');
                Route::get('/excluir/{id}', 'FormatoController@Excluir');

                Route::prefix('pecas')->group(function () {
                    Route::get('/{formato_id}', 'PecaController@Index');
                    Route::get('/criar/{id}', 'PecaController@Criar');
                    Route::get('/editar/{id}', 'PecaController@Editar');
                    Route::post('/criar', 'PecaController@Salvar');
                    Route::get('/excluir/{id}', 'PecaController@Excluir');
                });
            });
        });
    });
});

Route::prefix('medidas')->group(function () {
    Route::get('/', 'MedidaController@Index');
    Route::get('/criar', 'MedidaController@Criar');
    Route::get('/editar/{id}', 'MedidaController@Editar');
    Route::post('/criar', 'MedidaController@Salvar');
    Route::get('/excluir/{id}', 'MedidaController@Excluir');
});

Route::prefix('portais')->group(function () {
    Route::get('/', 'PortalController@Index');
    Route::get('/criar', 'PortalController@Criar');
    Route::get('/editar/{id}', 'PortalController@Editar');
    Route::post('/criar', 'PortalController@Salvar');
    Route::get('/excluir/{id}', 'PortalController@Excluir');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
