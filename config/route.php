<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Webman\Route;

/*
|--------------------------------------------------------------------------
| Behind Routes
|--------------------------------------------------------------------------
|
| 后台需要授权的路由
|
*/
Route::get('/behind/login', 'app\behind\controller\Passport@index');
Route::get('/behind/logout', 'app\behind\controller\Passport@logout');

//Route::any('/test', function ($request) {
//    return response('test');
//});


/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Api需要授权的路由
|
*/
//Route::get('/api', 'app\api\controller\Index@index');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 前台需要授权的路由
|
*/
Route::get('/', 'app\web\controller\Index@index');


/*
|--------------------------------------------------------------------------
| Unkonwn Routes
|--------------------------------------------------------------------------
|
| 兜底路由
|
*/
//Route::fallback(function () {
//    return response("route not found！");
//});
