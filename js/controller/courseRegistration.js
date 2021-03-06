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
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(objects);

            $('#courseName').html(objects.name + " Course Description");
            $('#courseDescription').html(objects.description);
            $('#courseTeacher').html('<h4>Teacher: ' + objects.user + '</h4>');
        }
    });
}

function getCourses(filters, successCallback, errorCallback) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'course', method: 'getall', filters: JSON.stringify(filters)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);


            console.log(objects);
            for (var i = 0; i < objects.length; i++) {
                $('#course_selection').html($('#course_selection').html() + '<option value="' + objects[i].id + '">' + objects[i].name + '</option>');
            }
        }
    });
}

function addQuizStudent(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'quizstudent', method: 'insertcurrentuserid', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            //var objects = jQuery.parseJSON(object);
            
            //console.log(objects.id);
        }
    });
}

function addQuizStudentForAllQuizzes(identifiers) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'course', method: 'getmerge', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            objects.forEach(function (entry) {
                var identifiers = {Quiz_id: entry.id};
                
                addQuizStudent(identifiers);
            });
            
            console.log(objects.id);
        }
    });
}

function addCourse(identifiers, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'courseuser', method: 'insert', OV: JSON.stringify(identifiers)},
        async: false,
        error: function () {
            //error 500
        },
        success: function (object) {
            //window.location = "index.php?page=dashboardStudent";


            var objects = jQuery.parseJSON(object);

            console.log(objects);

            if (typeof objects.error.ok === "undefined" || objects.error.ok !== true) {
                errorCallback();
            } else {
                var identifiers = {Course_id: objects.obj.Course_id};
                addQuizStudentForAllQuizzes(identifiers);

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

    window.location = "index.php?page=dashboardStudent";

}

function addCourseFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    $("#messageBox").html("You are already registered to this course.");
}