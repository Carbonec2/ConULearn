var consoleLogger;

$(document).ready(function () {
    bind();
    
    consoleLogger = new ConsoleLogger($("#consoleLoggerContainer"));
});

function bind() {

    $("#send").click(function () {
        var content = {description: $("#announcement").val(), Course_id: $_GET('Course_id')};

        sendAnnouncement(content, function () {
            consoleLogger.goodNotice("The announcement was correctly recorded.");
        },
        function () {
            consoleLogger.badNotice("There was a problem while recording the announcement.");
        });
    });
}

function sendAnnouncement(content, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'save', OV: JSON.stringify(content)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            if (typeof (successCallback) !== "undefined") {
                successCallback(objects);
            }
        }
    });
}