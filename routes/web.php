<?php

Route::get('products', 'ProductController@index')->name('products.index');


Route::get('/login', function(){
    return 'Login';
})->name('login');
/*
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function(){
    Route::name('admin.')->group(function(){
        Route::get('/dashboard', 'TesteController@teste')->name('dashbord');

        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

        Route::get('/produtos','TesteController@teste')->name('produtos');

        Route::get('/', function(){
            return redirect()->route('admin.dashbord');
        })->name('home');
    });
});*/

/*
Route::middleware([])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::namespace('Admin')->group(function(){

            Route::name('admin.')->group(function(){
                Route::get('/dashboard', 'TesteController@teste')->name('dashbord');

                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

                Route::get('/produtos','TesteController@teste')->name('produtos');

                Route::get('/', function(){
                    return redirect()->route('admin.dashbord');
                })->name('home');
            });
        });
    });
});*/

/*
Route::get('redirect3', function(){
    return redirect()->route('url.name');
});


Route::get('/nome-teste', function(){
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view','welcome');

Route::redirect('redirect1','redirect2');
*/

/*
Route::get('/redirect1', function(){
    return redirect('/redirect2');
});*/
/*
Route::get('redirect2', function(){
    return 'redirect2';
});

Route::get('/produtos/{idProduct?}', function($idProduct=""){
    return "Produtos: $idProduct";
});

Route::get('/categoria/{flag}/post',function($flag){

    return "Produtos da categoria: $flag";
});

Route::get('/categorias/{flag}',function($flag){

    return "Produtos da categoria: $flag";
});

Route::match(['get','post'], '/match', function(){
    return 'match';
});
*/

//aceita todo tipo de requisição http exemplo get, post, put tomar cuidado ao usar
/*
Route::any('any',function(){
    return 'any';
});

Route::get('/contato', function(){
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
*/
