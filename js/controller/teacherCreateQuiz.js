jQuery.fn.extend({
    quizContainer: function (content) {
        return $.data(this[0], "quizContainer", new CreateQuiz(this, content));
    },
    getContent: function () {
        return $.data(this[0], "quizContainer").getContent();
    }
});

$(document).ready(function () {

    var question1 = {ans: 3, name: 'Test', prop1: 'Test', prop2: 'LL', prop3: 'ss', prop4: 'dsa', prop5: 'sas'};

    var content = {questions: [question1]};

    Question.counter = 0;

//content
    var quiz = $("#quizContainer").quizContainer();

    $("#saveQuiz").click(function () {
        var identifiersQuiz = {Course_id: $_GET('Course_id'), date: quiz.$dueDate.val(), name: quiz.$quizName.val()};
        addQuiz(identifiersQuiz, quiz);
    });
});

function addQuestion(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizquestion', method: 'insert', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
        }
    });
}

function addQuiz(identifiers, quiz) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quiz', method: 'insert', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            //console.log(objects.id);

            for (i = 0; i < quiz.questions.length; i++) {
                //console.log(quiz.questions[i].content.prop1);

                var identifiersQuizQuestion = {
                    Quiz_id: objects.id,
                    question: quiz.questions[i].content.name,
                    prop1: quiz.questions[i].content.prop1,
                    prop2: quiz.questions[i].content.prop2,
                    prop3: quiz.questions[i].content.prop3,
                    prop4: quiz.questions[i].content.prop4,
                    prop5: quiz.questions[i].content.prop5,
                    ans: quiz.questions[i].content.ans
                };
                addQuestion(identifiersQuizQuestion);
  
          }

            var identifiersQuizStudent = {Quiz_id: objects.id};
            addQuizStudentForStudents(identifiersQuizStudent, objects.id);
        }
    });
}

function addQuizStudentForStudents(identifiers, Quiz_id) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'user', method: 'getmerge', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            var objects = jQuery.parseJSON(object);

            console.log(objects.id);

            objects.forEach(function (entry) {
                var identifiers = {Quiz_id: Quiz_id, User_id: entry.id};
                console.log(identifiers);
                addQuizStudent(identifiers, Quiz_id);
            });
            window.location = 'index.php?page=courseDashboardTeacher&id=1&coursename=' + $_GET('coursename') + '&Course_id=' + $_GET('Course_id');
        }
    });
}

function addQuizStudent(identifiers, Quiz_id) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizstudent', method: 'insert', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardTeacher";

            //var objects = jQuery.parseJSON(object);

            //console.log(objects.id);
        }
    });
}

function CreateQuiz(container, content) {

    var thisObject = this; //Keeping reference

    this.container = container;

    this.$quizName = $('<input type="text" id="quizName" placeholder="Example: Quiz 1" />');
    
    $('body').on('change', '#quizName', function () {
        thisObject.quizName = thisObject.$quizName.val();
    });

    this.$dueDate = $('<input type="date" id="dueDate" placeholder="yyyy-mm-dd" />');

    $('body').on('change', '#dueDate', function () {
        thisObject.dueDate = thisObject.$dueDate.val();
    });

    this.$numberOfQuestions = $('<input type="number" id="numberOfQuestions" value="10" min="1" max="100"/>');
    
    this.$numberOfQuestionsButton = $('<button type="button" id="numberOfQuestionsButton">Apply</button>');
    
    $('body').on('click', '#numberOfQuestionsButton', function () {
        updateQuiz(thisObject);
    });
    
    this.container.append('<strong>Quiz Title</strong>: ');
    this.container.append(this.$quizName);

    this.container.append('<br/><br/><strong>Due Date</strong>: ');
    this.container.append(this.$dueDate);

    this.container.append('<br/><br/><strong>Number of Questions</strong>: ');
    this.container.append(this.$numberOfQuestions);
    this.container.append(" ");
    this.container.append(this.$numberOfQuestionsButton);

    this.content = content;
    if (typeof (content) !== "undefined") {
        if (typeof (content.Quiz_id) !== "undefined") {
            this.Quiz_id = content.Quiz_id;
        }
        if (typeof (content.dueDate) !== "undefined") {
            this.dueDate = content.dueDate;
        }
        if (typeof (content.quizName) !== "undefined") {
            this.quizName = content.quizName;
        }
    }

    this.questions = [];

    if (typeof (content) !== "undefined") {
        if (typeof (content.questions) !== "undefined") {
            content.questions.forEach(function (entry) {
                //We fill the questions here
                var question = new Question(entry);
                thisObject.questions.push(question);
                thisObject.container.append(question.getJqueryDom());
            });
        }
    } else {
        //Do empty grid
        for (var i = 0; i < 10; i++) {
            var question = new Question();
            thisObject.questions.push(question);
            thisObject.container.append(question.getJqueryDom());
        }
    }

    return this;
}

function updateQuiz(thisObject) {
    thisObject.numberOfQuestions = thisObject.$numberOfQuestions.val();

    thisObject.container.html('');

    thisObject.container.append('<strong>Quiz Title</strong>: ');
    thisObject.container.append(thisObject.$quizName);

    thisObject.container.append('<br/><br/><strong>Due Date</strong>: ');
    thisObject.container.append(thisObject.$dueDate);

    thisObject.container.append('<br/><br/><strong>Number of Questions</strong>: ');
    thisObject.container.append(thisObject.$numberOfQuestions);
    thisObject.container.append(" ");
    thisObject.container.append(thisObject.$numberOfQuestionsButton);

    if (thisObject.questions.length > thisObject.numberOfQuestions) {
        var len = thisObject.questions.length;
        for (var i = 0; i < len - thisObject.numberOfQuestions; i++) {
            thisObject.questions.pop();
            Question.counter--;
        }
    } else {
        var len = thisObject.questions.length;
        for (var i = 0; i < thisObject.numberOfQuestions - len; i++) {
            var question = new Question();
            thisObject.questions.push(question);
        }
    }

    for (var i = 0; i < thisObject.questions.length; i++) {
        thisObject.container.append(thisObject.questions[i].getJqueryDom());
    }

    console.log(thisObject);
}

CreateQuiz.prototype.getContent = function () {

    var content = {Quiz_id: this.Quiz_id, questions: []};

    this.questions.forEach(function (entry) {
        content.questions.push(entry.content);
    });

    return content;
}

CreateQuiz.prototype.adaptContainer = function () {
    var $headerInfo = $('<div></div>');
    var $dateField = $('<input type="date" />');
    var $nameField = $('<input type="text" placeholder="name" />');
    var $addLine = $('<input type="button" />');

    $headerInfo.append($dateField);
    $headerInfo.append($nameField);
    $headerInfo.append($addLine);

    $addLine.click(function () {
        var newQuestion = new Question();
        this.questions.push(newQuestion);
    });

    this.container.append($headerInfo);
};

/**
 * Question constructor
 * Expects an object containing parameters name (content of question),
 * prop1, prop2, prop3, prop4, prop5, (int) ans
 * @param {type} content
 * @returns {Question}
 */
function Question(content) {

    if (typeof (content) === "undefined") {
        this.content = {};
    } else {
        this.content = content;
    }

    this.setJqueryDom();
    this.fillContent();

    Question.counter++; //Static variable

    return this;
}

Question.prototype.fillContent = function () {
    //Content filling function

    this.$name.val(this.content.name);

    this.$prop1.val(this.content.prop1);
    this.$prop2.val(this.content.prop2);
    this.$prop3.val(this.content.prop3);
    this.$prop4.val(this.content.prop4);
    this.$prop5.val(this.content.prop5);

    //Check the good radio
    if (this.content.ans == 1) {
        this.$ans1.prop('checked', true);
    }
    if (this.content.ans == 2) {
        this.$ans2.prop('checked', true);
    }
    if (this.content.ans == 3) {
        this.$ans3.prop('checked', true);
    }
    if (this.content.ans == 4) {
        this.$ans4.prop('checked', true);
    }
    if (this.content.ans == 5) {
        this.$ans5.prop('checked', true);
    }
}

Question.prototype.getJqueryDom = function () {
    return this.$placeholder;
}

Question.prototype.setJqueryDom = function () {

    this.counter = Question.counter; //counter both for unique radio name (further down) and for the question numbers

    var _this = this;

    this.$placeholder = $('<table></table>');
    this.$placeholder.addClass("questionContainerTable"); //adding class for external CSS

    //first line for question number
    this.$questionNumberLine = $('<tr></tr>');
    this.$questionNumberCell = $('<th colspan="3"></th>');
    this.$questionNumberCell.addClass("questionNumberCell"); //adding class for external CSS
    this.$questionNumberCell.append('Question #' + (this.counter + 1));
    this.$questionNumberLine.append(this.$questionNumberCell);
    this.$placeholder.append(this.$questionNumberLine);

    //second line for question text field

    this.$questionTextFieldLine = $('<tr></tr>');
    this.$questionTextFieldCell = $('<td colspan="10"></td>');
    this.$questionTextFieldCell.addClass("questionTextFieldCell"); //adding class for external CSS

    this.$name = $('<input type="text" placeholder="Question #' + (this.counter + 1) + '"/>');
    this.$name.addClass("questionTextField"); //adding class for external CSS

    this.$questionTextFieldCell.append(this.$name);
    this.$questionTextFieldLine.append(this.$questionTextFieldCell);

    this.$placeholder.append(this.$questionTextFieldLine);

    //The rows for all the options (A, B, C, D, E)
    this.$optionARow = $('<tr></tr>');
    this.$optionBRow = $('<tr></tr>');
    this.$optionCRow = $('<tr></tr>');
    this.$optionDRow = $('<tr></tr>');
    this.$optionERow = $('<tr></tr>');

    //The cells for the propositions
    this.$optionAAnswerTD = $('<td></td>');
    this.$optionBAnswerTD = $('<td></td>');
    this.$optionCAnswerTD = $('<td></td>');
    this.$optionDAnswerTD = $('<td></td>');
    this.$optionEAnswerTD = $('<td></td>');

    //adding class for external CSS
    this.$optionAAnswerTD.addClass("answerCell");
    this.$optionBAnswerTD.addClass("answerCell");
    this.$optionCAnswerTD.addClass("answerCell");
    this.$optionDAnswerTD.addClass("answerCell");
    this.$optionEAnswerTD.addClass("answerCellBottom");

    this.$prop1 = $('<input type="text" placeholder="Answer A" />');
    this.$prop2 = $('<input type="text" placeholder="Answer B" />');
    this.$prop3 = $('<input type="text" placeholder="Answer C" />');
    this.$prop4 = $('<input type="text" placeholder="Answer D" />');
    this.$prop5 = $('<input type="text" placeholder="Answer E" />');

    //adding class for external CSS
    this.$prop1.addClass("answerTextField");
    this.$prop2.addClass("answerTextField");
    this.$prop3.addClass("answerTextField");
    this.$prop4.addClass("answerTextField");
    this.$prop5.addClass("answerTextField");

    this.$name.change(function () {
        _this.content.name = _this.$name.val();
    });

    this.$prop1.change(function () {
        _this.content.prop1 = _this.$prop1.val();
    });
    this.$prop2.change(function () {
        _this.content.prop2 = _this.$prop2.val();
    });
    this.$prop3.change(function () {
        _this.content.prop3 = _this.$prop3.val();
    });
    this.$prop4.change(function () {
        _this.content.prop4 = _this.$prop4.val();
    });
    this.$prop5.change(function () {
        _this.content.prop5 = _this.$prop5.val();
    });

    this.$optionAAnswerTD.append(this.$prop1);
    this.$optionBAnswerTD.append(this.$prop2);
    this.$optionCAnswerTD.append(this.$prop3);
    this.$optionDAnswerTD.append(this.$prop4);
    this.$optionEAnswerTD.append(this.$prop5);


    //The cells for radio buttons

    this.$optionARadioTD = $('<td width="30px" colspan="1"></td>');
    this.$optionBRadioTD = $('<td width="30px" colspan="1"></td>');
    this.$optionCRadioTD = $('<td width="30px" colspan="1"></td>');
    this.$optionDRadioTD = $('<td width="30px" colspan="1"></td>');
    this.$optionERadioTD = $('<td width="30px" colspan="1"></td>');

    this.$ans1 = $('<input type="radio" name="ans' + this.counter + '" value="1"/>');
    this.$ans2 = $('<input type="radio" name="ans' + this.counter + '" value="2"/>');
    this.$ans3 = $('<input type="radio" name="ans' + this.counter + '" value="3"/>');
    this.$ans4 = $('<input type="radio" name="ans' + this.counter + '" value="4"/>');
    this.$ans5 = $('<input type="radio" name="ans' + this.counter + '" value="5"/>');

    this.$name.change(function () {
        _this.content.name = _this.$name.val();
    });

    //Do something to store checked answer
    this.$ans1.change(function () {
        _this.content.ans = _this.$ans1.val();
    });

    this.$ans1.on('change', function () {
        _this.content.ans = $('input[name=ans' + _this.counter + ']:checked').val();
    });
    this.$ans2.on('change', function () {
        _this.content.ans = $('input[name=ans' + _this.counter + ']:checked').val();
    });
    this.$ans3.on('change', function () {
        _this.content.ans = $('input[name=ans' + _this.counter + ']:checked').val();
    });
    this.$ans4.on('change', function () {
        _this.content.ans = $('input[name=ans' + _this.counter + ']:checked').val();
    });
    this.$ans5.on('change', function () {
        _this.content.ans = $('input[name=ans' + _this.counter + ']:checked').val();
    });

    this.$optionARadioTD.append(this.$ans1);
    this.$optionBRadioTD.append(this.$ans2);
    this.$optionCRadioTD.append(this.$ans3);
    this.$optionDRadioTD.append(this.$ans4);
    this.$optionERadioTD.append(this.$ans5);


    // Cells for the letters for denoting question options (A, B, C, D, E)
    this.$optionALetterTD = $('<td width="30px" colspan="1"></td>');
    this.$optionBLetterTD = $('<td width="30px" colspan="1"></td>');
    this.$optionCLetterTD = $('<td width="30px" colspan="1"></td>');
    this.$optionDLetterTD = $('<td width="30px" colspan="1"></td>');
    this.$optionELetterTD = $('<td width="30px" colspan="1"></td>');

    this.$optionALetterTD.append('A. ');
    this.$optionBLetterTD.append('B. ');
    this.$optionCLetterTD.append('C. ');
    this.$optionDLetterTD.append('D. ');
    this.$optionELetterTD.append('E. ');

    //appending all cells into rows
    this.$optionARow.append(this.$optionARadioTD);
    this.$optionBRow.append(this.$optionBRadioTD);
    this.$optionCRow.append(this.$optionCRadioTD);
    this.$optionDRow.append(this.$optionDRadioTD);
    this.$optionERow.append(this.$optionERadioTD);

    this.$optionARow.append(this.$optionALetterTD);
    this.$optionBRow.append(this.$optionBLetterTD);
    this.$optionCRow.append(this.$optionCLetterTD);
    this.$optionDRow.append(this.$optionDLetterTD);
    this.$optionERow.append(this.$optionELetterTD);

    this.$optionARow.append(this.$optionAAnswerTD);
    this.$optionBRow.append(this.$optionBAnswerTD);
    this.$optionCRow.append(this.$optionCAnswerTD);
    this.$optionDRow.append(this.$optionDAnswerTD);
    this.$optionERow.append(this.$optionEAnswerTD);

    //appending all rows back in table
    this.$placeholder.append(this.$optionARow);
    this.$placeholder.append(this.$optionBRow);
    this.$placeholder.append(this.$optionCRow);
    this.$placeholder.append(this.$optionDRow);
    this.$placeholder.append(this.$optionERow);
}

