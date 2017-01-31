$(document).ready(function () {

    bind();
});

function bind() {
    $("#btnConnect").click(function () {
        var identifiers = {user: $("#txtUser").val(), password: $("#txtPassword").val()};
        connect(identifiers, connectOk, connectFail);
    });
}

function connect(identifiers, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "controller-model.php",
        data: {controller: 'connect', method: 'connect', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);
            
            console.log(objects);
            if (typeof objects.error.ok === "undefined" || objects.error.ok !== true) {
                errorCallback();
            } else {
                successCallback(objects);
            }
        }
    });
}

function connectOk() {

    $("#messageBox").html("Connection successful! <a href=\"index.php\">Go to Home page</a>");
    $("#txtUser").hide();
    $("#txtPassword").hide();
    $("#btnConnect").hide();
}

function connectFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("Error while connecting: wrong username or password");
}