<?php

include_once(dirname(__FILE__).'/../backendIncludeScript.php');

class FunctionsTest extends PHPUnit_Framework_TestCase {

    public function testSignUp() {
        $ov = new stdClass();
        $ov->user = 'user1';
        $ov->password = 'user1';
        $ov->Rights_id = 1;
        
        $result = UserDAO::insert($ov); //PHP function of our project that is being tested
        
        $this->assertTrue($result->error->ok);
    }
    
    public function testDucplicateUsernameSignUp() {
        $ov = new stdClass();
        $ov->user = 'user2';
        $ov->password = 'user2';
        $ov->Rights_id = 1;
        
        UserDAO::insert($ov); //PHP function of our project that is being tested
        
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
        
        
        $result = CourseDAO::insert($ov); //PHP function of our project that is being tested
                
        $this->assertTrue($result);
    }
    
    public function testAnnouncementCreation() {
        $_SESSION["userId"] = 1;
        
        $ov = new stdClass();
        
        $ov->id = '1';
        $ov->Course_id = '1';
        $ov->description = 'This is an announcement.';
        
        $result = AnnouncementsDAO::insert($ov); //PHP function of our project that is being tested
        
        $this->assertTrue($result);
    }
    
    public function testQuizCreation() {
        $ov = new stdClass();
        
        $ov->name = 'Quiz 1';
        $ov->date = '2017-03-20';
        $ov->Course_id = '1';
        
        $object = QuizDAO::insert($ov); //PHP function of our project that is being tested
        
        if($object->id == '1'){
            $result = true;
        }else{
            $result = false;
        }
        
        $this->assertTrue($result);
    }
    
    public function testQuizQuestionCreation() {
        $ov = new stdClass();
        
        $ov->Quiz_id = '1';
        $ov->question = 'This is a question.';
        $ov->prop1 = 'This is a proposition 1.';
        $ov->prop2 = 'This is a proposition 2.';
        $ov->prop3 = 'This is a proposition 3.';
        $ov->prop4 = 'This is a proposition 4.';
        $ov->prop5 = 'This is a proposition 5.';
        $ov->ans = '3';
        
        $result = QuizQuestionDAO::insert($ov); //PHP function of our project that is being tested
        
        $this->assertTrue($result);
    }

}
