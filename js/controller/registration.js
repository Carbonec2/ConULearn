$(document).ready(function () {
    $("#txtUser").focus();
    
    bind();
});

function bind() {
    $("#btnSignup").click(function () {
        if($("#txtPassword").val() === $("#txtConfirmPassword").val()){
            var identifiers = {user: $("#txtUser").val(), password: $("#txtPassword").val(), rightsid: $("input[name='rightsid']:checked").val()};
            signup(identifiers, signupOk, signupFail);
        }else{
            $("#messageBox").html("Passwords don't match.");
        }
    });
    
    $("#txtConfirmPassword").keyup(function(event){
        if(event.keyCode == 13){
            $("#btnSignup").click();
    }});
}

function signup(identifiers, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "controller-model.php",
        data: {controller: 'signup', method: 'signup', OV: JSON.stringify(identifiers)},
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

function signupOk() {

    $("#messageBox").html("Registration successful!");

}

function signupFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("Registration error: this username already exists.");
}