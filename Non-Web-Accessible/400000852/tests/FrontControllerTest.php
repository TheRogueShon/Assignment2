<?php
   use PHPUnit\Framework\TestCase;
   
    class FrontControllerTest extends TestCase
    {
        private $frontController;

        public function setUp():void{
            $this->frontController = new FrontController();
        }

        public function tearDown():void{

        }

        public function testFrontControllerValid()
        {
            $this->assertIsObject(new FrontController, 'FrontController is not an object');
        }

        public function testFrontControllerStaticMethod()
        {
            $method = new ReflectionMethod('FrontController', 'run');
            $this->assertTrue($method->isStatic(), 'Method run exists but is not static');
        }
    }