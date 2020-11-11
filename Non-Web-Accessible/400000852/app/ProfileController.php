<?php

namespace Apps\handlers;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;

class ProfileController extends PageController_Command_Abstract
{
    public function run(){
        Session::create();

        $session = new Session();
        $session->add('user', 'testuser');
        $v = new View();
        $v->setTemplate(TPL_DIR . '/profile.tpl.php');

        $this->setModel(new \ProfileModel());
        $this->setView ($v);

        $this->model->attach($this->view);

        $user = $session->see('user');
        if($session->accessible($user, 'profile')){
            $data = $this->model->getAll();
        
            $this->model->updateChangedData($data);

            $this->model->notify();
        }
        else{
            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
        }

        
    }
    public function execute(CommandContext $context) : bool
    {
        $this->data = $context;
        $this->run();
        return true;
    }
}