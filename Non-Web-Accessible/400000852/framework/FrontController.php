<?php
namespace Quwi\framework;

class FrontController extends FrontController_Abstract
{
    /*
    private function __construct(){

    }

    private function __clone(){

    } */

    public static function run(){
        $controller = new FrontController();
        $controller->init();
        $controller->handleRequest();
    }

    protected function init(){
        $response = ResponseHandler::getInstance();
        $validator = Validator::getInstance();
        $session = Session::getInstance();

        $session::create();
    }

    protected function handleRequest(){
        $context = new CommandContext();
        $get = $context->get('get');
        //$req = (string)   $context->get('get');// find better way to make this into a string
        $req = $get['controller'];
        if($req !== null){
            $handler = RequestHandlerFactory::makeRequestHandler($req);
        }
        else{
            $handler = RequestHandlerFactory::makeRequestHandler();//$req was in the brackets
        }   
        
        
        if($handler->execute($context) === false){
            //error handling goes here
        }
    }
}