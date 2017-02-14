$(document).ready(function () {
    $("#courseID").focus();
    
    bind();
});

function bind() {
    $("#btnSubmit").click(function () {
            var identifiers = {id: $("#courseID").val(), name: $("#courseName").val(), description: $("#courseDescription").val()};
            addCourse(identifiers, addCourseOk, addCourseFail);
    });
}

function addCourse(identifiers, successCallback, errorCallback) {
    alert($("#userId").val());

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'course', method: 'insert', OV: JSON.stringify(identifiers)},
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

function addCourseOk() {

    $("#messageBox").html(" Successfully added course!");

}

function addCourseFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("Error while attempting to add the course.");
}