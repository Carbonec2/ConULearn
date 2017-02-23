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
    
    public function testDucplicateUsername() {
        $ov = new stdClass();
        $ov->user = 'user2';
        $ov->password = 'user2';
        $ov->Rights_id = 1;
        
        UserDAO::insert($ov);
        
        $o = new stdClass();
        $o->user = 'user2';
        $o->password = 'user2';
        $o->Rights_id = 1;
        
        $result = UserDAO::insert($o);
        
        $this->assertTrue($result->error->ok);
    }

}
