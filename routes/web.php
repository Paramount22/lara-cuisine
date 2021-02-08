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





Auth::routes();

/* Guests routes */
Route::get('/', 'RecipeController@index')->name('recipes');
Route::get('queries', 'QueryController@search')->name('search'); //search
Route::get('contact', 'SendEmailController@index')->name('contact');
Route::post('sendemail/send', 'SendEmailController@send');
Route::get('recipe/{id}/{slug}', 'RecipeController@show')->name('recipe.show');
Route::get('category/{id}/{slug}', 'CategorieController@show')->name('show.category');
Route::get('user/{id}/{name}', 'UserController@show')->name('show.user');

/* Users routes */
Route::group(['middleware' => 'auth'], function () {
    Route::resource('comment', 'CommentController')->only('store', 'show');
    Route::get('recipe/create', 'RecipeController@create')->name('create');
    Route::post('recipe/create', 'RecipeController@store')->name('store');
    Route::get('recipe/{id}/{slug}/edit-recipe', 'RecipeController@edit')->name('recipe.edit');
    Route::put('recipe/{id}/{slug}', 'RecipeController@update')->name('recipe.update');
    Route::get('user/{id}/{name}/edit-profil', 'UserController@edit')->name('edit.user');
    Route::post('user/{id}', 'UserController@update')->name('update.user');
    Route::get('comment/{id}/delete', 'CommentController@destroy'); // delete comment



});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function() {

    Route::get('all', function () {
        return view('admin.index');
    });
    
    // Blog
    Route::get('blog', 'ArticleController@index')->name('blog');
    Route::get('article/new', 'ArticleController@create')->name('create.article');
    Route::post('article/new', 'ArticleController@store')->name('store.article');
    Route::get('article/{slug}', 'ArticleController@show')->name('show.article');
    Route::get('article/delete/{id}', 'ArticleController@destroy')->name('article.destroy');

    // Users
    Route::get('users', 'AdminController@getAllUsers')->name('users');
    Route::get('user/edit/{id}', 'AdminController@editUser')->name('edit.user');
    Route::put('user/{id}', 'AdminController@updateUser')->name('update.user');
    // Recipes
    Route::get('recipes', 'AdminController@getAllRecipes')->name('recipes');
    Route::get('recipe/delete/{id}', 'AdminController@destroyRecipe')->name('recipe.destroy');
    
    // Comments
    Route::get('comments', 'AdminController@getAllComments')->name('comments');
    Route::get('comment/delete/{id}', 'AdminController@destroyComment')->name('comment.destroy');
    
    // Categories
    Route::get('categories', 'AdminController@getAllCategories')->name('categories');
    Route::get('category/create', 'AdminController@createCategory')->name('category.create');
    Route::post('category/create', 'AdminController@store')->name('store.category');
    Route::get('category/delete/{id}', 'AdminController@destroyCategory')->name('category.destroy');


    //Route::get('recipe/{id}/{slug}/delete-recipe', 'RecipeController@delete')->name('recipe.delete');
});


