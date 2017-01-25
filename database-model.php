<?php

include_once(dirname(__FILE__).'/priv/backendIncludeScript.php');

switch (strtolower($_POST['DAO'])) {

    case 'user':
        relegateUser();
        break;
}

function relegateUser() {

    switch (strtolower($_POST['method'])) {
        case 'insert':
            echo json_encode(UserDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(UserDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(UserDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(UserDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(UserDAO::get(getId()));
            break;
    }
}

function getOV() {
    return json_decode($_POST['OV']);
}

function getFilters() {
    return json_decode($_POST['filters']);
}

function getId() {
    return $_POST['id'];
}
