<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
    <div class="dashboardContainer  text-center">
        <div id="" class="dashboardDiv container-fluid text-center">

            <?php
            echo '<input type="hidden" name="userId" id="userId" value="' . $_SESSION['userId'] . '">';
            ?>

            <h1 class="title">Create a course</h1>
            <br/>
            <h4 class="subtitle">Please fill out this form to complete the creation of a course</h4>
            Course Number:
            <input type="text" class="formCourseName" id="courseName"  placeholder="Ex: SOEN341">
            <br/>
            <br/>
            <h4 class="subtitle">Please give a brief description of the course including: <br/>
                number of credits, prerequisites needed, content of the course and any <br/>
                other meaningful information.
            </h4>
            Course Description:
            <br/>
            <textarea class="formDescription" id="courseDescription" ></textarea>
            <br/>
            <input type="button" value="Submit" id="btnSubmit" class="formsButton" >

        </div>
    </div>
</body>
