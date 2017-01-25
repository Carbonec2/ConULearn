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

    $("#messageBox").html("Connection successful!");

}

function connectFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("Error");
}