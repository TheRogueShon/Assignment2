<?php
   use PHPUnit\Framework\TestCase;
   
    class ResponseHandlerTest extends TestCase
    {
        private $response;

        public function setUp():void{
            $this->response = new ResponseHandler();
        }

        public function tearDown():void{

        }

        public function testResponseHandlerValid(){
            $this->assertIsObject(new ResponseHandler, 'ResponseHandler is not an object!');
        }

        public function giveHeaderTest(){
            $head = $this->response->giveHeader();
            $this-assertIsObject($head, 'Head is not an object');
        } 
    }