<?php 
namespace Quwi\framework;
class ResponseHandler implements ResponseHandler_Interface
{
    protected $body = [];
    private static $instance;

    private function __construct(ResponseHeader $head, ResponseState $state, ResponseLogger $log)
    {
        $this->body['header'] = $head;
        $this->body['state'] = $state;
        $this->body['log'] = $log;
    }

    public static function setInstance(ResponseHeader $head, ResponseState $state, ResponseLogger $log)
    {
        if (empty(self::$instance)) {
            self::$instance = new ResponseHandler($head, $state, $log);
        }
    }

    public static function getInstance(){
        if (!empty(self::$instance)) {
            return self::$instance;
        }
    }

    public function giveHeader() : ResponseHeader
    {
        return clone $this->body['header'];
    }

    public function giveState() : ResponseState
    {
        return clone $this->body['state'];
    }

    public function giveLogger() : ResponseLogger
    {
        return clone $this->body['log'];
    }
}