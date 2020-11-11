<?php
    use PHPUnit\Framework\TestCase;

    class SessionTest extends TestCase
    {
        private $session;

        public function setUp():void{
            $this->session = new Session();
        }

        public function tearDown():void{

        }

        public function testSessionValid()
        {
            $this->assertIsObject(new Session, 'Not an object');
        }

        public function testSessionHasStaticMethodCreate()
        {
            $method = new ReflectionMethod('Session', 'create');
            $this->assertTrue($method->isStatic(), 'Method create exists but is not static');
        }

        public function testSessionContainerCreated()
        {
            Session::create();
            $this->assertArrayHasKey('container', $_SESSION);
            $this->assertIsArray($_SESSION['container']);
        }
        
        public function testSessionHasMethodDestroy()
        {
            $class = new ReflectionClass('Session');
            $this->assertTrue($class->hasMethod('destroy'));
        }

        public function testAdd()
        {   
            Session::create();
            $this->session->add('user', 'John');
            $sessValue = $this->session->getAdd('user');
            $this->assertEquals('John', $sessValue);
        }

        public function testRemove()
        {
            Session::create();
            $this->session->add('user', 'John');
            $this->session->remove('user');
            $removed = $this->session->see('user');
            $this->assertNull($removed);
        }

        public function testAccessible()
        {
            Session::create();
            $access = $this->session->accessible('testuser', 'profile');
            $this->assertTrue($access);
        }
    }