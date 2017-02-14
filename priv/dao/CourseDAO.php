<?php

class CourseDAO implements DAO {
    
    //Added this function to get all the courses of a teacher
    public static function getAllFromUserId($ov) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id, 
            name,
            description, 
            User_id 
            FROM Course 
            WHERE User_id = :User_id');

        $sql->bindValue(':User_id', $ov->User_id);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get($id) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id, 
            name,
            description, 
            User_id 
            FROM Course 
            WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, name, description, User_id FROM Course ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO Course (id, name, description, User_id) 
            VALUES (:id, :name, :description, :User_id)');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':name',$object->name);
        $sql->bindValue(':description', $object->description);
        $sql->bindValue(':User_id', $_SESSION['userId']);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                CourseDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                CourseDAO::update($object);
            } else {
                CourseDAO::insert($object);
            }
        }
    }

    public static function update($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE Course
            SET name = :name,
            description = :description,
            User_id = :User_id
            
            WHERE id = :id');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':name',$object->name);
        $sql->bindValue(':description', $object->description);
        $sql->bindValue(':User_id', $object->User_id);
        
        $sql->execute();
        
        return true;
    }

}
