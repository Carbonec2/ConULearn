$(document).ready(function () {
    bind();

    fillQuizInfo({Quiz_id: $_GET('Quiz_id')});
    fillQuizQuestions({Quiz_id: $_GET('Quiz_id')});
    gradeQuizQuestions({Quiz_id: $_GET('Quiz_id')});
});


//announcementsContainer

function bind() {

}

function fillQuizInfo(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quiz', method: 'getallfromid', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            console.log(objects);

            $('#quizInfo').html('<h1>' + objects.name + "</h1> <h3>Due date: " + objects.date) + '</h3>';

            //console.log(objects);
        }
    });
}

function fillQuizQuestions(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizquestion', method: 'getallfromquizid', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);
            var questionNumber = 1;

            console.log(objects);

            //$(quizInfo).html(objects.name + " Due date: " + objects.date);
            objects.forEach(function (entry) {
                this.$singleQuestionContainer = $('<div></div>')
                this.$singleQuestionContainer.css("display","block");
                this.$singleQuestionContainer.css("background-color","#FFFFFF");
                this.$singleQuestionContainer.css("margin-left","50px");
                this.$singleQuestionContainer.css("text-align","left");

                this.$singleQuestionContainer.append('<h3 class="quizQuestionsFont">Question #' + (questionNumber++) + ': ' + entry.question + '</h3>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 1 + '" disabled=disabled> <strong>A.</strong> ' + entry.prop1 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 2 + '" disabled=disabled> <strong>B.</strong> ' + entry.prop2 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 3 + '" disabled=disabled> <strong>C.</strong> ' + entry.prop3 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 4 + '" disabled=disabled> <strong>D.</strong> ' + entry.prop4 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 5 + '" disabled=disabled> <strong>E.</strong> ' + entry.prop5 + '<br/><br/>');
                
                $('#questionsContainer').append(this.$singleQuestionContainer);
                
                checkStudentAnswers({QuizQuestion_id: entry.id});
            });
        }
    });
}

function gradeQuizQuestions(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizquestion', method: 'getmerge', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            var point = 0;

            /*
            objects.forEach(function (entry) {
                if (entry.ans == entry.answer) {
                    point++;
                }
            });
            */

            for (var i = 0; i < objects.length; i++) {
                if (objects[i].ans == objects[i].answer) {
                    point++;
                }
            }

            $('#quizInfo').append("<b>GRADE: " + point + "/10</b>");

            console.log(point);
        }
    });
}

function checkStudentAnswers(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizanswerstudent', method: 'getallfromquizquestionid', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            console.log(objects);

            //$(quizInfo).html(objects.name + " Due date: " + objects.date);
            objects.forEach(function (entry) {
                $('input[name="quiz' + entry.Quiz_id + 'question' + entry.QuizQuestion_id + '"][value="' + entry.answer + '"]').prop("checked", true);
            });

            //console.log(objects);
        }
    });
}