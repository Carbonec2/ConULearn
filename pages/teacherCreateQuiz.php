<?php
include_once('includes/dashboardSideNavBar.php');
?>


<body class="dashboard">

    <div class="dashboardcontainer">

        <div class="dashboardDiv container-fluid text-center">

       <h1>Quiz Creation Form</h1> <br/>
       <h2>Please fill out this form to create a quiz. Provide the following: name of the quiz, the date of the quiz, 10 multiple choice questions, 5 possible answers and make sure to indicate the correct answer.</h2>
        <br/>
          

            <div id="quizContainer" >
            
     <table>
        
  <tbody>
<tr> 
<td>Name of the quiz <input id="name" size="50" type="text"> </td> 
</tr>

<tr>
<td>Date of the quiz <input id="date" type="date"> </td> 
</tr>

<tr>
<td>
<h3> Question 1:</h3> <textarea class="questiontext" id="question1"> </textarea>
<br/>

a. <input  size="85" id="q1a" type="text"><input value="1a" name="answers1" type="radio"><br/>
b. <input size="85" id="q1b" type="text"><input value="1b" name="answers1" type="radio"><br/>
c. <input  size="85" id="q1c" type="text"><input value="1c" name="answers1" type="radio"><br/> 
d. <input size="85" id="q1d" type="text"><input value="1d" name="answers1" type="radio"><br/>
e. <input  size="85" id="q1e" type="text"><input value="1e" name="answers1" type="radio"><br/>
 </td>

  </tr>

<tr>
 <td>
 <h3> Question 2:</h3> <textarea class="questiontext" id="question2"> </textarea>
<br/>

a. <input  size="85" id="q2a" type="text"><input value="2a" name="answers2" type="radio"><br/>
b. <input size="85" id="q2b" type="text"><input value="2b" name="answers2" type="radio"><br/>
c. <input  size="85" id="q2c" type="text"><input value="2c" name="answers2" type="radio"><br/>
d. <input size="85" id="q2d" type="text"><input value="2d" name="answers2" type="radio"><br/>
e. <input  size="85" id="q2e" type="text"><input value="2e" name="answers2" type="radio"><br/>

 </td>
 
 </tr>

<tr>
 <td>
 <h3> Question 3:</h3> <textarea class="questiontext" id="question3"> </textarea>
<br/>

a. <input  size="85" id="q3a" type="text"><input value="3a" name="answers3" type="radio"><br/>
b. <input size="85" id="q3b" type="text"><input value="3b" name="answers3" type="radio"><br/>
c. <input  size="85" id="q3c" type="text"><input value="3c" name="answers3" type="radio"><br/>
d. <input size="85" id="q3d" type="text"><input value="3d" name="answers3" type="radio"><br/>
e. <input  size="85" id="q3e" type="text"><input value="3e" name="answers3" type="radio"><br/>

</td>
</tr>

<tr>
<td>
<h3> Question 4:</h3><textarea class="questiontext" id="question4"> </textarea>
<br/>

a. <input  size="85" id="q4a" type="text"><input value="4a" name="answers4" type="radio"><br/>
b. <input size="85" id="q4b" type="text"><input value="4b" name="answers4" type="radio"><br/>
c. <input  size="85" id="q4c" type="text"><input value="4c" name="answers4" type="radio"><br/>
d. <input size="85" id="q4d" type="text"><input value="4d" name="answers4" type="radio"><br/>
e. <input  size="85" id="q4e" type="text"><input value="4e" name="answers4" type="radio"><br/>

</td>

</tr>

<tr>
<td>
<h3> Question 5:</h3><textarea class="questiontext" id="question5"> </textarea>
<br/>
a. <input  size="85" id="q5a" type="text"><input value="5a" name="answers5" type="radio"><br/>
b. <input size="85" id="q5b" type="text"><input value="5b" name="answers5" type="radio"><br/>
c. <input  size="85" id="q5c" type="text"><input value="5c" name="answers5" type="radio"><br/>
d. <input size="85" id="q5d" type="text"><input value="5d" name="answers5" type="radio"><br/>
e. <input  size="85" id="q5e" type="text"><input value="5e" name="answers5" type="radio"><br/>
</td>
</tr>

<tr>
<td>
<h3> Question 6:</h3><textarea class="questiontext" id="question6"> </textarea>
<br/>

a. <input  size="85" id="q6a" type="text"><input value="6a" name="answers6" type="radio"><br/>
b. <input size="85" id="q6b" type="text"><input value="6b" name="answers6" type="radio"><br/>
c. <input  size="85" id="q6c" type="text"><input value="6c" name="answers6" type="radio"><br/>
d. <input size="85" id="q6d" type="text"><input value="6d" name="answers6" type="radio"><br/>
e. <input  size="85" id="q6e" type="text"><input value="6e" name="answers6" type="radio"><br/>
</td>
</tr>

<tr>
<td>
<h3> Question 7:</h3><textarea class="questiontext" id="question7"> </textarea>
<br/>

a. <input  size="85" id="q7a" type="text"><input value="7a" name="answers7" type="radio"><br/>
b. <input size="85" id="q7b" type="text"><input value="7b" name="answers7" type="radio"><br/>
c. <input  size="85" id="q7c" type="text"><input value="7c" name="answers7" type="radio"><br/>
d. <input size="85" id="q7d" type="text"><input value="7d" name="answers7" type="radio"><br/>
e. <input  size="85" id="q7e" type="text"><input value="7e" name="answers7" type="radio"><br/>
</td>

</tr>

<tr>
<td>
<h3> Question 8:</h3><textarea class="questiontext" id="question8"> </textarea>
<br/>

a. <input  size="85" id="q8a" type="text"><input value="8a" name="answer8" type="radio"><br/>
b. <input size="85" id="q8b" type="text"><input value="8b" name="answers8" type="radio"><br/>
c. <input  size="85" id="q8c" type="text"><input value="8c" name="answers8" type="radio"><br/>
d. <input size="85" id="q8d" type="text"><input value="8d" name="answers8" type="radio"><br/>
e. <input  size="85" id="q8e" type="text"><input value="8e" name="answers8" type="radio"><br/>
</td>

</tr>

<tr>
<td>
<h3> Question 9:</h3><textarea class="questiontext" id="question9"> </textarea>
<br/>

a. <input  size="85" id="q9a" type="text"><input value="9a" name="answers9" type="radio"><br/>
b. <input size="85" id="q9b" type="text"><input value="9b" name="answers9" type="radio"><br/>
c. <input  size="85" id="q9c" type="text"><input value="9c" name="answers9" type="radio"><br/>
d. <input size="85" id="q9d" type="text"><input value="9d" name="answers9" type="radio"><br/>
e. <input  size="85" id="q9e" type="text"><input value="9e" name="answers9" type="radio"><br/>
</td>

</tr>

<tr>

<td>
<h3> Question 10:</h3><textarea class="questiontext" id="question10"> </textarea>
<br/>

a. <input  size="85" id="q10a" type="text"><input value="10a" name="answers10" type="radio"><br/>
b. <input size="85" id="q10b" type="text"><input value="10b" name="answers10" type="radio"><br/>
c. <input  size="85" id="q10c" type="text"><input value="10c" name="answers10" type="radio"><br/>
d. <input size="85" id="q10d" type="text"><input value="10d" name="answers10" type="radio"><br/>
e. <input size="85" id="q10e" type="text"> <input value="10e" name="answers10" type="radio"><br/>
</td>
</tr>

</tbody>
</table>
           
   <input type="button" value="Submit" id="createquizform" class="formsButton" />

         <input type="reset" value="Clear" class="formsButton" />
            </div>

        </div>

    </div>

</body>
