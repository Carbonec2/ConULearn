<div >
    </br></br></br>
    <?php
    if ($_SESSION['Rights_id'] == 1) {
        echo '<a href="index.php" class="dashboard_features_button">HOME</a>
         <a href="index.php?page=dashboard_teacher" class="dashboard_course">Courses</a>
         <a href="index.php?page=courseCreation" class="dashboard_features_button">Create a Course</a>
  ';
        
    } else {
  if ($_SESSION['Rights_id'] == 2) {
         echo '<a href="index.php" class="dashboard_features_button">HOME</a>
         <a href="index.php?page=dashboard_student" class="dashboard_course">Courses</a>
         <a href="index.php?page=courseRegistration" class="dashboard_features_button">Course Registration</a> 
         
          ';
        }
    }
    ?>
</div>
