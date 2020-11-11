<?php
namespace Quwi\framework;
include ROOT_DIR. '\autoload.php';
class View implements ObserverInterface
{
    private $data = [];
    private $tpl = '';

    public function setTemplate(string $filename){
        $this->tpl = $filename;
    }

    public function getTemplate(){
        return $this->tpl;
    }

    public function display(){
        extract($this->data);
        require $this->tpl;
    }

    public function getDisplay(){
        return $this->tpl;
    }

    public function addVar($name, $value){
        $this->data[$name] = $value;
    }

    public function getVar(){
        return $this->data;
    }

    public function update(Observable_Model $obs){
        $records = $obs->giveUpdate();
        foreach($records as $k=>$r){
            $this->addVar($k, $r);
        }
        $this->display();
    }

}