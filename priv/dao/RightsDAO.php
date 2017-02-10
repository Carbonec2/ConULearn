<?php

class RightsDAO implements DAO {

    public static function get($id) {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, name FROM Rights WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        $result = $sql->fetch();

        return $result;
    }

    public static function getAll($filters) {
        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, name FROM Rights ORDER BY id');

        $sql->execute();

        $result = $sql->fetchAll();

        return $result;
    }

    public static function insert($object) {
        $conn = pdo_connect();

        $sql->prepare('INSERT INTO Rights (name) VALUES (:name)');
        
        $sql->bindValue(':name', $object->name);

        $sql->execute();

        return true;
    }

    public static function save($object) {

        if (is_array($object)) {
            foreach ($object AS $entry) {
                RightsDAO::save($entry);
            }
        } else {
            if (isset($object->id)) {
                RightsDAO::update($object);
            } else {
                RightsDAO::insert($object);
            }
        }
    }

    public static function update($object) {
        
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE Rights SET name = :name WHERE id = :id');
        
        $sql->bindValue(':name', $object->name);
        $sql->bindValue(':id', $object->id);
        
        $sql->execute();
        
        
    }

}
