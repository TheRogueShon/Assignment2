<?php
    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase
    {
        private $model;

        public function setUp():void{
            $this->model = new IndexModel();
        }

        public function tearDown():void{

        }

        public function testModelValid(){
            $this->assertIsObject(new IndexModel, 'Model is not an object!');
        }

        public function testGetAll(){
            $this->assertFileExists(DATA_DIR . '/courses.json', 'File does not exist!');
            $data = $this->model->getAll();
            $this->assertIsArray($data, 'Data is not an array!');
        }

        public function testGetRecord(){
            $this->assertFileExists(DATA_DIR . '/courses.json', 'File does not exist!');
            $record = $this->model->getRecord('1234');
            $this->assertIsArray($record, 'Record is not an array!');
        }
    }