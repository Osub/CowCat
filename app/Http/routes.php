<?php
Route::get('/', function () {
    return redirect('backend/index/');
});

Route::get('/wechat','WechatController@index');

//Route::group( ['prefix'=>'api/v1','namespace'=>'Api'],function(){
//    Route::resource( 'form','FormController'  );
//}  );

$api = app('Dingo\Api\Routing\Router');
$api->version('v1',function($api){
    $api->group(['namespace'=>'App\Api\Controllers'],function($api){
        $api->post('user/login','AuthController@authenticate');
        $api->post('application/userregister','AuthController@userRegister');
        $api->post('application/appregister','AuthController@appRegister');
        $api->group(['middleware'=>'jwt.auth'],function($api){
            $api->get('form','FormController@index');
        });
    });
});

/* 后台登录模块 */
Route::group(['namespace' => 'Auth'], function () {
    require_once __DIR__ . '/Routes/auth.php';
});

/* 前端管理模块 */
Route::group(['namespace' => 'Frontend'], function () {
    require_once __DIR__ . '/Routes/frontend.php';
});

/* 后台管理模块 */
Route::group([
    'prefix'     => 'backend',
    'namespace'  => 'Backend',
    'middleware' => ['authenticate', 'authorize'],
], function () {
    require_once __DIR__ . '/Routes/backend.php';
});


