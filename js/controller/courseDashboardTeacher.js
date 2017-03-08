$(document).ready(function () {

    $("#createAnnouncementLink").attr('href', 'index.php?page=teacherCreateAnnouncements&Course_id=' + $_GET('Course_id'));

    fillAnnouncements({});

    bind();
});

function bind() {

}

function fillAnnouncements(content) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'getallfromuserid', OV: content},
        async: true,
        error: function () {
            //error 500
        },
        success: function (object) {
            var objects = jQuery.parseJSON(object);

            console.log(objects);
            
            $("#announcementsContainer").css('overflow-y', 'scroll');

            objects.forEach(function (entry) {
                console.log(entry);
                var $announcement = $('<div></div>');

                $announcement.css('background-color', '#dddddd');
                $announcement.css('padding', '10px');
                $announcement.css('margin', '5px');

                $announcement.html(entry.description);

                if (entry.description != null && entry.description.length > 0) {
                    $("#announcementsContainer").append($announcement);
                }
            });

            /*
             for(var i=0;i<objects.length;i++){
             $('#courses_container').html($('#courses_container').html()+'<a href="index.php?page=courseDashboardTeacher" class="dashboard_box_link"><div class="dashboard_course_box">'+objects[i].name+'<br/><span class="box_course_semester">Winter 2017</span></div></a>');
             }*/

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