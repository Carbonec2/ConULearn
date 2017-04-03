<?php

class QuestionsAnswersDAO implements DAO {

    public static function get($id) {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, question, answer, CourseUser_id FROM QuestionsAnswers WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) {

        $conn = pdo_connect();

        $requestString = '';

        if (isset($filters->Course_id)) {
            $requestString += ' AND Course_id = :Course_id';
        }

        if (isset($filters->User_id)) {
            $requestString += ' AND User_id = :User_id';
        }

        $sql = $conn->prepare('SELECT id, question, answer, CourseUser_id 
            FROM QuestionsAnswers WHERE 1 = 1 ' . $requestString);

        if (isset($filters->Course_id)) {
            $sql->bindValue(':Course_id', $filters->Course_id);
        }

        if (isset($filters->User_id)) {
            $sql->bindValue(':User_id', $filters->User_id);
        }

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($object) {
        $conn = pdo_connect();

        $sql = $conn->prepare('INSERT INTO QuestionsAnswers 
            (question, answer, Course_id, User_id) 
            VALUES 
            (:question, :answer, :Course_id, :User_id)');

        $sql->bindValue(':question', $filters->question);
        $sql->bindValue(':answer', $filters->answer);
        $sql->bindValue(':Course_id', $filters->Course_id);
        $sql->bindValue(':User_id', $filters->User_id);

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($object) {
        if (isset($object->id)) {
            return QuestionsAnswersDAO::update($object);
        } else {
            return QuestionsAnswersDAO::insert($object);
        }
    }

    public static function update($object) {
        $conn = pdo_connect();
        
        $sql = $conn->prepare('UPDATE QuestionsAnswers SET question = :question, 
            answer = :answer, User_id = :User_id, Course_id = :Course_id
            WHERE id = :id');
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':question', $object->question);
        $sql->bindValue(':answer', $object->answer);
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        return $object->id;
    }

}
