$(document).ready(function () {

    bind();
});

function bind() {

    $("#btnConnect").click(function () {
        var identifiers = {user: $("#txtUser").val(), password: $("#password").val()};
        connect(identifiers, connectOk, connectFail);
    });
}

function connect(object, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "controller-model.php",
        data: {controller: 'connect', method: 'connect', OV: JSON.stringify(object)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);
            if (typeof errorCallback.error.ok === "undefined") {
                errorCallback();
            } else {
                successCallback(objects);
            }
        }
    });
}

function connectOk() {

    $("#mainPanel").html("Connection successful!");

}

function connectFail(callbackObject) {

    console.log(callbackObject);

    $("#mainPanel").html("Error <br/>" + $("#mainPanel").html());
}