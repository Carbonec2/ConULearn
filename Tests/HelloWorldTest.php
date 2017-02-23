<?php

include_once(dirname(__FILE__).'/../backendIncludeScript.php');

class PHPTest extends PHPUnit_Framework_TestCase {

    public function test()
     {
         $this->assertEquals('a', 'a');
     }

}
