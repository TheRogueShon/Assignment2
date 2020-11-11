<?php
namespace Quwi\framework;

interface RequestHandlerFactory_Interface
{
    public static function makeRequestHandler(string $request='default') : PageController_Command_Abstract;
}