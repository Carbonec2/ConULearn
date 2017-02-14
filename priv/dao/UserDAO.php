<?php

class UserDAO implements DAO {

    static function get($id) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id, 
            email,
            user, 
            passwordMD5 
            FROM User 
            WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters = NULL) {
        //TODO: We can add filters later, if needed

        $conn = pdo_connect();

        //TODO: Without limit, there is a risk of overflow, we will need to add paging later if needed
        $sql = $conn->prepare('SELECT 
            id, 
            user, 
            passwordMD5 
            FROM User');

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function insert($ov){
        $conn = pdo_connect();
        
        $sql = $conn->prepare('SELECT * FROM User 
                               WHERE user = :user');

        $sql->bindValue(':user', $ov->user);

        $sql->execute();
        
        $result = $sql->fetchAll();
        
        if(!$result){
            $sql = $conn->prepare('INSERT INTO User (user, passwordMD5, Rights_id) 
                                    VALUES (:user, :passwordMD5, :Rights_id) ');
            
        $sql->bindValue(':user', $ov->user);
        $sql->bindValue(':passwordMD5', md5($ov->password));
        $sql->bindValue(':Rights_id', $ov->rightsid);
        
        $sql->execute();
        }
        
        $returnObject = new stdClass();

        $returnObject->error = new stdClass();

        if ($result) {
            //Return a non-existing user error
            $returnObject->error->ok = false;
            $returnObject->error->existingUser = true;

            return $returnObject;
        }else{
            $returnObject->error->ok = true;
            //Return OK
            return $returnObject;
        }
            
    }
/*
    public static function insert($object) {

        //If we have an array
        if (is_array($object)) {
            foreach ($object AS $entry) {
                insert($entry);
            }
        } else {
            //If we have a single object (stdClass), not an array
            $conn = pdo_connect();

            $sql = $conn->prepare('INSERT INTO User (user, email, passwordMD5) 
            VALUES (:user, :email, :passwordMD5)');

            $sql->bindValue(':user', $object->user);
            $sql->bindValue(':email', $object->email);
            $sql->bindValue(':passwordMD5', $object->passwordMD5);

            $sql->execute();
        }
    }
*/
    public static function save($object) {
        //If we have an array, we save the array, else we have an object, so we save the object itself
        if (is_array($object)) {
            foreach ($object AS $entry) {
                save($entry);
            }
        } else {
            if (!empty($entry->id)) {
                UserDAO::update($entry);
            } else {
                return UserDAO::insert($entry); //We return the created id
            }
        }
    }

    public static function update($object) {

        //If we have an array
        if (is_array($object)) {
            foreach ($object AS $entry) {
                UserDAO::update($entry);
            }
        } else {
            //If we have a single object (stdClass), not an array
            $conn = pdo_connect();

            $sql = $conn->prepare('UPDATE User 
                SET user = :user, 
                passwordMD5 = :passwordMD5
                WHERE id = :id'); //id is important, or else, we overwrite all the table!

            $sql->bindValue(':id', $object->id);
            $sql->bindValue(':user', $object->user);
            $sql->bindValue(':passwordMD5', $object->passwordMD5);

            $sql->execute();
        }
    }

    public static function checkUsernameAndPassword($ov) {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT 
            id,
            user, 
            passwordMD5,
            Rights_id
            FROM User 
            WHERE user = :user');

        $sql->bindValue(':user', $ov->user);

        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_OBJ);

        $returnObject = new stdClass();

        $returnObject->error = new stdClass();

        if (!$result) {
            //Return a non-existing user error
            $returnObject->error->ok = false;
            $returnObject->error->nonExistingUser = true;

            return $returnObject;
        }

        $returnObject->id = $result->id;
        $returnObject->user = $result->user;
        $returnObject->Rights_id = $result->Rights_id;

        if ($result->passwordMD5 == md5($ov->password)) {
            $returnObject->error->ok = true;
            //Return OK
            return $returnObject;
        }

        //Return wrong password error

        $returnObject->error->ok = false;
        $returnObject->error->wrongPassword = true;

        return $returnObject;
    }

}
