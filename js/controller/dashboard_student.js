$(document).ready(function () {
    bind();
});

function bind() {
    var identifiers = {};
    getCourses(identifiers, getCoursesOk, getCoursesFail);
}

function getCourses(identifiers, successCallback, errorCallback) {
    
    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'courseuser', method: 'getall2', OV: JSON.stringify(identifiers)},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);


            console.log(objects);
            for(var i=0;i<objects.length;i++){
                $('#courses_container').html($('#courses_container').html()+'<a href="" class="dashboard_box_link"><div class="dashboard_course_box">'+objects[i].name+'<br/><span class="box_course_semester">Winter 2017</span></div></a>');
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

function getCoursesOk(o) {
    
}

function getCoursesFail(callbackObject) {

    console.log(callbackObject);

    //Make more complete message here
    //$("#messageBox").html("Error while finding courses.");
}