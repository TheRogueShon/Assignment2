<?php
   use PHPUnit\Framework\TestCase;
   
    class RequestHandlerFactoryTest extends TestCase
    {
        private $request;

        public function setUp():void{
            $this->request = new RequestHandlerFactory();
        }

        public function tearDown():void{

        }

        public function testResponseHandlerValid(){
            $this->assertIsObject(new RequestHandlerFactory, 'RequestHandlerFactory is not an object!');
        }

        public function testRequestHandlerStaticMethod()
        {
            $method = new ReflectionMethod('RequestHandlerFactory', 'makeRequestHandler');
            $this->assertTrue($method->isStatic(), 'Method makeRequestHandler exists but is not static');
        }
    }