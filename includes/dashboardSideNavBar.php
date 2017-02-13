<div >
    </br></br></br>
    <?php
     if ($_SESSION['Rights_id'] == 1) {
  echo '<a href="index.php?page=dashboard_teacher" class="dashboard_course">Dashboard</a>
  <a href="index.php?page=courseCreation" class="dashboard_features_button">Create a Course</a>
  <a href="index.php?page=courseManagement" class="dashboard_features_button">Courses</a>';
  }
 else {
            if ($_SESSION['Rights_id'] == 2) {
      echo '<div class="dashboard_features_button">Course Registration</div>
  <div class="dashboard_features_button">Courses</div>';
   }
 }
 ?>
</div>
