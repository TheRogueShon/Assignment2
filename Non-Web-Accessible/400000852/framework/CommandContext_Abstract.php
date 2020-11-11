<?php
namespace Quwi\framework;

abstract class CommandContext_Abstract
{
    protected $data = [];
    protected $errors = [];

    public function __construct()
    {
        $this->data['post'] = $_POST;
        $this->data['get'] = $_GET;
        $this->data['params'] = [];
    }

    abstract public function add(string $key, $val);

    abstract public function get(string $key);

    abstract protected function setError($error);

    abstract public function getErrors() : array;
}