<?php
use PHPUnit\Framework\TestCase;

class ObservableModelTest
{
    public function modelObjectCreatedTest(){

    }

    public function checkObservableAttachTest(){

    }

    public function checkObservableDetachTest(){

    }

    public function getAllTest(){
        $model = new Observable_Model();
        $json = $model->getAll();
        $this->assertCount(1, $json[0]);
    }

    public function getRecordTest(string $id){

    }
}