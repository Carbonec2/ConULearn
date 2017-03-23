<?php

class QuizStudentDAO implements DAO {
    public static function insertCurrentUserId($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO QuizStudent (User_id, Quiz_id) 
            VALUES (:User_id, :Quiz_id)');
        
        $sql->bindValue(':User_id', $_SESSION['userId']);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function get($id) {
        
    }

    public static function getAll($filters) {
        
    }
    
    public static function updateCurrentUser($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE QuizStudent SET submitted = "1" WHERE User_id = :User_id AND Quiz_id = :Quiz_id');
        
        $sql->bindValue(':User_id', $_SESSION['userId']);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function insert($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO QuizStudent (User_id, Quiz_id) 
            VALUES (:User_id, :Quiz_id)');
        
        $sql->bindValue(':User_id',$object->User_id);
        $sql->bindValue(':Quiz_id', $object->Quiz_id);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) {
        
    }

    public static function update($object) {
        
        
        return true;
    }

}
