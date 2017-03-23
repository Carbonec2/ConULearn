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
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            console.log(objects);
            
            var i = 0;
            var identifiers = new Array();
            var Quiz_id;

            var questionNumber = 1;

            //$(quizInfo).html(objects.name + " Due date: " + objects.date);
            objects.forEach(function (entry) {
                this.$singleQuestionContainer = $('<div></div>')
                this.$singleQuestionContainer.css("display","block");
                this.$singleQuestionContainer.css("background-color","#FFFFFF");
                this.$singleQuestionContainer.css("margin-left","50px");
                this.$singleQuestionContainer.css("text-align","left");
                
                this.$singleQuestionContainer.append('<h3 class="quizQuestionsFont">Question #' + (questionNumber++) + ': ' + entry.question + '</h3>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 1 + '"> <strong>A.</strong> ' + entry.prop1 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 2 + '"> <strong>B.</strong> ' + entry.prop2 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 3 + '"> <strong>C.</strong> ' + entry.prop3 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 4 + '"> <strong>D.</strong> ' + entry.prop4 + '<br/>');
                this.$singleQuestionContainer.append('<input type="radio" class="quizMultipleChoices" name="quiz' + entry.Quiz_id + 'question' + entry.id + '" value="' + 5 + '"> <strong>E.</strong> ' + entry.prop5 + '<br/><br/>');

                $('#questionsContainer').append(this.$singleQuestionContainer);
                
                var index = i;
                $('input[type=radio][name="quiz' + entry.Quiz_id + 'question' + entry.id + '"]').change(function () {
                    identifiers[index] = {Quiz_id: entry.Quiz_id, QuizQuestion_id: entry.id, answer: $('input[name="quiz' + entry.Quiz_id + 'question' + entry.id + '"]:checked').val()};
                    console.log(identifiers[index]);
                    //console.log(index);
                });

                i++;
                Quiz_id = entry.Quiz_id;
            });
            
            identifiersQuizSubmitted = {Quiz_id: Quiz_id};
            quizSubmitted(identifiersQuizSubmitted);

            $("#buttonSubmit").click(function () {
                
                var i;
                for (i = 0; i < identifiers.length - 1; i++) {
                    submitQuestion(identifiers[i]);
                    console.log(identifiers[i]);
                }
                
                submitLastQuestion(identifiers[identifiers.length - 1]);
                console.log(identifiers[identifiers.length - 1]);

                //alert(entry.id + "===" + $('input[name="quiz' + entry.Quiz_id + 'question' + entry.id + '"]:checked').val());
                //console.log(quiz.getContent().questions.length);
            });


            //console.log(objects);
        }
    });
}

function quizSubmitted(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizstudent', method: 'updatecurrentuser', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //var objects = jQuery.parseJSON(object);

            //console.log(objects);
        }
    });
}

function submitQuestion(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizanswerstudent', method: 'insert', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            //var objects = jQuery.parseJSON(object);

            //console.log(objects);
        }
    });
}

function submitLastQuestion(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizanswerstudent', method: 'insert', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            window.location = "index.php?page=studentQuizSolution&Quiz_id="+$_GET('Quiz_id');
        }
    });
}
