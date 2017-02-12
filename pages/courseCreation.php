<div id="coursecreation" class="container-fluid text-center">
    <?php
                echo '<input type="hidden" name="userId" id="userId" value="' . $_SESSION['userId'] . '">';
        ?>
		<h1>Create a course</h1>
		
		<h2>Please fill out this form to complete the creation of a course</h2>
		
		<h3>Course ID</h3>
		
		<input type="text" class="formText" id="courseID" style="width:150px">
                
                <h3>Course Name</h3>
		
		<input type="text" class="formText" id="courseName" style="width:450px">
	
		<h4>Please give a brief description of the course including: number of credits, prerequisites needed, content of the course and any other meaningful information. </h4>
		
		<h3>Course Description</h3>
		
		<textarea class="formText" id="courseDescription" style="width:450px;height:250px; resize: none;" ></textarea>
		
	    <h5>Click here to submit</h5>
	
		<input type="button" value="Submit" id="btnSubmit" class="creationformButton">


	
		</div>
