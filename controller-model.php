<?php

include_once(dirname(__FILE__) . '/backendIncludeScript.php');

switch (strtolower($_POST['controller'])) {

    case 'connect':
        relegateConnect();
        break;
}

function relegateConnect() {

    switch (strtolower($_POST['method'])) {
        case 'connect':
            echo json_encode(ConnectController::connect(getOV()));
            break;
    }
}

function getOV() {
    return json_decode($_POST['OV']);
}
