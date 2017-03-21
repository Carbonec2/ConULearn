<?php
include_once('includes/dashboardSideNavBar.php');
?>
<div id="consoleLoggerContainer" style="z-index:10000;"></div>
<body class="dashboard">
    <div class="dashboardContainer">
        <div class="dashboardDiv container-fluid text-center">
            <h2>Announcement Form</h2>
            <h3>Please note that you will be able to edit and/or delete announcements once they have been posted </h3>
            <form>
                <textarea class="announcement" id="announcement"></textarea>
                <br/>
                <input type="button" value="Submit" id="send" class="formsButton" />
                <input type="reset" value="Clear" class="formsButton" />
            </form>
        </div>
    </div>
</body>
