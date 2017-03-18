<?php

class QuizDAO implements DAO {
    
    //Added this function to get all the quizzes of a course
    public static function getAllFromCourseId($ov) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id, 
            name,
            date, 
            Course_id 
            FROM Quiz 
            WHERE Course_id = :Course_id');

        $sql->bindValue(':Course_id', $ov->Course_id);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get($id) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id, 
            name,
            date, 
            Course_id 
            FROM Quiz 
            WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, name, date, Course_id FROM Quiz ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO Quiz (id, name, date, Course_id) 
            VALUES (:id, :name, :date :Course_id)');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':name',$object->name);
        $sql->bindValue(':date', $object->date);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                QuizDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                QuizDAO::update($object);
            } else {
                QuizDAO::insert($object);
            }
        }
    }

    public static function update($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE Quiz
            SET name = :name,
            date = :date,
            Course_id = :Course_id
            
            WHERE id = :id');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':name',$object->name);
        $sql->bindValue(':date', $object->date);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        return true;
    }

}

