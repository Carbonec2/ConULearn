$(document).ready(function () {
    bind();

    fillQuizInfo({Quiz_id: $_GET('Quiz_id')});
    fillQuizQuestions({Quiz_id: $_GET('Quiz_id')});
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
                this.$singleQuestionContainer.addClass("quizQuestionContainer");

                this.$singleQuestionContainer.append('<h3 class="quizQuestionsFont">Question #' + (questionNumber++) + ': ' + entry.question + '</h3>');
                this.$singleQuestionContainer.append('<input type="radio" id="quiz' + entry.Quiz_id + 'question' + entry.id + 'prop1' + '" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + entry.prop1 + '" disabled=disabled> <strong>A.</strong> ' + entry.prop1 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" id="quiz' + entry.Quiz_id + 'question' + entry.id + 'prop2' + '" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + entry.prop2 + '" disabled=disabled> <strong>B.</strong> ' + entry.prop2 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" id="quiz' + entry.Quiz_id + 'question' + entry.id + 'prop3' + '" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + entry.prop3 + '" disabled=disabled> <strong>C.</strong> ' + entry.prop3 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" id="quiz' + entry.Quiz_id + 'question' + entry.id + 'prop4' + '" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + entry.prop4 + '" disabled=disabled> <strong>D.</strong> ' + entry.prop4 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" id="quiz' + entry.Quiz_id + 'question' + entry.id + 'prop5' + '" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + entry.prop5 + '" disabled=disabled> <strong>E.</strong> ' + entry.prop5 + '<br/><br/>');

                $('#questionsContainer').append(this.$singleQuestionContainer);
                
                switch (entry.ans) {
                    case "1":
                        $('#quiz' + entry.Quiz_id + 'question' + entry.id + 'prop1').prop("checked", true);
                        break;
                    case "2":
                        $('#quiz' + entry.Quiz_id + 'question' + entry.id + 'prop2').prop("checked", true);
                        break;
                    case "3":
                        $('#quiz' + entry.Quiz_id + 'question' + entry.id + 'prop3').prop("checked", true);
                        break;
                    case "4":
                        $('#quiz' + entry.Quiz_id + 'question' + entry.id + 'prop4').prop("checked", true);
                        break;
                    case "5":
                        $('#quiz' + entry.Quiz_id + 'question' + entry.id + 'prop5').prop("checked", true);
                        break;
                }
            });

            //console.log(objects);
        }
    });
}
