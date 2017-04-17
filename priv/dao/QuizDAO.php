<?php

class QuizDAO implements DAO
{
    
    public static function getAllFromId($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT * FROM Quiz WHERE id = :Quiz_id');

        $sql->bindValue(':Quiz_id', $ov->Quiz_id);

        $sql->execute();
        
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    
    //Added this function to get all the quizzes of a course
    public static function getAllFromCourseIdStudent($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT q.id, q.name, q.date, qs.submitted FROM Quiz q JOIN QuizStudent qs ON q.id = qs.Quiz_id WHERE q.Course_id = :Course_id AND qs.User_id = :User_id');
        
        $sql->bindValue(':Course_id', $ov->Course_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
    
    //Added this function to get all the quizzes of a course
    public static function getAllFromCourseId($ov) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            name,
            date, 
            Course_id 
            FROM Quiz 
            WHERE Course_id = :Course_id'
        );

        $sql->bindValue(':Course_id', $ov->Course_id);

        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
    
    //Added this to remove by id
    public static function remove($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('DELETE FROM QuizStudent WHERE Quiz_id = :id');
        
        $sql->bindValue(':id', $object->id);

        $sql->execute();
        
        $sql = $conn->prepare('DELETE FROM QuizAnswerStudent WHERE Quiz_id = :id');
        
        $sql->bindValue(':id', $object->id);

        $sql->execute();
        
        $sql = $conn->prepare('DELETE FROM QuizQuestion WHERE Quiz_id = :id');
        
        $sql->bindValue(':id', $object->id);

        $sql->execute();
        
        $sql = $conn->prepare('DELETE FROM Quiz WHERE id = :id');
        
        $sql->bindValue(':id', $object->id);

        $sql->execute();
        
        return true;
    }

    public static function get($id) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare(
            'SELECT 
            id, 
            name,
            date, 
            Course_id 
            FROM Quiz 
            WHERE id = :id'
        );

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, name, date, Course_id FROM Quiz ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'INSERT INTO Quiz (Course_id, date, name) 
            VALUES (:Course_id, :date, :name)'
        );
        
        $sql->bindValue(':name', $object->name);
        $sql->bindValue(':date', $object->date);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        $sql = $conn->prepare('select * from Quiz where id=LAST_INSERT_ID();');
        
        $sql->execute();
        
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function save($object) 
    {
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

    public static function update($object) 
    {
        $conn = pdo_connect();
        
        $sql = $conn->prepare(
            'UPDATE Quiz
            SET name = :name,
            date = :date,
            Course_id = :Course_id
            
            WHERE id = :id'
        );
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':name', $object->name);
        $sql->bindValue(':date', $object->date);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        return true;
    }
    
    public static function getMerge($o) 
    {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT * FROM Quiz q JOIN QuizAnswerStudent a ON q.id = a.Quiz_id WHERE q.id = :Quiz_id');

        $sql->bindValue(':Quiz_id', $o->Quiz_id);

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }

}

