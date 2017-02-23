<?php

include_once(dirname(__FILE__).'/../backendIncludeScript.php');

class PHPTest extends PHPUnit_Framework_TestCase {

    public function testSignIn() {
        $ov = new stdClass();
        $ov->user = 'user1';
        $ov->password = 'user1';
        $ov->Rights_id = 1;
        
        $result = UserDAO::insert($ov);
        
        $this->assertTrue($result->error->ok);
    }

}
