<?php
include_once('includes/dashboardSideNavBar.php');
?>

<body class="dashboard">
    <div class="dashboardContainer  text-center">
        <div class="container-fluid dashboardDiv  text-center">
            <h1>Ask your question</h1>

              <h3>The question will be sent to the professor and will be answered as soon as possible. </h3>

              <form>
                  <br/>

                  <textarea class="studentQuestion" id="studentQuestion"></textarea>

                  <br/>
                  <br/>
                  <br/>

                  <input type="button" value="Submit" id="sendQuestion" />

                  <input type="reset" value="Clear" id="ClearQuestion" />

              </form>
        </div>
    </div>
</body>
