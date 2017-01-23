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
            UserDAO::insert(getOV());
            break;
        case 'update':
            UserDAO::update(getOV());
            break;
        case 'save':
            UserDAO::save(getOV());
            break;
        case 'getall':
            UserDAO::getAll(getFilters());
            break;
        case 'get':
            UserDAO::get(getId());
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
