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
    $("#quizContainer").quizContainer();
});

function CreateQuiz(container, content) {

    var thisObject = this; //Keeping reference

    this.container = container;
    this.content = content;
    if (typeof (content) !== "undefined") {
        if (typeof (content.Quiz_id) !== "undefined") {
            this.Quiz_id = content.Quiz_id;
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

    var _this = this;

    this.$placeholder = $('<table style="width:100%;"></table>');

    this.$placeholder.css('background-color', '#dddddd');
    this.$placeholder.css('padding', '10px');
    this.$placeholder.css('margin', '5px');

    //First line for question

    this.$firstLine = $('<tr></tr>');
    this.$firstCell = $('<td colspan="5" ></td>');

    this.$name = $('<input type="text" placeholder="Question" style="width:100%;"/>');

    this.$firstCell.append(this.$name);
    this.$firstLine.append(this.$firstCell);

    this.$placeholder.append(this.$firstLine);

    //Second line for propositions

    this.$secondLine = $('<tr></tr>');
    this.$secondCell1 = $('<td></td>');
    this.$secondCell2 = $('<td></td>');
    this.$secondCell3 = $('<td></td>');
    this.$secondCell4 = $('<td></td>');
    this.$secondCell5 = $('<td></td>');

    this.$prop1 = $('<input placeholder="Proposition 1" style="width:100%;"/>');
    this.$prop2 = $('<input placeholder="Proposition 2" style="width:100%;"/>');
    this.$prop3 = $('<input placeholder="Proposition 3" style="width:100%;"/>');
    this.$prop4 = $('<input placeholder="Proposition 4" style="width:100%;"/>');
    this.$prop5 = $('<input placeholder="Proposition 5" style="width:100%;"/>');

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

    this.$secondCell1.append(this.$prop1);
    this.$secondCell2.append(this.$prop2);
    this.$secondCell3.append(this.$prop3);
    this.$secondCell4.append(this.$prop4);
    this.$secondCell5.append(this.$prop5);


    this.$secondLine.append(this.$secondCell1);
    this.$secondLine.append(this.$secondCell2);
    this.$secondLine.append(this.$secondCell3);
    this.$secondLine.append(this.$secondCell4);
    this.$secondLine.append(this.$secondCell5);

    this.$placeholder.append(this.$secondLine);

    //Third line for answer
    this.counter = Question.counter; //Unique radio name

    this.$thirdLine = $('<tr></tr>');
    this.$thirdCell1 = $('<td></td>');
    this.$thirdCell2 = $('<td></td>');
    this.$thirdCell3 = $('<td></td>');
    this.$thirdCell4 = $('<td></td>');
    this.$thirdCell5 = $('<td></td>');

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

    this.$thirdCell1.append(this.$ans1);
    this.$thirdCell2.append(this.$ans2);
    this.$thirdCell3.append(this.$ans3);
    this.$thirdCell4.append(this.$ans4);
    this.$thirdCell5.append(this.$ans5);

    this.$thirdLine.append(this.$thirdCell1);
    this.$thirdLine.append(this.$thirdCell2);
    this.$thirdLine.append(this.$thirdCell3);
    this.$thirdLine.append(this.$thirdCell4);
    this.$thirdLine.append(this.$thirdCell5);

    this.$placeholder.append(this.$thirdLine);
}

