<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">

  <div class="dashboardContainer">

        <div class="dashboardDiv container-fluid text-center">
            <h1>Quiz Creation Form</h1> <br/>
            <h2>Please fill out this form to create a quiz. Provide the following: name of the quiz, the date of the quiz, 10 multiple choice questions, 5 possible answers and make sure to indicate the correct answer.</h2>
            <br/>
            <div id="quizContainer" ></div>
            <input type="button" value="Submit" id="saveQuiz" class="formsButton" />
            <input type="reset" value="Clear" class="formsButton" />
        </div>

    </div>

</body>
