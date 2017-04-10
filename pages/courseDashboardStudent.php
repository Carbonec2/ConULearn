<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">

    <div class="dashboardContainer">
        <div id="consoleLoggerContainer"></div>
        <div class="dashboardCourse" id="coursename">
            <?php
            echo htmlspecialchars($_GET["coursename"]);
            ?>
        </div>
        <div class="dashboardCourseDiv"> 
            <div class="dashboard_title_container">
                <h1 class="dashboardCourseTitle">Announcements</h1>
            </div>
            <div class="dashboard_announcements_container" id="announcementsContainer">
                
            </div>
            <div class="dashboard_new_button_container">
                <!-- intentionally empty; student can't make announcements -->
            </div>
        </div>

        <div class="dashboardContainer2">
            <div class="leftSmallDiv">
                <div class="dashboard_title_container">
                    <h1 class="dashboardCourseTitle">Quizzes</h1>
                </div>
                <div class="dashboard_quizzes_container" id="quizContainer">
                    
                </div>
                <div class="dashboard_new_button_container">
                    <!-- intentionally empty; student can't make quizzes -->
                </div>
            </div>

            <div class="rightSmallDiv">
                <div class="dashboard_title_container">
                    <h1 class="dashboardCourseTitle">Question and Answer</h1>
                </div>          
                <div class="dashboard_discussions_container" id="questionsAnswersContainer">
                    
                </div>
                <!--
                <div class="dashboard_new_button_container">
                    <a href="index.php?page=studentAskQuestion"><h2 class="dashboard_new_button">+ new question</h2></a>
                </div>
-->
            </div>
        </div>
    </div>

</body>
