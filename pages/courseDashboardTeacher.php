<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
    <div class="dashboardContainer">
        <div id="consoleLoggerContainer" ></div>
        <div class="dashboardCourse" id="coursename">

            <?php
            echo htmlspecialchars($_GET["coursename"]);

            echo '<input type="hidden" name="userId" id="userId" value="' . $_SESSION['userId'] . '">';
            ?>

        </div>

        <div class="dashboardCourseDiv">
            <div class="dashboard_title_container">
                <h1 class="dashboardCourseTitle">Announcements</h1>
            </div>

            <div class="dashboard_announcements_container" id="announcementsContainer">
                
            </div>

            <div class="dashboard_new_button_container">
                <a href="index.php?page=teacherCreateAnnouncements" id="createAnnouncementLink"><h2 class="dashboard_new_button">+ new announcement</h2></a>
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
                    <?php
                    echo '<a href="index.php?page=teacherCreateQuiz&coursename=' . $_GET["coursename"] . '&Course_id=' . $_GET["Course_id"] . '"><h2 class="dashboard_new_button">+ new quiz</h2></a>';
                    ?>
                </div>

            </div>

            <div class="rightSmallDiv">

                <div class="dashboard_title_container">
                    <h1 class="dashboardCourseTitle">Question & Answer</h1>
                </div>

                <div class="dashboard_discussions_container">
                    <div id="questionsAnswersContainer"></div>
                </div>

                <div class="dashboard_new_button_container">
                    
                </div>

            </div>
        </div>
    </div>

</body>
