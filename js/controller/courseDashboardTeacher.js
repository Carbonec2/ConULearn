$(document).ready(function () {

    $("#createAnnouncementLink").attr('href', 'index.php?page=teacherCreateAnnouncements&Course_id=' + $_GET('Course_id'));

    var identifiers = {Course_id: $_GET('Course_id')};
    fillAnnouncements(identifiers);

    bind();
});

function bind() {
    $('#editButton').click( function() {
        
        
    
    } );
}

function fillAnnouncements(content) {

    $.ajax({
        type: "POST",
        url: "database-model.php",
        data: {DAO: 'announcements', method: 'getallfromcourseid', OV: JSON.stringify(content)},
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

                $announcement.html('<a id="editButton" href="#">Edit</a> ' + entry.description);

                if (entry.description != null && entry.description.length > 0) {
                    $("#announcementsContainer").append($announcement);
                }
            });

        }
    });

}