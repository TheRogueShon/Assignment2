<?php 
namespace Quwi\framework;

class CommandContext extends CommandContext_Abstract
{
    public function add(string $key, $val)
    {
        
    }

    public function get(string $key)
    {
        return $this->data['get'];
    }

    public function getErrors() : array
    {
        return [];
    }

    protected function setError($error)
    {

    }
}