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

//routes for developers

Route::get('developers' ,'DevController@index')->name("show_all_developers");

Route::get('developers/show/{developer}' , 'DevController@show')->name("show_one_developer");

Route::get('developers/create' , 'DevController@create')->name("show_create_page_developer");

Route::get('developers/edit/{developer_id}' , 'DevController@edit')->name("edit_developer");

Route::put('developers/update/{developer_id}' , 'DevController@update')->name("update_developer");

Route::delete('developers/delete/{developer_id}' , 'DevController@delete')->name("developer_delete");

Route::post('developers/store' , 'DevController@store')->name("store_new_developer");


// routes for projects


Route::get('projects' ,'ProjectController@index')->name("show_all_projects");

Route::get('projects/show/{project}' , 'ProjectController@show')->name("show_one_project");

Route::get('projects/create' , 'ProjectController@create')->name("show_create_page_project");

Route::get('projects/edit/{project_id}' , 'ProjectController@edit')->name("edit_project");

Route::put('projects/update/{project_id}' , 'ProjectController@update')->name("update_project");

Route::delete('projects/delete/{project_id}' , 'ProjectController@delete')->name("project_delete");

Route::post('projects/store' , 'ProjectController@store')->name("store_new_project");

// routes for dev_project

Route::get('dev_project' ,'DevProject@show_form')->name("show_form_dev_project");

Route::post('store_dev_project' , 'DevProject@store')->name('store_dev_project');

// routes for project_images

Route::get('project_image' ,'Pro_Images@show_form')->name("show_form_project_image");

Route::post('store_project_image' , 'Pro_Images@store')->name('store_project_image');
