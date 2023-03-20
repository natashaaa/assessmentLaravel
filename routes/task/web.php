<?php

Auth::routes();

Route::group(['prefix'=>'task', 'middleware'=>'CheckVerified' , 'as'=>'tasks.'], function(){
    Route::get('/', 'task\taskController@index')->name('index');
    Route::get('/datatabletask', 'task\taskController@datatabletask')->name('datatabletask');
    Route::get('/taskdetails/{id}', 'task\taskController@taskdetails')->name('taskdetails');
    Route::get('/taskedit/{id}', 'task\taskController@taskedit')->name('taskedit');
    Route::get('/taskaddnew', 'task\taskController@taskaddnew')->name('taskaddnew');
    Route::get('/taskdelete/{id}', 'task\taskController@taskdelete')->name('taskdelete');
    Route::post('/taskaddnew', 'task\taskController@taskaddnew')->name('taskaddnew');
    Route::post('/taskstore', 'task\taskController@taskstore')->name('taskstore');
    Route::post('/taskedit/{id}/taskupdate', 'task\taskController@taskupdate')->name('taskupdate');

   });

?>
