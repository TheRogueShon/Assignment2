<?php
    use PHPUnit\Framework\TestCase;

    class ViewTest extends TestCase
    {
        private $view;

        public function setUp():void{
            $this->view = new View();
        }

        public function tearDown():void{

        }

        public function testViewValid(){
            $this->assertIsObject(new View, 'View is not an object!');
        }

        public function testSetTemplate(){
            $this->view->setTemplate('Something');
            $template = $this->view->getTemplate();
            $this->assertIsString($template);
        }

        public function testDisplay(){
            $this->view->setTemplate(TPL_DIR . '/login.tpl.php');
            $this->view->display();
            $displayString = $this->view->getDisplay();
            $this->assertIsString($displayString, 'Value is not a string!');
        }

        public function testAddVar(){
            $this->view->addVar('John', '31');
            $var = $this->view->getVar();
            $this->assertIsArray($var);
            $this->assertCount(1, $var);
        } 
    } 