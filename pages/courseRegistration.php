<?php
include_once('includes/dashboardSideNavBar.php');
?>
<body class="dashboard">
    <div class="dashboardcontainer  text-center">
        <div class="container-fluid dashboardDiv  text-center">
            <!-- Insert what you want inside dashboard here-->
            <h1>Course Registration</h1>
            Select a course to register:
            <select id="course_selection">
                <!-- <option value="volvo">Volvo</option> -->
            </select>
            <br/>
            <h3><span id="courseName"></span></h3>
            <div id="courseDescription"></div>
            <br/>
            <input type="button" value="Submit" id="btnSubmit" class="formsButton" >
            <div id="messageBox"></div>
        </div>
    </div>
</body>