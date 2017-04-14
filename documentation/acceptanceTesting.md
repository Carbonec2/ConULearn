## 1.1 Sign Up as a Teacher
### **User Story:** As a teacher, I should be able to select the teacher account when I sign up, so that I can have the right privileges.

**Happy Ending:** The user successfully creates a teacher account

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.1.1 Click on "Sign Up" in the top navigation bar	|  |	The user should be redirected to the sign-up page | Pass
1.1.2 Enter the username in the first textbox. | Username: Teacher	| The username should be displayed in the textbox. | Pass
1.1.3 Enter a password in the second textbox.	|Password: 123456	| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
1.1.4 Confirm the password in the third textbox by entering the same password as step 1.1.3.	| Password: 123456 |	The password should be displayed in the textbox. (Hidden as asterisk) | Pass
1.1.5 Select the radio button teacher.		|  Radio button: Teacher		| The radio button of Teacher should be checked. | Pass
1.1.6 Click on the button "Sign Up"		|  	| 	The message "Registration successful" should appear on top of the username text box. | Pass

**Unhappy Ending 1**: Username already exist

**Preconditions:**
- Steps 1.1.1 to 1.1.6 must be done.

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.1.7 Click on “Sign Up” in the top navigation bar | | The user should be redirected to the sign-up page  | Pass
1.1.8 Enter the username in the first textbox.  | Username: Teacher  | The username should be displayed in the textbox.  | Pass
1.1.9 Enter a password in the second textbox.  | Password: 123456  | The password should be displayed in the textbox. (Hidden as asterisks)  | Pass
1.1.10 Confirm the password in the third textbox by entering the same password as step 1.1.9  | Password: 123456  | The password should be displayed in the textbox.  (Hidden as asterisks)  | Pass
1.1.11 Select the radio button teacher.  | Radio button: Teacher  | The radio button of Teacher should be checked.  | Pass
1.1.12 Click on the button “Sign Up”  |  |  The message “Registration error: this username already exists.” should appear on top of the username text box.  | Pass

**Unhappy Ending 2**: Confirmation password does not match

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.1.13 Click on “Sign Up” in the top navigation bar  |   | The user should be redirected to the sign-up page  | Pass
1.1.14 Enter the username in the first textbox.  | Username: NewTeacher  | The username should be displayed in the textbox.  | Pass
1.1.15 Enter a password in the second textbox.  | Password: 123456  | The password should be displayed in the textbox. (Hidden as asterisks)  | Pass
1.1.16 Confirm the password in the third textbox by entering a different password as step 1.1.15  | Password: 12345678  | The password should be displayed in the textbox. (Hidden as asterisks)  | Pass
1.1.17 Select the radio button teacher.  | Radio button: Teacher  | The radio button of Teacher should be checked.  | Pass
1.1.18 Click on the button “Sign Up”   |   | The message “Passwords don't match.” should appear on top of the username text box. | Pass

## 1.2	Sign Up as a Student
### **User Story:** As a student, I should be able to select the student account when I sign up, so that I can have the right privileges.

**Happy Ending:** The user successfully creates a student account

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.2.1 Click on "Sign Up" in the top navigation bar		| 	| 	The user should be redirected to the sign-up page | Pass
1.2.2 Enter the username in the first textbox.	| 	Username: Student		| The username should be displayed in the textbox. | Pass
1.2.3 Enter a password in the second textbox.	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
1.2.4 Confirm the password in the third textbox by entering the same password as step 1.2.3		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
1.2.5 Select the radio button teacher.		| Radio button: Student		| The radio button of Teacher should be checked. | Pass
1.2.6 Click on the button "Sign Up"			| 	| The message "Registration successful" should appear on top of the username text box. | Pass

**Unhappy Ending 1 :** Username already exist

**Precondition:**
- Steps 1.2.1 to 1.2.5 must be done.

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.2.6 Click on “Sign Up” in the top navigation bar 	| 	|  The user should be redirected to the sign-up page 	| Pass
1.2.7 Enter the username in the first textbox. 	| Username: Student 	| The username should be displayed in the textbox.	| Pass
1.2.8 Enter a password in the second textbox.	| Password: 123456 	| The password should be displayed in the textbox. (Hidden as asterisks)  	| Pass
1.2.9 Confirm the password in the third textbox by entering the same password as step 1.2.8 	| Password: 123456 	| The password should be displayed in the textbox. (Hidden as asterisks)  	| Pass
1.2.10 Select the radio button teacher. 	| Radio button: Student 	| The radio button of Teacher should be checked.  	| Pass
1.2.11 Click on the button “Sign Up” 	| 	| The message “Registration unsuccessful; username already exist” should appear on top of the username text box. | Pass


**Unhappy ending 2 :** Confirmation password does not match

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
1.2.12 Click on “Sign Up” in the top navigation bar | | The user should be redirected to the sign-up page |Pass
1.2.13 Enter the username in the first textbox. | Username: NewStudent | The username should be displayed in the textbox. |Pass
1.2.14 Enter a password in the second textbox. | Password: 123456 | The password should be displayed in the textbox. (Hidden as asterisks) |Pass
1.2.15 Confirm the password in the third textbox by entering the same password as step 1.2.14 | Password: 12345678 | The password should be displayed in the textbox. (Hidden as asterisks) |Pass
1.2.16 Select the radio button teacher. | Radio button: Student | The radio button of Teacher should be checked. |Pass
1.2.17 Click on the button “Sign Up” | |  The message “Registration unsuccessful; passwords do not match” should appear on top of the username text box. |Pass

## 2.1 Sign in as a Teacher
### **User Story:** As a teacher, I want to sign in as a teacher so that I can create quiz, announcements, answer to students’ questions.  
**Precondition:**
- A teacher account must be created following the steps 1.1.1 to 1.1.6 [See 1.1 Sign Up as Teacher]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
2.1.1 Click on "Sign in" at the top of the navigation bar.	| 	| 		The user should be redirected to the sign-in page. | Pass
2.1.2 Enter the username that you have created when you signed up.		| Username: Teacher		| The username should be displayed in the textbox. | Pass
2.1.3 Enter password corresponding to that username	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
2.1.4 Confirm the password by re-entering the same password as step 2.1.3		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
2.1.5 Click on the button "Connect"		| 	| 	The teacher is redirected to another page where he should see the courses that he has created. Since the teacher has not created any course yet, the teacher should see the button "Create a course" in the middle of the page. | Pass


## 2.2	Sign in as a Student
### **User Story:** As a student, I want to sign in as a student so that I can take quizzes, ask questions and see important announcements.
**Precondition:**
- A student account must be created following the steps 1.2.1 to 1.2.6 [See 1.1 Sign Up as Student]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
2.2.1 Click on "Sign in" at the top of the navigation bar.	| 	| 		The user should be redirected to the sign-in page. | Pass
2.2.2 Enter the username that you have created when you signed up.		| Username: Student		| The username should be displayed in the textbox. | Pass
2.2.3 Enter password corresponding to that username	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
2.2.4 Confirm the password by re-entering the same password as step 2.2.3		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk) | Pass
2.2.5 Click on the button "Connect"		| 	| 	The student is redirected to another page where he should see all his registered courses. Since the student hasn’t registered to any course yet, the student should see the button "Register for a class" in the middle of the page. | Pass

## 3.	Course Creation
### **User Story:** As a teacher, I want to create a course so that students can register to it.
**Precondition:**  
- Must be signed in as a teacher. [See 2.1. Sign in as Teacher]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
3.1 Click on the button "Create a course" in the side navigation bar or in the middle of the page. |  | 		The user should be redirected to the course creation page. | Pass
3.2 Enter the Course Number in the first textbox. | 	Course Number: Soen341 | 	The Course Number should be displayed in the textbox. | Pass
3.3 Enter the course description in the bigger textbox | 	Course Description:This is a course description for the course Soen 341. | 	The course description should be displayed in the bigger textbox. | Pass
3.4 Click on the button "Submit"	 |  | 	The user should be redirected back to the course page where he should see a new button with the name of the course that he just created (Soen 341 winter 2017) at the left of the button "Create a Course". | Pass

## 4.	Teacher Course List
### User Story: As a teacher, I want to see all the courses that I have created so that I can makes quizzes and announcements for the appropriate courses.
**Precondition:**
- Must be signed in as a teacher. [See 2.1. Sign in as Teacher]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
4.1 Click on the button "Create a course" in the side navigation bar or in the middle of the page.	 |  | 	The user should be redirected to the course creation page. | Pass
4.2 Enter the Course Number in the first textbox.	 | Course Number: Comp 346	 | The Course Number should be displayed in the textbox. | Pass
4.3 Enter the course description in the bigger textbox. | Course Description: This is a course description for the course Comp 346. | 	The course description should be displayed in the bigger textbox. | Pass
4.4 Click on the "Submit" button.	 |  | 	The user should be redirected back to the course page where he should see a new button with the name of the course that he just created (Soen 341 winter 2017) at the left of the button "Create a Course". | Pass
4.5 Click on the button "Create a course" in the side navigation bar or in the middle of the page. |  | 		The user should be redirected to the course creation page. | Pass
4.6 Enter the Course Number in the first textbox. | 	Course Number: SOEN 331 | 	The Course Number should be displayed in the textbox. | Pass
4.7 Enter the course description in the bigger textbox | 	Course Description:This is a course description for the course Soen 331.	 | The course description should be displayed in the bigger textbox. | Pass
4.8 Click "Submit" button	 |  | 	The user should be redirected back to the course page where he should see all the courses that he has created (Soen341, Comp 346. Soen 331) | Pass

##  5.	Course Registration
### User Story: As a student, I want to be able to register to a class so that I can complete online evaluations.

**Happy Ending:** The student successfully register to a course

**Preconditions:**
- Must be signed in as a student.  [See 2.2 Sign in as Student].
- And a course must be created by a teacher [See 3. Course Creation].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
5.1 Click on the button "Register for a class" or on "Course Registration" on the left navigation bar. |  | 		The user should be redirected to the course registration page. | Pass
5.2 Click on the dropdown menu. |  | 		A dropdown list of the available courses should appear below the dropdown menu. | Pass
5.3 Click on the course of your choice.	 | Course to register:Soen 341 [Created in 5. Create a course]	 | The course is selected. | Pass
5.4 Click on the button "Submit"	 |  | 	The student should be redirected to the courses page and a button with the course that he just registered to should appear in the course list.  | Pass

**Unhappy Ending 1:** Student cannot register to the same course more than once.

**Precondition:**
- Steps 5.1 to 5.4 must be done  

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
5.5 Click on the button “Register for a class” or on “Course Registration” on the left navigation bar  |  |  The user should be redirected to the course registration page.  | Pass
5.6 Click on the dropdown menu.  |  | A dropdown list of the available courses should appear below the dropdown menu.  | Pass
5.7 Click on the course of your choice.  | Course to register: Soen 341 [ Same course created in 5.3]   | The course is selected.  | Pass
5.8 Click on the button “Submit”  |  | A message "You are already registered to this course" should appear below the course description.   | Pass

## 6.	Teacher dashboard
### User Story: As a teacher, I want to be able to see the announcements/quizzes I have created and Questions of my students.
**Precondition:**
- Must be signed in as a teacher.  [See 2.1. Sign in as Teacher]
- A course must be created by teacher [See 3. Create a Course].
- Announcements must be created. [See 7.Teacher Announcement]
- Quizzes must be created. [See 10. Quiz Creation]
- Students must have posted questions. [See 14. Question and Answers]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
6.1 Click on “Courses” on the left navigation bar or “DASHBOARD” on the top navigation bar to access the course list.  |  |  The user should be directed to the course list page.  | Pass
6.2 Click on the course for which you desire to view the announcements, quizzes and questions.  |	 Course Number: Soen341  |  The user should be directed to the course page (Soen341) that display three text fields with “Announcements”, “Quizzes” and “Questions and Answers” as titles respectively.  | Pass
6.3 View in the Announcement field.  |  |  The user should see a list of announcements that were already created.  | Pass
6.4 View in the Quizzes field found on the bottom right of Announcement field.  |  |  The user should see a list of Quiz’s titles that were already created.  | Pass
6.5 View in the Question and Answers field found on the bottom left of Announcement field.  |  |  The user should see a list of questions that students posted.  | Pass

## 7. Create Teacher Announcements
### User Story: As a teacher, I want to make important announcements, to keep the students registered to my classes updated.
**Precondition:**       
 - Must be signed in as a teacher. [See 2.1. Sign in as Teacher]
 - And a course must be created by teacher [See 3. Create a Course].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
7.1 Click on “Courses” on the left navigation bar or “DASHBOARD” on the top navigation bar to access the course list.  |  |  The user should be directed to the course list page.  | Pass
7.2 Click on the course for which you desire to make an announcement.  |  Course: Soen341 [See 3. Create a Course]  |  The user should be directed to the course page with the course number (Soen341) on top of the page and “Announcements”, “Quizzes” and “Questions and Answers” as options to access.  | Pass
7.3 Click on the “new announcement” in the Announcements field, to create an announcement.  |  |  The user should be directed to the “Announcement Form” page with a big textbox to be filled with unlimited number of words.  | Pass
7.4 Enter in the textbox, the description of the announcement.  |  Announcement Description: The announcement will be deared.  |  The announcement description should be displayed in the textbox.  | Pass
7.5 Click on “Clear” button at the bottom of the textbox to remove the unsaved announcement.  |  |  An empty textbox should be displayed and the announcement description can be entered again.  | Pass
7.6 Enter in the textbox, the description of the announcement.  |  Announcement Description: cThe final project is due in a week.  |  The announcement description should be displayed in the textbox.  |Pass
7.7 Click on “Submit” button to save announcement.  |  | The user should be redirected back to the course number (Soen341) page where he should see all the announcements that he created in the Announcements field. | Pass

## 8.	Student dashboard
### User Story: As a student, I want to see my teachers' announcements, quizzes and discussion board.
**Precondition:**
- Must be signed in as a student.  [See 2.2. Sign in as a Student]
- Student must be registered in course [See 5. Course Registration].
- Announcements must be created. [See 7.Teacher Announcement]
- Quizzes must be created. [See 10. Quiz Creation]
- Students must have posted questions. [See 14. Question and Answers]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
8.1 Click on “Courses” on the left navigation bar or “DASHBOARD” on the top navigation bar to access the course list.  |  |  The user should be directed to the course list page.  | Pass
8.2 Click on the course for which you desire to view the announcements, quizzes and questions.  |  Course Number: Soen341  |  The user should be directed to the course page (Soen341) that display three text fields with “Announcements”, “Quizzes” and “Questions and Answers” as titles respectively.  | Pass
8.3 View in the Announcement field.  |  |  The user should see a list of announcements that were posted.  | Pass
8.4 View in the Quizzes field found on the bottom right of Announcement field.  |  |  The user should see a list of Quiz’s titles that were posted.  | Pass
8.5 View in the Question and Answers field found on the bottom left of Announcement field.  |  |  The user should see a list of questions that students posted.  | Pass

## 9.	Edit or Delete Teacher Announcements
### User Story: - As a teacher, I would like to edit the announcements so that I can correct any spelling mistake or add missing information and also delete announcements from any of my courses.
**Precondition:**
- Must be signed in as a teacher.  [See 2.1. Sign in as Teacher]
- And a course must be created by teacher [See 3. Create a Course].
- And an announcement must have been created by teacher [7. Create Teacher Announcement]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
9.1 Click on the course you desire to change or delete announcement.  |  Course: Soen341 [See 3. Create a Course]  |  The user should be directed to the course (Soen341) page and within the Announcement field, a list of already created announcements is displayed.  | Pass
9.2 Click on the “Edit” button found besides the announcement to modify announcement.  |  [See the announcement created in 7. Create Teacher Announcement]  |  The announcement description should be displayed in an editable textbox.  | Pass
9.3 Click “Cancel” button at the bottom of editable textbox go back to unmodified description.  |  |  The unmodified announcement description should still be displayed in the Announcement field.  | Pass
9.4 Click on the “Edit” button found besides the announcement to modify announcement.  |  |  The announcement description should be displayed in an editable textbox.  | Pass
9.5 Enter in the textbox any modification in the announcement description.  |  Announcement Description: “The final is due on April 5th ”  |  The modified announcement description should be displayed in the textbox.  | Pass
9.6 Click on “Submit” button at the bottom of editable textbox to save modified announcement.  |  |  The new announcement should be displayed in the Announcement field along with other announcements (if there are others).  | Pass
9.7 Click on the “Delete” button found besides the announcement to delete announcement.  |  |  The announcement should be removed (disappear) from the Announcement field.  | Pass

## 10.	Quiz creation
### User Story: As a teacher, I must be able to create quizzes with a desired number of multiple-choice questions, write the questions & possible choices, indicate the correct answer, and set the submission due dates for students.
**Precondition:**
- Must be signed in as a teacher.  [See 2.1. Sign in as Teacher]
- And a course must be created by teacher. [See 3. Create a Course].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
10.1 Click on the course you desire to create a quiz. |  | 	The user should be directed to the course dashboard. | Pass
10.2 Click on the “New Quiz” button found at the bottom of the Quiz frame |  | The user should be redirected to the quiz creation form |Pass
10.3 Click on the textbox of “Quiz Name” to give the name of the quiz. And select the due day from the calendar | Quiz 1. September 11 2017 | 	input the quiz name and due date | Pass
10.4 Click on the textbox of “Number of Questions” to give the number of questions that a teacher wants, and click the “Apply” | 10 | Input the number of quiz a teacher wants. The # of boxes should change directly.| Pass |
10.5 Sequentially enter multiple questions and 5 possible answers for each of them. Indicate the right answer by clicking the radio button. | Q: Suppose that nominal wages fall and productivity rises in a particular economy. Other things equal, the aggregate: A. demand curve will shift leftward. B. supply curve will shift rightward. C. supply curve will shift leftward. D. expenditures curve will shift downward | A list of desired questions are made | Pass
10.6 Click on “Submit” button at the bottom of editable textbox to finish creating the new quiz. | | The new quiz should be displayed in the Quiz field with its name and due date. |Pass
10.7 Click on the quiz in the Quiz box. || The user should be redirected to a new page where he will see the quiz that he/she just created, with all the right answers' radio button selected(disabled). |Pass

## 11.Ability for students to take quizzes
### User Story:  As a student, I must be able to take quizzes that teachers have posted in courses that I have registered in.

**Precondition:**
- Must be signed in as a student.  [See 2.2. Sign in as Student]
- And a course must be created by teacher. [See 3. Create a Course].
- And the student should register this course [See 5. Course registration].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
11.1 Click on the course you desire to take quiz. | |The user should be directed to the course dashboard.| Pass
11.2 Click on the quiz that need to be taken.  | | The user should be redirected to the quiz form. | Pass
11.3 By clicking on radio buttons, one answer can be selected for each question | |One radio button will be selected for each question |Pass
11.4 Click on “Submit” button at the bottom to submit the quiz  | | The grade should appear below the quiz description | Pass

## 12. Grades
### User Story: As a student , I want to see my grades so that I can know how well I did on the quizzes.

**Precondition:**
- Must be a signed in as a student. [See 2.2	Sign in as a Student]
- And a course must be created by teacher. [See 3. Create a Course]
- Teacher must have created a quiz for that course. [See 10. Quiz creation]
- Student must be enrolled in that course. [See 5. Course Registration]
- Student must have taken that quiz from that course. [See 11. Ability for students to take quizzes]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|-----------
12.1 Click on a course in which you have already taken a quiz | |  The user should be directed to the course dashboard | Pass
12.2 Click on a quiz you have already taken | | The student should see the quiz page for the quiz that was taken, with an appropriate grade on top and disabled radio buttons. | Pass

## 13. Choose the amount of questions for quizzes
### User Story: As a teacher, I want to choose the amount of questions in my quizzes.

**Precondition:**
- Must be signed in as a teacher.  [See 2.1. Sign in as Teacher]
- And a course must be created by teacher. [See 3. Create a Course].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
13.1 Click on the course for which you desire to make a quiz.  |  Course: Soen341 [See 3. Create a Course]  |  The user should be directed to the course page with the course number (Soen341) on top of the page and “Announcements”, “Quizzes” and “Questions and Answers” as options to access.  | Pass
13.2 Click on the “new quiz” in the Quizzes field, to create a quiz.  |  |  The user should be directed to the quiz creation page. | Pass
13.3 Click on the textbox of number of questions and put in the number that you want  | 35 | The number "35" should appear in the text box  | Pass
13.4 Click on apply |  |  The user should see 35 questions boxes where he can start adding the questions and multiple choice answers. | Pass

## 14. Question & Answer 
### User Story: As a student, I want to be able to post my questions and let the teacher answer.

**Precondition:**
- Must be signed in as a student.  [See 1.2. Sign in as Teacher]
- And a course must be created by teacher [See 3. Create a Course].
- And the student should register this course [See 5. Course registration].

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
14.1 Click on the course you desire to ask a question.  |  Course: Soen341 [See 3. Create a Course]  |  The user should be directed to the course dashboard.|Pass
14.2 Click in the empty textbox of the Question & Answer div. and write a question that you want to ask | I don’t know how to install the Z/EVEs. | The question you want to ask is typed in the text area.| Pass
14.3 Click on the submit button at the bottom of the text area to submit the question. | |The question is recorded in the Question & Answer div. and a message is shown at top of the page. “Question Registered in the database!” A new textbox is shown for future questions| Pass

## 15. Quiz Solution for Students.
### User Story: As a student, I want to be able to see if I chose the wrong answer as well as the correct one.

**Precondition:**
- Must be a signed in as a student. [See 2.2	Sign in as a Student]
- And a course must be created by teacher. [See 3. Create a Course]
- Teacher must have created a quiz for that course. [See 10. Quiz creation]
- Student must be enrolled in that course. [See 5. Course Registration]
- Student must have taken that quiz from that course. [See 11. Ability for students to take quizzes]

Test Steps | Test Data | Expected Result | Pass/Fail
-----------|-----------|-----------------|----------
15.1 Click on the course for which you would like to check your corrected solutions.  |  Course: SOEN341 [See 3. Create a Course]  |  The user should be directed to the course page with the course number (SOEN341) on top of the page and “Announcements”, “Quizzes” and “Questions and Answers” as options to access where there is an quiz that's completed in the "Quizzes" section.  | Pass
15.2 Click on the [View Results] of the completed quiz in the Quizzes section, to view corrected answers.  | Quiz 1 Due Date: 2017-04-11  |  The user should be directed the display of the completed quiz. | Pass
15.3 Scroll through the quiz  | Question 1 and 2 |  See student's answers in green. If there is no more colour in that question it means the student's answer was correct. If there is red on the student's answer, it means that the student's answer was incorrect and the green one is the correct one.  | Pass
