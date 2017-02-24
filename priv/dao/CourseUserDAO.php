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

    public static function getAllFromUser($ov) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT * FROM CourseUser u JOIN Course c ON u.Course_id = c.id WHERE u.User_id = :User_id;');

        $sql->bindValue(':User_id', $_SESSION['userId']);

        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
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

        $sql = $conn->prepare('SELECT id, Course_id, User_id FROM CourseUser WHERE User_id = :User_id AND Course_id = :Course_id');

        $sql->bindValue(':Course_id', $object->Course_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);

        $sql->execute();
        $result = $sql->fetchAll();
        
        $returnObject = new stdClass();
        $returnObject->error = new stdClass();
        
        if (!$result) {
            $sql = $conn->prepare('INSERT INTO CourseUser (Course_id, User_id) 
            VALUES (:Course_id, :User_id)');

            $sql->bindValue(':Course_id', $object->Course_id);
            $sql->bindValue(':User_id', $_SESSION['userId']);

            $sql->execute();
            $returnObject->error->ok = true;
        }else{
            $returnObject->error->ok = false;
        }
        
        return $returnObject;
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

        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':Course_id', $object->Course_id);
        $sql->bindValue(':User_id', $object->User_id);

        $sql->execute();

        return true;
    }

}
