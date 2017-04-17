<?php

class QuizStudentDAO implements DAO
{
    public static function insertCurrentUserId($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'INSERT INTO QuizStudent (User_id, Quiz_id) 
            VALUES (:User_id, :Quiz_id)'
        );
        
        $sql->bindValue(':User_id', $_SESSION['userId']);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function get($id) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            submitted,
            User_id, 
            Quiz_id 
            FROM QuizStudent 
            WHERE id = :id'
        );

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
        
    }

    public static function getAll($filters) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, submitted, User_id, Quiz_id FROM QuizStudent ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;

        
    }
    
    public static function updateCurrentUser($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE QuizStudent SET submitted = "1" WHERE User_id = :User_id AND Quiz_id = :Quiz_id');
        
        $sql->bindValue(':User_id', $_SESSION['userId']);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function insert($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'INSERT INTO QuizStudent (User_id, Quiz_id) 
            VALUES (:User_id, :Quiz_id)'
        );
        
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) 
    {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                QuizStudentDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                QuizStudentDAO::update($object);
            } else {
                QuizStudentDAO::insert($object);
            }
        }

        
    }

    public static function update($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'UPDATE QuizStudent
            SET submitted = :submitted,
            User_id = :User_id,
            Quiz_id = :Quiz_id
            
            WHERE id = :id'
        );
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':submitted', $object->submitted);
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;

        
        
        return true;
    }

}
