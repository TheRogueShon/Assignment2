<?php
namespace Quwi\framework;

abstract class FrontController_Abstract
{
    protected $reqHandler = null;

    abstract public static function run();

    abstract protected function init();

    abstract protected function handleRequest();


}