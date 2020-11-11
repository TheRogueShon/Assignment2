<?php
namespace Quwi\framework;
abstract class Observable_Model extends ModelAbstract implements ObservableInterface
{
    protected $observers = [];

    protected $updatedData = [];

    public function attach(ObserverInterface $o){
        $this->observers[] = $o;
    }

    public function detach(ObserverInterface $o){
        $this->observers = array_filter($this->observers, function ($a) use ($o){
                                                            return (! ($a === $observer ));
                                                        });
    }

    public function notify(){
        foreach($this->observers as $ob){
            $ob->update($this);
        }
    }

    public function giveUpdate(){
        return $this->updatedData;
    }

    public function updateChangedData($newData){
        $this->updatedData = $newData;
    }

    abstract public function getAll() : array;

    abstract public function getRecord(string $id) : array;
}