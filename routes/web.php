<?php

Route::get('/categories/data', 'Admin\CategoryController@data')->name('categories.data');
Route::get('/members/data', 'Admin\MemberController@data')->name('members.data');
Route::get('/books/data', 'Admin\BookController@data')->name('books.data');
Route::get('/borrows/data', 'Admin\BorrowController@data')->name('borrows.data');

Route::resource('/home', 'Admin\HomeController');
Route::resource('/categories', 'Admin\CategoryController');
Route::resource('/members', 'Admin\MemberController');
Route::resource('/books', 'Admin\BookController');
Route::resource('/borrows', 'Admin\BorrowController');