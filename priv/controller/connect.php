<?php

class ConnectController {

    static function connect($ov) {

        $result = UserDAO::checkUsernameAndPassword($ov);
        
        if ($result->error->ok == true) {
            $_SESSION['userId'] = $result->id;
            $_SESSION['user'] = $result->user;
            $_SESSION['Rights_id'] = $result->Rights_id;

            return $result;
        } else {
            return $result;
        }
    }
    
    static function signup($ov) {
        $result = UserDAO::insert($ov);
        
        return $result;
    }
}
