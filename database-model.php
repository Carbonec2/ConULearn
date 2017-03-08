<?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

include_once(dirname(__FILE__).'/backendIncludeScript.php');

switch (strtolower($_POST['DAO'])) {

    case 'user':
        relegateUser();
        break;
    case 'course':
        relegateCourse();
        break;
    case 'rights':
        relegateRights();
        break;
    case 'courseuser':
        relegateCourseUser();
        break;
    case 'announcements':
        relegateAnnouncements();
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
        case 'getall2':
            echo json_encode(CourseDAO::getAllFromUserId(getOV()));
            break;
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

function relegateCourseUser() {

    switch (strtolower($_POST['method'])) {
        case 'getall2':
            echo json_encode(CourseUserDAO::getAllFromUser(getOv()));
            break;
        case 'insert':
            echo json_encode(CourseUserDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(CourseUserDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(CourseUserDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(CourseUserDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(CourseUserDAO::get(getId()));
            break;
    }
}

function relegateAnnouncements() {

    switch (strtolower($_POST['method'])) {
        case 'getall2':
            echo json_encode(AnnouncementsDAO::getAllFromUserId(getOV()));
            break;
        case 'insert':
            echo json_encode(AnnouncementsDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(AnnouncementsDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(AnnouncementsDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(AnnouncementsDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(AnnouncementsDAO::get(getId()));
            break;
        case 'getallfromuserid':
            echo json_encode(AnnouncementsDAO::getAllFromUserId(getOV()));
            break;
        case 'getallfromcourseid':
            echo json_encode(AnnouncementsDAO::getAllFromCourseId(getOV()));
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
