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

Route::get('/' , function(){

    return view('layout');

});

//routes for books

Route::get('books' ,'bookController@index')->name("show_all_books");

Route::get('books/show/{book}' , 'bookController@show')->name("show_one_book");

Route::get('books/create' , 'bookController@create')->name("show_create_page");

Route::get('books/edit/{book_id}' , 'bookController@edit')->name("edit_book");

Route::put('books/update/{book_id}' , 'bookController@update')->name("update_book");

Route::delete('books/delete/{book_id}' , 'bookController@delete')->name("book_delete");

Route::post('books/store' , 'bookController@store')->name("store_new_book");


// routes for authors 


Route::get('authors' ,'AuthorController@index')->name("show_all_authors");

Route::get('authors/show/{author}' , 'AuthorController@show')->name("show_one_author");

Route::get('authors/create' , 'AuthorController@create')->name("show_create_page_author");

Route::get('authors/edit/{author_id}' , 'AuthorController@edit')->name("edit_author");

Route::put('authors/update/{author_id}' , 'AuthorController@update')->name("update_author");

Route::delete('authors/delete/{author_id}' , 'AuthorController@delete')->name("author_delete");

Route::post('authors/store' , 'AuthorController@store')->name("store_new_author");


