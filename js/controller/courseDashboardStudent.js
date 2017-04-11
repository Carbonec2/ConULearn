$(document).ready(function () {
    bind();

    fillAnnouncements({Course_id: $_GET('courseid')});
    fillQuizzes({Course_id: $_GET('courseid')});

    fillQuestionsAnswers();
    
    consoleLogger = new ConsoleLogger($("#consoleLoggerContainer"));
});


//announcementsContainer



function bind() {

}

function fillQuizzes(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quiz', method: 'getallfromcourseidstudent', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            console.log(objects);

            objects.forEach(function (entry) {
                var $quiz = $('<div id="div' + entry.id + '"></div>');

                $quiz.addClass("dashboardItem");

                if (entry.submitted == 0) {
                    $quiz.html('<a href="index.php?page=studentTakeQuiz&Quiz_id=' + entry.id + '">' + entry.name + ' <b>Due date:</b> ' + entry.date + '</a>');
                } else {
                    $quiz.html('<a href="index.php?page=studentQuizSolution&Quiz_id=' + entry.id + '"> ' + entry.name + ' <b>Due date:</b> ' + entry.date + ' <b>[View Results]</b></a>');
                }

                $("#quizContainer").append($quiz);
            });

            //console.log(objects);
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

            objects.forEach(function (entry) {
                console.log(entry);
                var $announcement = $('<div></div>');

                $announcement.addClass("dashboardItem");

                $announcement.html(entry.description);

                if (entry.description != null && entry.description.length > 0) {
                    $("#announcementsContainer").append($announcement);
                }
            });

        }
    });

}

function fillQuestionsAnswers() {

    var content = {Course_id: $_GET('courseid'), User_id: -1};

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

            console.log(objects);

            objects.forEach(function (entry) {
                console.log(entry);
                var $announcement = $('<div></div>');

                $announcement.addClass("dashboardItem");

                if (entry.answer == null || entry.answer.length <= 0) {
                    entry.answer = 'Teacher has not answered yet';
                }
                else entry.answer = '<strong>Teacher responded:</strong> ' + entry.answer;

                $announcement.html('<b>' + entry.question + '</b><br/>' + entry.answer);

                if (entry.question != null && entry.question.length > 0) {
                    $("#questionsAnswersContainer").append($announcement);
                }
            });

            var $announcement = $('<div></div>');

            $announcement.addClass("dashboardItem");

            $questionContainer = $('<textarea placeholder="Type a new question for your teacher here" ></textarea><br/>');
            $sendButton = $('<input type="button" value="Submit" />');

            $questionContainer.addClass("questionAnswerTextBox");
            $sendButton.addClass("questionAnswerButton");
            $sendButton.click(function () {
                //Send the new question to the BDD when we click on the button
                saveQuestion();
            });

            $announcement.append('<br/>');
            $announcement.append($questionContainer);
            $announcement.append($sendButton);

            $("#questionsAnswersContainer").append($announcement);
        }
    });
}

function saveQuestion() {

    var content = {
        question: $questionContainer.val(),
        User_id: -1,
        Course_id: $_GET('courseid'),
        answer: null
    };

    //Send the content to the BDD

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