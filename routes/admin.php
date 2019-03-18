<?php

use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 后台公共路由部分
|
*/

Route::group([
    'middleware' => ['adminCookie', 'admin'],
], function (Router $router) {
    //登录
    $router->get('login.html', 'LoginController@showLoginForm')->name('admin.loginForm');
    $router->post('login', 'LoginController@login')->name('admin.login');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    | 后台需要登录的路由 admins
    |
    */
    $router->get('logout.html', 'LoginController@logout')->name('admin.logout');
    /*
     * 后台布局--菜单路由
     */
    $router->get(config('admin.home'), 'IndexController@redirect');
    $router->get('home.html', 'IndexController@layout')->name('admin.layout');
    $router->get('index.html', 'IndexController@index')->name('admin.index');
    $router->get('administrators.html', 'AdministratorController@index')->name('admin.administrators');
    $router->get('menus.html', 'MenuController@index')->name('admin.menus');
    $router->get('logs.html', 'LogController@index')->name('admin.logs');
    $router->get('posts.html', 'BlogController@index')->name('admin.posts');
    $router->get('tags.html', 'TagController@index')->name('admin.tags');
    $router->get('links.html', 'LinkController@index')->name('admin.links');
    $router->get('siteSetting.html', 'SettingController@index')->name('admin.siteSetting');
    $router->get('carousel.html', 'CarouselController@index')->name('admin.carousel');
    $router->get('message.html', 'MessageController@index')->name('admin.message');
    $router->get('travels.html', 'TravelController@index')->name('admin.travels');
    $router->get('photo/{id}.html', 'PhotoController@index')->name('admin.photos');
    $router->get('frontUsers.html', 'FrontUserController@index')->name('admin.frontUsers');
    $router->get('whispers.html', 'WhisperController@index')->name('admin.whispers');
    $router->get('icons.html', 'MenuController@icons')->name('admin.icons');
    $router->get('template.html', 'TemplateController@index')->name('admin.template');
    /*
     * 内页页面路由
     */
    $router->get('changePwd.html', 'IndexController@changePwd')->name('admin.changePwd');
    $router->get('userInfo.html', 'IndexController@userInfo')->name('admin.userInfo');
    /*
     * 请求路由
     */
    // 修改个人信息
    $router->put('updateInfo/{id}', 'IndexController@updateAdminUser')->name('admin.updateInfo');
    $router->put('updatePwd/{id}', 'IndexController@updatePwd')->name('admin.updatePwd');
    // 上传文件
    $router->post('upload', 'UploadController@upload')->name('admin.upload');
    $router->post('editorUpload', 'UploadController@editorUpload')->name('admin.editorUpload');
    //$router->post('bulkUpload', 'UploadController@bulkUpload')->name('admin.bulkUpload');
    // 菜单操作
    $router->get('menu/list', 'MenuController@data')->name('admin.getMenus');
    $router->post('menu/create', 'MenuController@store')->name('admin.addMenu');
    $router->put('menu/edit/{id}', 'MenuController@update')->name('admin.editMenu');
    $router->delete('menu/delete', 'MenuController@destroy')->name('admin.delMenu');
    // 站点设置
    $router->post('set/website/{id}', 'SettingController@update')->name('admin.setWebsite');
    // 菜单操作
    $router->get('carousel/list', 'CarouselController@data')->name('admin.getCarousels');
    $router->post('carousel/create', 'CarouselController@store')->name('admin.addCarousel');
    $router->put('carousel/edit/{id}', 'CarouselController@update')->name('admin.editCarousel');
    $router->delete('carousel/delete', 'CarouselController@destroy')->name('admin.delCarousel');
    // 文章操作
    $router->get('blog/list', 'BlogController@data')->name('admin.getPosts');
    $router->get('blog/show/{id}', 'BlogController@show')->name('admin.postShow');
    $router->post('blog/create', 'BlogController@store')->name('admin.addPost');
    $router->put('blog/edit/{id}', 'BlogController@update')->name('admin.editPost');
    $router->delete('blog/delete', 'BlogController@destroy')->name('admin.delPost');
    // 标签操作
    $router->get('tag/list/{state?}', 'TagController@data')->name('admin.getTags');
    $router->post('tag/create', 'TagController@store')->name('admin.addTag');
    $router->put('tag/edit/{id}', 'TagController@update')->name('admin.editTag');
    $router->delete('tag/delete', 'TagController@destroy')->name('admin.delTag');
    // 心情操作
    $router->get('whisper/list', 'WhisperController@data')->name('admin.getWhispers');
    $router->post('whisper/create', 'WhisperController@store')->name('admin.addWhisper');
    $router->put('whisper/edit/{id}', 'WhisperController@update')->name('admin.editWhisper');
    $router->delete('whisper/delete', 'WhisperController@destroy')->name('admin.delWhisper');
    // 留言操作
    $router->get('message/list', 'MessageController@data')->name('admin.getMessages');
    $router->post('message/create', 'MessageController@store')->name('admin.addMessage');
    $router->put('message/edit/{id}', 'MessageController@update')->name('admin.editMessage');
    $router->delete('message/delete', 'MessageController@destroy')->name('admin.delMessage');
    // 友链操作
    $router->get('link/list', 'LinkController@data')->name('admin.getLinks');
    $router->post('link/create', 'LinkController@store')->name('admin.addLink');
    $router->put('link/edit/{id}', 'LinkController@update')->name('admin.editLink');
    $router->delete('link/delete', 'LinkController@destroy')->name('admin.delLink');
    // 相册操作
    $router->get('travel/list', 'TravelController@data')->name('admin.getTravels');
    $router->post('travel/create', 'TravelController@store')->name('admin.addTravel');
    $router->put('travel/edit/{id}', 'TravelController@update')->name('admin.editTravel');
    $router->delete('travel/delete', 'TravelController@destroy')->name('admin.delTravel');
    // 照片操作
    $router->get('photo/list', 'PhotoController@data')->name('admin.getPhotos');
    $router->post('photo/create', 'PhotoController@store')->name('admin.addPhoto')->middleware('throttle:1000,1');
    $router->put('photo/edit/{id}', 'PhotoController@update')->name('admin.editPhoto');
    $router->delete('photo/delete', 'PhotoController@destroy')->name('admin.delPhoto');
    // 模板操作
    $router->get('template/list', 'TemplateController@data')->name('admin.getTemplates');
    $router->post('template/create', 'TemplateController@store')->name('admin.addTemplate');
    $router->put('template/edit/{id}', 'TemplateController@update')->name('admin.editTemplate');
    $router->delete('template/delete', 'TemplateController@destroy')->name('admin.delTemplate');
    // 用户操作
    $router->get('front/list', 'FrontUserController@data')->name('admin.getFrontUsers');
    $router->put('front/edit/{id}', 'FrontUserController@update')->name('admin.editFrontUser');
    $router->delete('front/delete', 'FrontUserController@destroy')->name('admin.delFrontUser');
    // 管理员操作
    $router->get('administrator/list', 'AdministratorController@data')->name('admin.getAdministrators');
    $router->post('administrator/create', 'AdministratorController@store')->name('admin.addAdministrator');
    $router->put('administrator/edit/{id}', 'AdministratorController@update')->name('admin.editAdministrator');
    $router->delete('administrator/delete', 'AdministratorController@destroy')->name('admin.delAdministrator');
    // 日志操作
    $router->get('logs/list', 'LogController@data')->name('admin.getLogs');
    $router->delete('logs/delete', 'LogController@destroy')->name('admin.delLog');
});
