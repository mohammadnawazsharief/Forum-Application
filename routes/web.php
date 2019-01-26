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

Auth::routes();

Route::get('/forum', [
	'uses'=>'ForumsController@index',
	'as'=>'forum'

]);

Route::get('{provider}/auth',[
'uses'=>'SocialsController@auth',
'as'=>'social.auth'

]);
Route::get('{provider}/redirect',[
'uses'=>'SocialsController@auth_callback',
'as'=>'social.callback'

]);
Route::get('/discussion/{slug}',[
		'uses'=>'DiscussionsController@show',
		'as'=>'discussion'

]);

Route::get('channel/{slug}',[
'uses'=>'ForumsController@channel',
'as'=>'channel'

]);
Route::group(['middleware'=>'auth'],function(){
	// Route::get('/index',[
	// 	'uses'=>'ChannelsController@index',
	// 	'as'=>'channels'
	// ]);
	Route::resource('channels','ChannelsController');
	Route::get('discussion/create/new',[
		'uses'=>'DiscussionsController@create',
		'as'=>'discussions.create'
	]);
	Route::post('discussions/store',[
		'uses'=>'DiscussionsController@store',
		'as'=>'discussions.store'
	]);
	
	Route::post('/discussion/reply/{id}',[
		'uses'=>'DiscussionsController@reply',
		'as'=>'discussion.reply'

	]);
	Route::get('/reply/like/{id}',[
		'uses'=>'RepliesController@like',
		'as'=>'reply.like'
	]);
	Route::get('/reply/unlike/{id}',[
		'uses'=>'RepliesController@unlike',
		'as'=>'reply.unlike'
	]);
	Route::get('/discussion/watch/{id}',[
		'user'=>'WatchersController@watch',
		'as'=>'discussion.watch'
		

	]);
	Route::get('/discussion/unwatch/{id}',[
		'user'=>'WatchersController@unwatch',
		'as'=>'discussion.unwatch'

	]);
	Route::get('/discussion/best/reply/{id}',[
		'uses'=>'RepliesController@best_answer',
		'as'=>'discussion.best.answer'
	]);

	Route::get('/discussions/edit/{slug}',[
		'uses' =>'DiscussionsController@edit',
		'as'=>'discussion.edit'
	]);
	Route::post('/discussions/update/{id}',[
		'uses' =>'DiscussionsController@update',
		'as'=>'discussions.update'
	]);

});