<?php

namespace Apps\handlers;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;

class SignupController extends PageController_Command_Abstract
{
    private $data = null;

    public function run(){
        $v = new View();
        $v->setTemplate(TPL_DIR . '/signup.tpl.php');

        $this->setModel(new \SignupModel());
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