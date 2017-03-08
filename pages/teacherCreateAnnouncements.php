<?php
include_once('includes/dashboardSideNavBar.php');
?>
<div id="consoleLoggerContainer" style="z-index:10000;"></div>
<body class="dashboard">
    <div class="dashboardcontainer">
        <div class="dashboardDiv container-fluid text-center">
            <h2>Announcement Form</h2>
            <form>
                <textarea class="announcement" type="text" name="teacher_Announcement" id="announcement"></textarea>
                <br/>
                <input type="button" value="Submit" id="send" style="width:100px; 
                       height:50px; display:inline-block; margin:10px;"/>
                <br/>
                <button>Clear</button>
            </form>
        </div>
    </div>
</body>
