<?php

class QuestionsAnswersDAO implements DAO
{

    public static function get($id) 
    {

        $conn = pdo_connect();

        $sql = $conn->prepare('SELECT id, question, answer, Course_id, User_id FROM QuestionsAnswers WHERE id = :id');

        $sql->bindValue(':id', $id);

        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function getAll($filters) 
    {

        $conn = pdo_connect();

        $requestString = '';
        
        if (isset($filters->User_id) && (int)$filters->User_id == -1) {
            $filters->User_id = $_SESSION['userId'];
        }

        if (isset($filters->Course_id)) {
            $requestString .= ' AND QuestionsAnswers.Course_id = :Course_id';
        }

        if (isset($filters->User_id)) {
            $requestString .= ' AND QuestionsAnswers.User_id = :User_id';
        }

        $sql = $conn->prepare(
            'SELECT QuestionsAnswers.id AS id, 
            QuestionsAnswers.question AS question, 
            QuestionsAnswers.answer AS answer, 
            QuestionsAnswers.User_id AS User_id, 
            QuestionsAnswers.Course_id AS Course_id,
            User.user AS user
            FROM QuestionsAnswers AS QuestionsAnswers 
            LEFT JOIN User AS User ON User.id = QuestionsAnswers.User_id
            WHERE 1 = 1 ' . $requestString
        );

        if (isset($filters->Course_id)) {
            $sql->bindValue(':Course_id', $filters->Course_id);
        }

        if (isset($filters->User_id)) {
            $sql->bindValue(':User_id', $filters->User_id);
        }

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($object) 
    {
        $conn = pdo_connect();
        
        if (isset($object->User_id) && (int)$object->User_id == -1) {
            $object->User_id = $_SESSION['userId'];
        }

        $sql = $conn->prepare(
            'INSERT INTO QuestionsAnswers 
            (question, answer, Course_id, User_id) 
            VALUES 
            (:question, :answer, :Course_id, :User_id)'
        );

        $sql->bindValue(':question', $object->question);
        $sql->bindValue(':answer', $object->answer);
        $sql->bindValue(':Course_id', $object->Course_id);
        $sql->bindValue(':User_id', $object->User_id);

        $sql->execute();

        return $conn->lastInsertId();
    }

    public static function save($object) 
    {
        if (isset($object->id)) {
            return QuestionsAnswersDAO::update($object);
        } else {
            return QuestionsAnswersDAO::insert($object);
        }
    }

    public static function update($object) 
    {
        $conn = pdo_connect();
        
        if (isset($object->User_id) && (int)$object->User_id == -1) {
            $object->User_id = $_SESSION['userId'];
        }
        
        $sql = $conn->prepare(
            'UPDATE QuestionsAnswers SET question = :question, 
            answer = :answer, User_id = :User_id, Course_id = :Course_id
            WHERE id = :id'
        );
        
        $sql->bindValue(':id', $object->id);
        $sql->bindValue(':question', $object->question);
        $sql->bindValue(':answer', $object->answer);
        $sql->bindValue(':User_id', $object->User_id);
        $sql->bindValue(':Course_id', $object->Course_id);
        
        $sql->execute();
        
        return $object->id;
    }

}
