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

namespace support\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

class BehindAuthCheck implements MiddlewareInterface
{

    //不需要验证的控制器
    private const CONTROLLER = [
        'Passport'
    ];

    public function process(Request $request, callable $next): Response
    {
        $controller = explode('\\', $request->controller);
        $controller_name = array_pop($controller);

        $session_prefix = config('session.behind_prefix');

        $user = $request->session()->get($session_prefix . 'user');
        if (!$user && !in_array($controller_name, self::CONTROLLER)) {
            return redirect('/behind/login');
        }

        return $next($request);
    }
}