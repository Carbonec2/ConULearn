<?php
include_once('includes/dashboardSideNavBar.php');
?>
<body class="dashboard">
    <div class="dashboardcontainer  text-center">
        <div id="" class="dashboardDiv container-fluid text-center">
            <?php
            echo '<input type="hidden" name="userId" id="userId" value="' . $_SESSION['userId'] . '">';
            ?>

            <h1 class="title">Create a course</h1>
            </br>
            <h4 class="subtitle">Please fill out this form to complete the creation of a course</h4>

           
            Course Name:
            <input type="text" class="formText" id="courseName" style="width:150px">
           Course ID:   
            <input type="text" class="formText" id="courseID" style="width:150px">
       </br></br>
        
 <h4 class="subtitle">Please give a brief description of the course including: number of credits, prerequisites needed, content of the course and any other meaningful information. </h4>

            Course Description:
            </br>
            <textarea class="formText" id="courseDescription" style="width:450px;height:250px; resize: none;" ></textarea>
            </br>
            <input type="button" value="Submit" id="btnSubmit" class="formsButton" class="creationformButton" >



        </div>
    </div>
</body>