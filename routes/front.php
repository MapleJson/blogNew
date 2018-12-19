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

Route::get('/', "Home\HomeController@index")->name('home');
Route::get('/rss', "Home\HomeController@rss")->name('rss');
Route::get('/siteMap.xml', "Home\HomeController@siteMap")->name('siteMap');

/*
|--------------------------------------------------------------------------
| 相册
|--------------------------------------------------------------------------
*/
Route::get('/travels.htm', "Travels\TravelController@travels")->name('travels');
Route::get('/travels/photo/{id}.htm', "Travels\TravelController@photo")->where('id', '[0-9]+')->name('photo');
Route::get('/loadPhoto', "Travels\TravelController@loadPhoto")->name('loadPhoto');

/*
|--------------------------------------------------------------------------
| 博客
|--------------------------------------------------------------------------
*/
Route::get('/blog.htm', "Blog\BlogController@blog")->name('blog');
Route::get('/loadBlog', "Blog\BlogController@loadBlog")->name('loadBlog');
Route::get('/blog/tag/{tag}.htm', "Blog\BlogController@blogByTag")->name('tags');
Route::get('/blog/info/{id}.htm', "Blog\BlogController@info")->where('id', '[0-9]+')->name('info');

/*
|--------------------------------------------------------------------------
| 耳语
|--------------------------------------------------------------------------
*/
Route::get('/whisper.htm', "Whisper\WhisperController@whisper")->name('whisper');
Route::get('/loadWhisper', "Whisper\WhisperController@loadWhisper")->name('loadWhisper');

/*
|--------------------------------------------------------------------------
| 关于我
|--------------------------------------------------------------------------
*/
Route::get('/about.htm', "About\AboutController@about")->name('about');
Route::get('/hutui.htm', "About\AboutController@hutui")->name('hutui');

/*
|--------------------------------------------------------------------------
| 友情链接
|--------------------------------------------------------------------------
*/
Route::get('/links.htm', "Links\LinkController@links")->name('links');
Route::post('/links', "Links\LinkController@applyLink")->name('applyLink');

/*
|--------------------------------------------------------------------------
| 留言
|--------------------------------------------------------------------------
*/
Route::get('/message.htm', "Message\MessageController@message")->name('message');
Route::post('/message', "Message\MessageController@addMessage")->name('addMessage')->middleware('auth');

/*
|--------------------------------------------------------------------------
| 搜索
|--------------------------------------------------------------------------
*/
Route::post('/search', "Search\SearchController@search")->name('search');

/*
|--------------------------------------------------------------------------
| 第三方登录
|--------------------------------------------------------------------------
*/
Route::get('/auth/{service}', 'Auth\SocialiteLoginController@redirectToProvider')->name('socialiteLoginForm');
Route::get('/logout', 'Auth\SocialiteLoginController@logout')->name('logout');
Route::get('/auth/{service}/callback', 'Auth\SocialiteLoginController@handleProviderCallback')->name('socialiteLogin');
