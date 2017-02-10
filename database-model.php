<?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

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

function relegateCourse() {

    switch (strtolower($_POST['method'])) {
        case 'insert':
            echo json_encode(CourseDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(CourseDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(CourseDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(CourseDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(CourseDAO::get(getId()));
            break;
    }
}

function relegateRights() {

    switch (strtolower($_POST['method'])) {
        case 'insert':
            echo json_encode(RightsDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(RightsDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(RightsDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(RightsDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(RightsDAO::get(getId()));
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
