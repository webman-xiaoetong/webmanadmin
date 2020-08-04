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
//        support\middleware\StaticFile::class,
//        support\middleware\AuthCheckTest::class,
//        support\middleware\AccessControlTest::class,
    ],

    //各个模块的中间件配置
    'web' => [

    ],

    'behind' => [

    ],

    'api' => [
//        support\middleware\ApiOnly::class,
    ]

];