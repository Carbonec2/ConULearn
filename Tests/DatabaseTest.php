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
        
        $this->assertFalse($result->error->ok);
    }
    
    public function testCourseCreation() {
        $_SESSION["userId"] = 1;
        
        $ov = new stdClass();
        
        $ov->id = '1';
        $ov->name = 'SOEN 341';
        $ov->description = 'This is a description of the course.';
        
        
        $result = CourseDAO::insert($ov);
                
        $this->assertTrue($result);
    }
    
    public function testAnnouncementCreation() {
        $_SESSION["userId"] = 1;
        
        $ov = new stdClass();
        
        $ov->id = '1';
        $ov->Course_id = '1';
        $ov->description = 'This is an announcement.';
        
        $result = AnnouncementsDAO::insert($ov);
        
        $this->assertTrue($result);
    }

}
