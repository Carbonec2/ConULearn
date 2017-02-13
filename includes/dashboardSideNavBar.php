<div >
    </br></br></br>  
    <?php
     if ($_SESSION['Rights_id'] == 1) {
  echo '<a href="index.php?page=dashboard_teacher" class="dashboard_course">Dashboard</a>
  <a href="index.php?page=courseCreation" class="dashboard_features_button">Create a Course</a>
  <a href="index.php?page=courseManagement" class="dashboard_features_button">Courses</a>
  <div class="dashboard_course_features">Students</div>
  <div class="dashboard_course_features">Create a Quiz</div>
  <div class="dashboard_course_features">Quizzes</div>
  <div class="dashboard_course_features">Feedback + Grades</div>
  <div class="dashboard_course_features">Discussion</div>';
  }
 else {
            if ($_SESSION['Rights_id'] == 2) {
      echo '<div class="dashboard_features_button">Course Registration</div>
  <div class="dashboard_course">SOEN 341</div>
  <div class="dashboard_course_features">Feedback + Grades</div>
  <div class="dashboard_course_features">Quiz 1</div>
  <div class="dashboard_course_features">Quiz 2</div>
  <div class="dashboard_course_features">Quiz 3</div>
  <div class="dashboard_course_features">Discussion</div>';
   }
 }
 ?>
</div>

