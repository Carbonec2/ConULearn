<?php

class QuizQuestionDAO implements DAO
{
    
    public static function getMerge($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT * FROM QuizQuestion q JOIN QuizAnswerStudent a ON q.id = a.QuizQuestion_id WHERE q.Quiz_id = :Quiz_id and a.User_id = :User_id');							

        $sql->bindValue(':Quiz_id', $ov->Quiz_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
    
    //Added this function to get all the quiz questions of a quiz
    public static function getAllFromQuizId($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            question,
            prop1, 
            prop2, 
            prop3, 
            prop4, 
            prop5, 
            ans, 
            Quiz_id 
            FROM QuizQuestion 
            WHERE Quiz_id = :Quiz_id'
        );							

        $sql->bindValue(':Quiz_id', $ov->Quiz_id);

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
            question,
            prop1, 
            prop2, 
            prop3, 
            prop4, 
            prop5, 
            ans, 
            Quiz_id 
            FROM QuizQuestion 
            WHERE id = :id'
        );

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, question, prop1, prop2, prop3, prop4, prop5, ans, Quiz_id FROM QuizQuestion 	ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO QuizQuestion (Quiz_id, question, prop1, prop2, prop3, prop4, prop5, ans) VALUES (:Quiz_id, :question, :prop1, :prop2, :prop3, :prop4, :prop5, :ans)');
        
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        $sql->bindValue(':question', $object->question);
        $sql->bindValue(':prop1', $object->prop1);
        $sql->bindValue(':prop2', $object->prop2);
        $sql->bindValue(':prop3', $object->prop3);
        $sql->bindValue(':prop4', $object->prop4);
        $sql->bindValue(':prop5', $object->prop5);
        $sql->bindValue(':ans', $object->ans);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) 
    {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                QuizQuestionDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                QuizQuestionDAO::update($object);
            } else {
                QuizQuestionDAO::insert($object);
            }
        }
    }

    public static function update($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'UPDATE QuizQuestion
            SET question = :question,
            prop1 = :prop1,
            prop2 = :prop2,
            prop3 = :prop3,
            prop4 = :prop4,
            prop5 = :prop5,
            ans = :ans,
            Quiz_id = :Quiz_id
            
            WHERE id = :id'
        );
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':question', $object->question);
        $sql->bindValue(':prop1', $object->prop1);
        $sql->bindValue(':prop2', $object->prop2);
        $sql->bindValue(':prop3', $object->prop3);
        $sql->bindValue(':prop4', $object->prop4);
        $sql->bindValue(':prop5', $object->prop5);
        $sql->bindValue(':ans', $object->ans);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

}

