$(document).ready(function () {

    $("#createAnnouncementLink").attr('href', 'index.php?page=teacherCreateAnnouncements&coursename=' + $_GET('coursename') + '&Course_id=' + $_GET('Course_id'));

    var identifiers = {Course_id: $_GET('Course_id')};
    fillAnnouncements(identifiers);

    fillQuizzes(identifiers);

    bind();
});

function bind() {

}

function fillQuizzes(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quiz', method: 'getallfromcourseid', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            objects.forEach(function (entry) {
                var $quiz = $('<div id="div' + entry.id + '"></div>');

                $quiz.css('background-color', '#dddddd');
                $quiz.css('padding', '10px');
                $quiz.css('margin', '5px');

                $quiz.html('<a href="index.php?page=teacherDisplayQuiz&Quiz_id='+entry.id+'">' + entry.name + ' <b>Due date:</b> ' + entry.date + '</a> <button id="deleteText' + entry.id + '">Delete</button>');

                $("#quizContainer").append($quiz);

                $("#quizContainer").on("click", '#deleteText' + entry.id, function (e) {
                    e.preventDefault();

                    var content = {id: entry.id};

                    deleteQuiz(content);
                });
            });

            //console.log(objects);
        }
    });
}

function deleteQuiz(content, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quiz', method: 'remove', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            location.reload();

            if (typeof (successCallback) !== "undefined") {
                successCallback(objects);
            }
        }
    });
}



function fillAnnouncements(content) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'getallfromcourseid', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(objects);

            $("#announcementsContainer").css('overflow-y', 'scroll');

            objects.forEach(function (entry) {
                console.log(entry);
                var $announcement = $('<div id="div' + entry.id + '"></div>');

                $announcement.css('background-color', '#dddddd');
                $announcement.css('padding', '10px');
                $announcement.css('margin', '5px');

                $announcement.html(entry.description + ' <button id="editText' + entry.id + '">Edit</button> <button id="deleteText' + entry.id + '">Delete</button>');

                if (entry.description != null && entry.description.length > 0) {
                    $("#announcementsContainer").append($announcement);
                }

                $("#announcementsContainer").on("click", '#editText' + entry.id, function (e) {
                    e.preventDefault();

                    $('#div' + entry.id).html('<textarea class="dashboard_teacher_textarea" id="text' + entry.id + '" name="text' + entry.id + '">' + entry.description + '</textarea> <br/><button id="submitText' + entry.id + '">Submit</button> <button id="cancelText' + entry.id + '">Cancel</button>');

                    $('#cancelText' + entry.id).click(function (e) {

                        e.preventDefault();

                        $('#div' + entry.id).html(entry.description + ' <button id="editText' + entry.id + '">Edit</button> <button id="deleteText' + entry.id + '">Delete</button>');

                    });
                    $('#submitText' + entry.id).click(function (e) {

                        e.preventDefault();

                        var content = {description: $('#text' + entry.id).val(), Course_id: $_GET('Course_id'), id: entry.id, User_id: $("#userId").val()};

                        sendAnnouncement(content, function () {
                            consoleLogger.goodNotice("The announcement was correctly recorded.");
                        },
                                function () {
                                    consoleLogger.badNotice("There was a problem while recording the announcement.");
                                });

                    });
                });

                $("#announcementsContainer").on("click", '#deleteText' + entry.id, function (e) {
                    e.preventDefault();

                    var content = {id: entry.id};

                    deleteAnnouncement(content);
                });


            });

        }
    });

}
function sendAnnouncement(content, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'update', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            location.reload();

            if (typeof (successCallback) !== "undefined") {
                successCallback(objects);
            }
        }
    });
}

function deleteAnnouncement(content, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'remove', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            location.reload();

            if (typeof (successCallback) !== "undefined") {
                successCallback(objects);
            }
        }
    });
}

function fillQuestionsAnswers() {

    var content = {Course_id: $_GET('Course_id')};

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'questionsanswers', method: 'getall', filters: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(object);
            console.log(objects);

            $("#questionsAnswersContainer").css('overflow-y', 'scroll');

            objects.forEach(function (entry) {
                console.log(entry);
                var $announcement = $('<div></div>');

                $announcement.css('background-color', '#dddddd');
                $announcement.css('padding', '10px');
                $announcement.css('margin', '5px');

                var $answer = $('<textarea id="' + entry.id + '" placeholder="Answer" ></textarea>');
                var $save = $('<input type="button" value="Save" />');

                $save.data('content', entry);

                $save.click(function () {

                    var content = $(this).data('content');

                    content.answer = $answer.val();
                    saveAnswer(content);
                });

                $announcement.html(entry.user + ' has asked: <b>' + entry.question + '</b><br/>Answer: ');// + entry.answer

                //No answer yet
                if (entry.answer == null || entry.answer.length <= 0) {
                    $announcement.append($('<br/>'));
                    $announcement.append($answer);
                    $announcement.append($('<br/>'));
                    $announcement.append($save);
                } else {
                    $announcement.append($('<br/>'));
                    $announcement.append('<i>' + entry.answer + '</i>');
                }

                if (entry.question != null && entry.question.length > 0) {
                    $("#questionsAnswersContainer").append($announcement);
                }
            });

            var $announcement = $('<div></div>');

            $announcement.css('background-color', '#dddddd');
            $announcement.css('padding', '10px');
            $announcement.css('margin', '5px');

            $announcement.append('<br/>');

            $("#questionsAnswersContainer").append($announcement);
        }
    });
}

function saveAnswer(content) {

    //Send the content to the BDD

    console.log(content);

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'questionsanswers', method: 'save', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(objects);

            consoleLogger.goodNotice("Question registered in the database!");

            $("#questionsAnswersContainer").empty();

            fillQuestionsAnswers();
        }
    });
}

