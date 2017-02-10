<?php
class CourseUserDAO implements DAO {
    public static function get($id) {
        $conn = pdo_connect();
        $sql = $conn->prepare('SELECT 
            id, 
            Course_id
            User_id 
            FROM CourseUser 
            WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
public static function getAll($filters) {
        $conn = pdo_connect();
        $sql = $conn->prepare('SELECT id, Course_id, User_id FROM CourseUser ORDER BY id');
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
}

public static function insert($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO CourseUser (Course_id, User_id) 
            VALUES (:Course_id, :User_id)');
        
        $sql->bindValue(':Course_id',$object->Course_id);
        $sql->bindValue(':User_id', $object->User_id);
        
        $sql->execute();
        
        return true;
    }

public static function save($object) {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                CourseUserDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                CourseUserDAO::update($object);
            } else {
                CourseUserDAO::insert($object);
            }
        }
    }
    public static function update($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE CourseUser
            SET Course_id = :Course_id,
            User_id = :User_id
            
            WHERE id = :id');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':Course_id',$object->Course_id);
        $sql->bindValue(':User_id', $object->User_id);
        
        $sql->execute();
        
        return true;
    }
}
