<?php

class QuizAnswerStudentDAO implements DAO
{
    
    //function to get all from student 
    public static function getAllFromUserId($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            QuizQuestion_id,
            User_id,
            answer,
            FROM QuizAnswerStudent 
            WHERE User_id = :User_id'
        );

        $sql->bindValue(':User_id', $ov->User_id);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
    
    //function to get all from question 
    public static function getAllFromQuizQuestionId($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            *
            FROM QuizAnswerStudent
            WHERE QuizQuestion_id = :QuizQuestion_id AND User_id = :User_id'
        );

        $sql->bindValue(':QuizQuestion_id', $ov->QuizQuestion_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    public static function get($id) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            QuizQuestion_id,
            User_id,
            answer,
            FROM QuizAnswerStudent 
            WHERE id = :id'
        );

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }


    public static function getAll($filters) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, QuizQuestion_id, User_id, answer FROM QuizAnswerStudent ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO QuizAnswerStudent (Quiz_id, QuizQuestion_id, User_id, answer) VALUES (:Quiz_id, :QuizQuestion_id, :User_id, :answer)');
        
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        $sql->bindValue(':QuizQuestion_id', $object->QuizQuestion_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);
        $sql->bindValue(':answer', $object->answer);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) 
    {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                QuizAnswerStudentDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                QuizAnswerStudentDAO::update($object);
            } else {
                QuizAnswerStudentDAO::insert($object);
            }
        }
    }

    public static function update($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'UPDATE QuizAnswerStudent
            SET QuizQuestion_id = :QuizQuestion_id ,
            User_id = :User_id,
            answer= :answer
      
            WHERE id = :id'
        );
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':QuizQuestion_id', $object->QuizQuestion_id);
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':answer', $object->answer);
        
        $sql->execute();
        
        return true;
    }

}

