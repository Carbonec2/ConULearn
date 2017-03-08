<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
    
    <div class="dashboardcontainer">
	    <div class="dashboardcourse" id="coursename">
			<?php
			echo htmlspecialchars($_GET["coursename"]);
			?>
		</div>
		<div class="dashboardcourseDiv"> 
			<div class="dashboard_title_container">
				<h1 class="dashboardcoursetitle">Announcements</h1>
			</div>
			<div class="dashboard_announcements_container" id="announcementsContainer">
				<!-- Example using multiple annoucements
				<h2 class="dashboardcoursesub">There will be a quiz March 10</h2>
				<h2 class="dashboardcoursesub">There will be a quiz March 12</h2>
				<h2 class="dashboardcoursesub" >Quiz 1 grades are up</h2>
				<h2 class="dashboardcoursesub" >There will be a quiz Arpil 10</h2>
				<h2 class="dashboardcoursesub" >Quiz 2 grades are up</h2>
				<h2 class="dashboardcoursesub">There will be a quiz March 8</h2>
				-->
			</div>
			<div class="dashboard_add_new_button_container">
				<!-- intentionally empty; student can't make announcements -->
			</div>
		</div>

	    <div class="dashboardcontainer2">
			<div class="leftSmallDiv">
				<div class="dashboard_title_container">
					<h1 class="dashboardcoursetitle">Quizzes</h1>
				</div>
				<div class="dashboard_quizzes_container">
					<!-- Example using multiple quizzes
					<a href=""><h2 class="dashboardcoursesub">Quiz 1</h2></a>
					<a href=""><h2 class="dashboardcoursesub">Quiz 2</h2></a>
					<a href=""><h2 class="dashboardcoursesub">Quiz 3</h2></a>
					<a href=""><h2 class="dashboardcoursesub">Quiz 4</h2></a>
					<a href=""><h2 class="dashboardcoursesub">Quiz 5</h2></a>
					<a href=""><h2 class="dashboardcoursesub">Quiz 6</h2></a>
					-->
				</div>
				<div class="dashboard_add_new_button_container">
					<!-- intentionally empty; student can't make quizzes -->
				</div>
			</div>

	        <div class="rightSmallDiv">
				<div class="dashboard_title_container">
					<h1 class="dashboardcoursetitle">Discussion Board</h1>
				</div>          
				<div class="dashboard_discussions_container">
					<!-- Example using multiple topics
					<a href=""><h2 class="dashboardcoursesub">Regarding question #2</h2></a>
					<a href=""><h2 class="dashboardcoursesub">what is on the exam</h2></a>
					<a href=""><h2 class="dashboardcoursesub">mistake on quiz #2, Q9</h2></a>
					<a href=""><h2 class="dashboardcoursesub">hello</h2></a>
					<a href=""><h2 class="dashboardcoursesub">quiz 3 is hard</h2></a>
					<a href=""><h2 class="dashboardcoursesub">test</h2></a>
					-->
				</div>
				<div class="dashboard_add_new_button_container">
					<a href=""><h2 class="dashboard_add_new_button">+ new topic</h2></a>
				</div>

	        </div>
		</div>
	</div>

</body>    
