<?php

class AnnouncementsDAO implements DAO {
    
    //Added this function to get all the announcements of a teacher
    public static function getAllFromUserId($ov) {
        $conn = pdo_connect();
        
        if(empty($ov)){
            $ov = new stdClass();
            
            $ov->User_id = $_SESSION['userId'];
        }
        if(empty($ov->User_id)){
            $ov->User_id = $_SESSION['userId'];
        }

        $sql = $conn->prepare('SELECT 
            id, 
            Course_id,
		User_id,
		description
            FROM Announcements 
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
            Course_id,
            User_id,
		 description,  
            FROM Announcements 
            WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, 
            Course_id, 
            User_id,      
            description 
            FROM Announcements 
            ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function insert($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('INSERT INTO Announcements (id,  Course_id, User_id, description) 
            VALUES (:id, :Course_id, :User_id, :description)');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':Course_id',$object->Course_id);
        $sql->bindValue(':User_id', $_SESSION['userId']);			   
        $sql->bindValue(':description', $object->description);
        
        $sql->execute();
        
        return true;
    }

    public static function save($object) {
        if (is_array($object)) {
            foreach ($object AS $entry) {
                AnnouncementsDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                AnnouncementsDAO::update($object);
            } else {
                AnnouncementsDAO::insert($object);
            }
        }
    }

    public static function update($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE Announcements
            SET Course_id = :Course_id,
        	  User_id = :User_id,
		  description = :description,
           
            WHERE id = :id');
        
        $sql->bindValue(':id',$object->id);
        $sql->bindValue(':Course_id',$object->Course_id);
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':description', $object->description);

        $sql->execute();
        
        return true;
    }

}
