<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
    <?php
    echo '<input type="hidden" name="userId" id="userId" value="' . $_SESSION['userId'] . '">';
    ?>

    <div class="dashboardContainer  text-center">

        <h1>Courses</h1>

        <div id="courses_container">
            <!-- random course boxes for testing purposes
            <a href="" class="dashboard_box_link"><div class="dashboard_course_box">SOEN 133 <br/><span class="box_course_semester">Winter 2017</span></div></a>
            <a href="" class="dashboard_box_link"><div class="dashboard_course_box">COMP 346 <br/><span class="box_course_semester">Winter 2017</span></div></a>
            <a href="" class="dashboard_box_link"><div class="dashboard_course_box">COMP 371 <br/><span class="box_course_semester">Winter 2017</span></div></a>
            <a href="" class="dashboard_box_link"><div class="dashboard_course_box">COMP 353 <br/><span class="box_course_semester">Winter 2017</span></div></a>
            <a href="" class="dashboard_box_link"><div class="dashboard_course_box">This here is an overlong course code, although it should not be allowed <br/><span class="box_course_semester">Winter 2017</span></div></a>
            -->
        </div>

        <a href="index.php?page=courseCreation" class="dashboard_box_link"><div class="dashboard_add_course_box">Create a course<br/><span class="box_plus_sign">+</span></div></a>

    </div>

</body>
