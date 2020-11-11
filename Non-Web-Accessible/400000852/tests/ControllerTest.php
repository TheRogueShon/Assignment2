<?php
   use PHPUnit\Framework\TestCase;
   
    class ControllerTest extends TestCase
    {
        private $controller;
        protected $model = null;
        protected $view = null;

        public function setUp():void{
            $this->controller = new IndexController();
        }

        public function tearDown():void{

        }

        public function testControllerValid(){
            $this->assertIsObject(new IndexController, 'Controller is not an object!');
        }

        public function testSetModel(){
            $this->assertNull($this->model, 'Model is not assigned to null!');
            $this->controller->setModel(new IndexModel);
            $modelObject = $this->controller->getModel();
            $this->assertIsObject($modelObject);
        }

        public function testSetView(){
            $this->assertNull($this->view, 'View is not assigned to null!');
            $this->controller->setView(new View);
            $viewObject = $this->controller->getView();
            $this->assertIsObject($viewObject);
        }

        public function testRun(){
            $class = new ReflectionClass('IndexController');
            $this->assertTrue($class->hasMethod('run'));
        }
    } 