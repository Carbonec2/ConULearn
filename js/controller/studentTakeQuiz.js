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

            $('#quizInfo').html('<h1>'+objects.name + "</h1> <h3>Due date: " + objects.date)+'</h3>';

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

            console.log(objects);

            //$(quizInfo).html(objects.name + " Due date: " + objects.date);
            objects.forEach(function (entry) {
                $('#questionsContainer').append('<h3 class="quizQuestionsFont">Question: '+entry.question+'</h3><br/>');
                $('#questionsContainer').append('<input type="radio" class="quizMultipleChoices" name="quiz'+entry.Quiz_id+'question'+entry.id+'" value="'+entry.prop1+'"> '+entry.prop1+'<br/>');
                $('#questionsContainer').append('<input type="radio" class="quizMultipleChoices" name="quiz'+entry.Quiz_id+'question'+entry.id+'" value="'+entry.prop2+'"> '+entry.prop2+'<br/>');
                $('#questionsContainer').append('<input type="radio" class="quizMultipleChoices" name="quiz'+entry.Quiz_id+'question'+entry.id+'" value="'+entry.prop3+'"> '+entry.prop3+'<br/>');
                $('#questionsContainer').append('<input type="radio" class="quizMultipleChoices" name="quiz'+entry.Quiz_id+'question'+entry.id+'" value="'+entry.prop4+'"> '+entry.prop4+'<br/>');
                $('#questionsContainer').append('<input type="radio" class="quizMultipleChoices" name="quiz'+entry.Quiz_id+'question'+entry.id+'" value="'+entry.prop5+'"> '+entry.prop5+'<br/>');
            });

            //console.log(objects);
        }
    });
}