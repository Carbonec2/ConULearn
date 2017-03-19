## 1.1 Sign Up as a Teacher
### **User Story:** As a teacher, I should be able to select the teacher account when I sign up, so that I can have the right privileges.

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
1.1.1 Click on “Sign Up” in the top navigation bar	|  |	The user should be redirected to the sign-up page
1.1.2 Enter the username in the first textbox. | Username: Teacher	| The username should be displayed in the textbox.
1.1.3 Enter a password in the second textbox.	|Password: 123456	| The password should be displayed in the textbox. (Hidden as asterisk)
1.1.4 Confirm the password in the third textbox by entering the same password as step #1.4.	| Password: 123456 |	The password should be displayed in the textbox. (Hidden as asterisk)
1.1.5 Select the radio button teacher.		|  Radio button: Teacher		| The radio button of Teacher should be checked.
1.1.6 Click on the button “Sign Up”		|  	| 	The message “Registration successful” should appear on top of the username text box.


## 1.2	Sign Up as a Student
### **User Story:** As a student, I should be able to select the student account when I sign up, so that I can have the right privileges.

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
1.2.1 Click on “Sign Up” in the top navigation bar		| 	| 	The user should be redirected to the sign-up page
1.2.2 Enter the username in the first textbox.	| 	Username: Student		| The username should be displayed in the textbox.
1.2.3 Enter a password in the second textbox.	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
1.2.4 Confirm the password in the third textbox by entering the same password as step 2.4		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
1.2.5 Select the radio button teacher.		| Radio button: Student		| The radio button of Teacher should be checked.
1.2.6 Click on the button “Sign Up”			| 	| The message “Registration successful” should appear on top of the username text box.


## 2.1 Sign in as a Teacher
### **User Story:** As a teacher, I want to sign in as a teacher so that I can create quiz, announcements, answer to students’ questions.  

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
2.1.1 Click on “Sign in” at the top of the navigation bar.	| 	| 		The user should be redirected to the sign-in page.
2.1.2 Enter the username that you have created when you signed up.		| Username: Teacher		| The username should be displayed in the textbox.
2.1.3 Enter password corresponding to that username	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
2.1.4 Confirm the password by re-entering the same password as step 3.3		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
2.1.5 Click on the button “Connect”		| 	| 	The teacher is redirected to another page where he should see the courses that he has created. Since the teacher has not created any course yet, the teacher should see the button “Create a course” in the middle of the page.


## 2.2	Sign in as a Student
### **User Story:** As a student, I want to sign in as a student so that I can take quizzes, ask questions and see important announcements.

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
2.2.1 Click on “Sign in” at the top of the navigation bar.	| 	| 		The user should be redirected to the sign-in page.
2.2.2 Enter the username that you have created when you signed up.		| Username: Student		| The username should be displayed in the textbox.
2.2.3 Enter password corresponding to that username	| 	Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
2.2.4 Confirm the password by re-entering the same password as step 4.3		| Password: 123456		| The password should be displayed in the textbox. (Hidden as asterisk)
2.2.5 Click on the button “Connect”		| 	| 	The student is redirected to another page where he should see all his registered courses. Since the student hasn’t registered to any course yet, the student should see the button “Register for a class” in the middle of the page.


## 3.	Course Creation
### **User Story:** As a teacher, I want to create a course so that students can register to it.
**Precondition:**  Must be signed in as a teacher. [See 2.1. Sign in as Teacher]

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
3.1 Click on the button “Create a course” in the side navigation bar or in the middle of the page. |  | 		The user should be redirected to the course creation page.
3.2 Enter the Course Number in the first textbox. | 	Course Number: Soen341 | 	The Course Number should be displayed in the textbox.
3.3 Enter the course description in the bigger textbox | 	Course Description:This is a course description for the course Soen 341. | 	The course description should be displayed in the bigger textbox.
3.4 Click on the button “Submit”	 |  | 	The user should be redirected back to the course page where he should see a new button with the name of the course that he just created (Soen 341 winter 2017) at the left of the button “Create a Course”.

## 4.	Teacher Course List
### User Story: As a teacher, I want to see all the courses that I have created so that I can makes quizzes and announcements for the appropriate courses.
**Precondition:** Must be signed in as a teacher. [See 2.1. Sign in as Teacher]

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
4.1 Click on the button “Create a course” in the side navigation bar or in the middle of the page.	 |  | 	The user should be redirected to the course creation page.
4.2 Enter the Course Number in the first textbox.	 | Course Number: Comp 346	 | The Course Number should be displayed in the textbox.
4.3 Enter the course description in the bigger textbox. | Course Description: This is a course description for the course Comp 346. | 	The course description should be displayed in the bigger textbox.
4.4 Click on the “Submit” button.	 |  | 	The user should be redirected back to the course page where he should see a new button with the name of the course that he just created (Soen 341 winter 2017) at the left of the button “Create a Course”.
4.5 Click on the button “Create a course” in the side navigation bar or in the middle of the page. |  | 		The user should be redirected to the course creation page.
4.6 Enter the Course Number in the first textbox. | 	Course Number: SOEN 331 | 	The Course Number should be displayed in the textbox.
4.7 Enter the course description in the bigger textbox | 	Course Description:This is a course description for the course Soen 331.	 | The course description should be displayed in the bigger textbox.
4.8 Click “Submit” button	 |  | 	The user should be redirected back to the course page where he should see all the courses that he has created (Soen341, Comp 346. Soen 331)

##  5.	Course Registration
### User Story: As a student, I want to be able to register to a class so that I can complete online evaluations.
**Precondition:** 
- Must be signed in as a student.  [See 4. Sign in as Student].
- And a course must be created by a teacher [See 5. Create a Course].

Test Steps | Test Data | Expected Result
-----------|-----------|----------------
6.1 Click on the button “Register for a class” or on “Course Registration” on the left navigation bar. |  | 		The user should be redirected to the course registration page.
6.2 Click on the dropdown menu. |  | 		A dropdown list of the available courses should appear below the dropdown menu.
6.3 Click on the course of your choice.	 | Course to register:Soen 341 [Created in 5. Create a course]	 | The course is selected.
6.4 Click on the button “Submit”	 |  | 	The student should be redirected to the courses page and a button with the course that he just registered to should appear in the course list. 
