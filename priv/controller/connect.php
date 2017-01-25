<?php

class ConnectController {

    static function connect($ov) {

        $result = UserDAO::checkUsernameAndPassword($ov);

        if ($result->errror->ok == true) {
            $_SESSION['userId'] = $result->id;
            $_SESSION['user'] = $result->user;

            return $result;
        } else {
            return $result;
        }
    }
}
