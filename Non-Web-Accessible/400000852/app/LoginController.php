<?php

namespace Apps\handlers;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;

class LoginController extends PageController_Command_Abstract
{
    public function run(){
        $v = new View();
        $v->setTemplate(TPL_DIR . '/login.tpl.php');

        $this->setModel(new \LoginModel());
        $this->setView ($v);

        $this->model->attach($this->view);
        $data = $this->model->getAll();
        
        $this->model->updateChangedData($data);

        $this->model->notify();
    }
    public function execute(CommandContext $context) : bool
    {
        $this->data = $context;
        $this->run();
        return true;
    }
}