<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
	<div class="dashboardContainer">
		<div class="dashboardDiv container-fluid text-center">
			<h1><strong>Quiz Creation Form</strong></h1> <br/>
			<h3>Please fill out the form below to create a quiz. Provide the following: the title of the quiz, the due date, the multiple choice questions, the 5 possible answers for each question, and mark the correct answer by selecting the corresponding radio button.  </h3>
			<br/>
			<form>
				<div id="quizContainer" ></div>
				<input type="button" value="Submit" id="saveQuiz" class="formsButton" />
				<input type="reset" value="Clear" class="formsButton" />
			</form>
		</div>
	</div>
</body>
