<?php
   use PHPUnit\Framework\TestCase;
   
    class CommandContextTest extends TestCase
    {
        private $context;

        public function setUp():void{
            $this->context = new CommandContext();
        }

        public function tearDown():void{

        }

        public function testModelValid(){
            $this->assertIsObject(new CommandContext, 'Command context is not an object!');
        }

        public function testGetErrors(){
            $array = $this->context->getErrors();
            $this->assertIsArray($array, 'Returned value is not an array');
        }
    }