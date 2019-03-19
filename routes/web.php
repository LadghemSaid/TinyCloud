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

Route::get('/', 'MonControleur@index');
Route::get('/utilisateur/{id}', 'MonControleur@utilisateur')->where("id","[0-9]+");
Route::get('/suivre/{id}', 'MonControleur@suivre')->middleware('auth')->where("id","[0-9]+");
Route::get('/recherche/{s}', 'MonControleur@recherche');
Route::get('/nouvelle', 'MonControleur@nouvelle')->middleware('auth');
Route::get('/addtoplaylist/{idp}/{idc}', 'MonControleur@AddToPlaylist')->middleware('auth');
Route::get('/playlistview', 'MonControleur@Playlistview')->middleware('auth');
Route::get('/song/{id}', 'MonControleur@SongView')->where("id","[0-9]+");
Route::get('/removeplaylist/{idp}', 'MonControleur@RemovePlaylist')->where("idp","[0-9]+");
Route::get('/removefromplaylist/{idp}/{idc}', 'MonControleur@RemoveFromPlaylist')->middleware('auth');
Route::get('/removesong/{idc}', 'MonControleur@RemoveSong')->middleware('auth')->where("idc","[0-9]+");
Route::get('/like/{idc}', 'MonControleur@Like')->middleware('auth')->where("idc","[0-9]+");
Route::get('/dislike/{idc}', 'MonControleur@DisLike')->middleware('auth')->where("idc","[0-9]+");


Route::get('/autocomplete/{slug}', 'MonControleur@AutoComplete')->middleware('auth');
Route::get('/getartist/{slug}', 'MonControleur@GetArtist')->middleware('auth');

Route::get("/testajax","MonControleur@testajax");


Route::post('/creerplaylist', 'MonControleur@CreePlaylist')->middleware('auth');
Route::post('/creer', 'MonControleur@Creer')->middleware('auth');

Auth::routes();

Route::view('/test', './layouts/test');

