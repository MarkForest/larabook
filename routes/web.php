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
    return view('welcome');
});

Route::get('home/contact', function (){
   return  view('HomeController@contact');
});

Route::resource('topic', 'TopicController');
Route::resource('block', 'BlockController');
//   /topic            index    topic.index
//   /topic/create     create   topic.create
//   /topic     index    topic.index
//   /topic     index    topic.index
//   /topic     index    topic.index
//   /topic     index    topic.index
//   /topic     index    topic.index