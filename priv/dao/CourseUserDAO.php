<?php

class CourseUserDAO implements DAO{
    
    
    public static function get($id) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT User_id, Course_id FROM CourseUser WHERE id = :id');
        
        $sql->bindValue(':id', $id);
        
        $sql->execute();
        
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) {
        
    }

    public static function insert($object) {
        
    }

    public static function save($object) {
        
    }

    public static function update($object) {
        
    }

}