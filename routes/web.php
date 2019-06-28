<?php

Route::get('/categories/data', 'Admin\CategoryController@data')->name('categories.data');

Route::resource('/home', 'Admin\HomeController');
Route::resource('/categories', 'Admin\CategoryController');
Route::resource('/members', 'Admin\MemberController');
Route::resource('/books', 'Admin\BookController');
Route::resource('/borrows', 'Admin\BorrowController');