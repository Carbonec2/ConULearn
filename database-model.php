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
    case 'quiz':
        relegateQuiz();
        break;
    case 'quizquestion':
        relegateQuizQuestion();
        break;
    case 'quizanswerstudent':
        relegateQuizAnswerStudent();
        break;
    case 'quizstudent':
        relegateQuizStudent();
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
        case 'getmerge':
            echo json_encode(UserDAO::getMerge(getOV()));
            break;
    }
}

function relegateCourse() {

    switch (strtolower($_POST['method'])) {
        case 'getmerge':
            echo json_encode(CourseDAO::getMerge(getOV()));
            break;
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
        case 'remove':
            echo json_encode(AnnouncementsDAO::remove(getOV()));
            break;
    }
}

function relegateQuiz() {

    switch (strtolower($_POST['method'])) {
        case 'getallfromid':
            echo json_encode(QuizDAO::getAllFromId(getOV()));
            break;
        case 'getallfromcourseidstudent':
            echo json_encode(QuizDAO::getAllFromCourseIdStudent(getOV()));
            break;
        case 'getallfromcourseid':
            echo json_encode(QuizDAO::getAllFromCourseId(getOV()));
            break;
        case 'remove':
            echo json_encode(QuizDAO::remove(getOV()));
            break;
        case 'insert':
            echo json_encode(QuizDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(QuizDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(QuizDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(QuizDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(QuizDAO::get(getId()));
            break;
        case 'getmerge':
            echo json_encode(QuizDAO::getMerge(getOV()));
            break;
    }
}

function relegateQuizQuestion() {

    switch (strtolower($_POST['method'])) {
        case 'getallfromquizid':
            echo json_encode(QuizQuestionDAO::getAllFromQuizId(getOV()));
            break;
        case 'insert':
            echo json_encode(QuizQuestionDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(QuizQuestionDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(QuizQuestionDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(QuizQuestionDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(QuizQuestionDAO::get(getId()));
            break;
        case 'getmerge':
            echo json_encode(QuizQuestionDAO::getMerge(getOV()));
            break;
    }
}

function relegateQuizAnswerStudent() {

    switch (strtolower($_POST['method'])) {
        case 'getallfromUserId':
            echo json_encode(QuizAnswerStudentDAO::getAllFromUserId(getOV()));
            break;
        case 'getallfromquizquestionid':
            echo json_encode(QuizAnswerStudentDAO::getAllFromQuizQuestionId(getOV()));
            break;
        case 'get':
            echo json_encode(QuizAnswerStudentDAO::get(getId()));
            break;
        case 'getall':
            echo json_encode(QuizAnswerStudentDAO::getAll(getFilters()));
            break;
        case 'insert':
            echo json_encode(QuizAnswerStudentDAO::insert(getOV()));
            break;
        case 'save':
            echo json_encode(QuizAnswerStudentDAO::save(getOV()));
            break;
        case 'update':
            echo json_encode(QuizAnswerStudentDAO::update(getOV()));
            break;
        
	}
}

function relegateQuizStudent() {

    switch (strtolower($_POST['method'])) {
        case 'insertcurrentuserid':
            echo json_encode(QuizStudentDAO::insertCurrentUserId(getOV()));
            break;
        case 'remove':
            echo json_encode(QuizStudentDAO::remove(getOV()));
            break;
        case 'updatecurrentuser':
            echo json_encode(QuizStudentDAO::updateCurrentUser(getOV()));
            break;
        case 'insert':
            echo json_encode(QuizStudentDAO::insert(getOV()));
            break;
        case 'update':
            echo json_encode(QuizStudentDAO::update(getOV()));
            break;
        case 'save':
            echo json_encode(QuizStudentDAO::save(getOV()));
            break;
        case 'getall':
            echo json_encode(QuizStudentDAO::getAll(getFilters()));
            break;
        case 'get':
            echo json_encode(QuizStudentDAO::get(getId()));
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
