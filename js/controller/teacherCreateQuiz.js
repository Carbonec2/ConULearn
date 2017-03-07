//Still under development

function CreateQuiz(container, content) {

    this.container = container;
    this.content = content;

    if(typeof(content) !== "undefined"){
        if(typeof(content.questions) !== "undefined"){
            content.questions.forEach(function(entry){
                //We fill the questions here
            });
        }
    }
}

CreateQuiz.prototype.adaptContainer = function () {
    var $headerInfo = $('<div></div>');
    var $dateField = $('<input type="date" />');
    var $nameField = $('<input type="text" placeholder="name" />');
    var $addLine = $('<input type="button" />');

    $headerInfo.append($dateField);
    $headerInfo.append($nameField);
    $headerInfo.append($addLine);
    
    $addLine.click(function(){
        var newQuestion = new Question();
        this.questions.push(newQuestion);
    });

    this.container.append($headerInfo);

};

function Question(content) {

    this.content = content;
}

Question.prototype.getJqueryDom = function () {

    var _this = this;

    this.$placeholder = $('<div></div>');

    this.$name = $('<input/>');

    this.$prop1 = $('<input placeholder="Proposition 1"/>');
    this.$prop2 = $('<input placeholder="Proposition 2"/>');
    this.$prop3 = $('<input placeholder="Proposition 3"/>');
    this.$prop4 = $('<input placeholder="Proposition 4"/>');
    this.$prop5 = $('<input placeholder="Proposition 5"/>');

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

    this.$placeholder.append($name);
    this.$placeholder.append($prop1);
    this.$placeholder.append($prop2);
    this.$placeholder.append($prop3);
    this.$placeholder.append($prop4);
    this.$placeholder.append($prop5);
    
    return this.$placeholder;

}