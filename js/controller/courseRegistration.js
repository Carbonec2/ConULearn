$(document).ready(function () {
    bind();
});

function bind() {
    var filters = {};
    getCourses(filters, getCoursesOk, getCoursesFail);

    $("#btnSubmit").click(function () {
        if ($("#course_selection").val()) {
            var identifiers = {Course_id: $("#course_selection").val()};
            addCourse(identifiers, addCourseOk, addCourseFail);
        } else {
            $("#messageBox").html("No course is selected.");
        }
    });

    $("#course_selection").change(function () {
            $("#messageBox").html("");
        if ($("#course_selection").val()) {
            getCourseDescription();
        } else {
            $('#courseName').html("");
            $('#courseDescription').html("");
        }
    });
}

function getCourseDescription() {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'course', method: 'get', id: $("#course_selection").val()},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(objects);

            $('#courseName').html(objects.name + " Course Description");
            $('#courseDescription').html(objects.description);
        }
    });
}

function getCourses(filters, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'course', method: 'getall', filters: JSON.stringify(filters)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);


            console.log(objects);
            for (var i = 0; i < objects.length; i++) {
                $('#course_selection').html($('#course_selection').html() + '<option value="' + objects[i].id + '">' + objects[i].name + '</option>');
            }

            /*
             if (typeof objects.error.ok === "undefined" || objects.error.ok !== true) {
             errorCallback();
             } else {
             successCallback(objects);
             }
             */
        }
    });
}

function addCourse(identifiers, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'courseuser', method: 'insert', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboard_student";


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

function getCoursesOk(o) {

}

function getCoursesFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    //$("#messageBox").html("Error while finding courses.");
}

function addCourseOk() {

    window.location = "index.php?page=dashboard_student";

}

function addCourseFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("You are already registered to this course.");
}