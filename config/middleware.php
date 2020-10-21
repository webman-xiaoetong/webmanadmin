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

return [

    //全局中间件
    '' => [
        support\middleware\StaticFile::class,
//        support\middleware\AuthCheckTest::class,
//        support\middleware\ApiCrossCheck::class,
    ],

    // api应用中间件(应用中间件仅在多应用模式下有效)
    'api' => [
//        support\middleware\ApiCrossCheck::class,
//        support\middleware\ApiAuthCheck::class,
    ],

    'behind' => [
        support\middleware\BehindAuthCheck::class,
    ],

    'web' => [
        //support\middleware\ApiAuthCheck::class,
    ],

];