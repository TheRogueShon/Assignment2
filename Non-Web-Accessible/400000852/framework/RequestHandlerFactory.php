<?php
namespace Quwi\framework;

class RequestHandlerFactory implements RequestHandlerFactory_Interface
{
    public static function makeRequestHandler(string $request = 'index') : PageController_Command_Abstract
    {
        if(preg_match('/\W/', $request)) {
            throw new \Exception("illegal characters in request");
        }
        $class = "Apps\\handlers\\" . UCFirst(strtolower($request)) . 'Controller';
        if(!class_exists($class)){
            throw new \Exception("No request handler class '$class' located ");
        }

        $cmd = new $class();
        return $cmd;
    }
}