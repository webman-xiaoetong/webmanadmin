<?php


namespace support\middleware;


use Casbin\Enforcer;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

class PermissionCheck implements MiddlewareInterface
{

    public function process(Request $request, callable $next): Response
    {
        $uid = $request->session()->get('uid', 0);

        $sub = $uid; // the user that wants to access a resource.
        $obj = $request->uri(); // the resource that is going to be accessed.
        $act = $request->method(); // the operation that the user performs on the resource.

        $e = new Enforcer(config_path() . "/rbac_model.conf", config_path() . "/policy.csv");
        if ($e->enforce($sub, $obj, $act) === true) {
            // permit alice to read data1
            return $next($request);
        } else {
            // deny the request, show an error
            return response()->withStatus(401)->withBody("无权限");
        }
    }
}