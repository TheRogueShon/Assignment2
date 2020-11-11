<?php
namespace Quwi\framework;

abstract class PageController_Command_Abstract implements Command_Interface
{
    protected $model = null;
    protected $view = null;

    public function setModel(Observable_Model $model){
        $this->model = $model;
    }

    public function setView(View $view){
        $this->view = $view;
    }

    public function getModel(){
        return $this->model;
    }

    public function getView(){
        return $this->view;
    }

    abstract public function run();

    abstract public function execute(CommandContext $context) : bool;
}