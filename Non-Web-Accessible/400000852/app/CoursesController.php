<?php

namespace Apps\handlers;
use Quwi\framework\CommandContext;
use Quwi\framework\PageController_Command_Abstract;
use Quwi\framework\View;
use Quwi\framework\FrontController;

class CoursesController extends PageController_Command_Abstract
{
    public function run(){
        $v = new View();
        $v->setTemplate(TPL_DIR . '/courses.tpl.php');

        $this->setModel(new \CoursesModel());
        $this->setView ($v);
        
        //$session->add('user','testuser');
        
        if(isset($_SESSION['user'])){
            $this->model->attach($this->view);
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