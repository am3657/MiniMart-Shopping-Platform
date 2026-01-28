<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Akaash Manickavel (am3657)</td></tr>
<tr><td> <em>Generated: </em> 12/17/2024 4:10:55 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-AR451-M2024/it202-milestone1-deliverable/grade/am3657" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T08.54.49UsernameTaken.png.webp?alt=media&token=d41ab70f-ede3-451d-9123-0d24b437422d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Tells username and email are taken, and allowing user to correct it<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T08.59.00JavasciptRegister.png.webp?alt=media&token=e4e1cc4e-aaa4-41fb-9449-bbaf6fd929ff"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username, emai validation. Password  not matchvalidation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T09.03.05Task%231%20user%20table.png.webp?alt=media&token=95f102e7-1a7a-47d3-9cb6-271d91db5955"/></td></tr>
<tr><td> <em>Caption:</em> <p>In task 1 I tried implementing user with email &quot;<a href="mailto:sweet@gmail.com">sweet@gmail.com</a>&quot;<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/am3657/IT202-am3657/pull/5">https://github.com/am3657/IT202-am3657/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form is first defined using html, and then styled using CSS. Using<br>CSS, I was able to show the form inside a container. The form<br>first goes through frontend validation. The PHP validation only happens after the validate()<br>javascript method returns true. The front end takes care of email formatting, checking<br>if a username is submitted, making sure the new password and the password<br>in the confirm field match. Then PHP handles more complex validations, like checking<br>if the username/email already exists. Finally if all is good, the final block<br>of code creates hash-values, and insert the username, email, and password are inserted<br>into the DB. The DB was utilized to check and pull an array<br>of information, which includes the username or email. Finally, the DB is called<br>to insert the new data into respective columns.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-16T22.19.17WrongPasswordLogin.png.webp?alt=media&token=d1486cbf-44d0-42d3-901f-8538e0ff09d8"/></td></tr>
<tr><td> <em>Caption:</em> <p>I tried logging in to an user account with email <a href="mailto:-kings@gmail.com">-kings@gmail.com</a>, with a<br>wrong password.  This happens by fetching all the data assciated with the<br>entered email, and compares the entered password with the associated password using the<br>hash value. So, it failed since the password&#39;s hash value could not match<br>the original&#39;s password in the database displaying an invalid password message.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T02.30.54Homepage.png.webp?alt=media&token=1fb1582d-a12f-4aaf-8799-7115db201ae8"/></td></tr>
<tr><td> <em>Caption:</em> <p>This image is showing a successful login as the profile page can only<br>accessed with all of the account&#39;s details after logging in.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/am3657/IT202-am3657/pull/5">https://github.com/am3657/IT202-am3657/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form is validated using javascript and PHP. In the frontend, the form<br>goes through certain validation conditions in javacript like checking if login has a<br>valid format, and password exceeds the minimum length. Then, the email/username and password<br>elements go through php validation, which organizes queries and compares if they are<br>the exact same credentials as the ones borught by the query being executed.&nbsp;<br>The database is heavily utilized to bring the registered pieces of information for<br>comparison.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707834-bf5a5b13-ec36-4597-9741-aa830c195be2.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T09.09.37Screenshot%202024-12-16%20215125.png.webp?alt=media&token=3f7b9711-d6e5-4466-ad52-5bbb8b76a968"/></td></tr>
<tr><td> <em>Caption:</em> <p>Able to log out after hitting the logout button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T08.43.08LoggedOut.png.webp?alt=media&token=a5ee6422-bc0c-4a1f-8e30-96524c104a04"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing you are not logged in a protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td>Not provided</td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Once the user hits the logout button, the session that is running currently<br>gets unset and destroyed, making the session created during login not accessible. After<br>performing this task, it takes the user back to login.php.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707834-bf5a5b13-ec36-4597-9741-aa830c195be2.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T02.52.35LoggedOut.png.webp?alt=media&token=9adeaabe-1c25-4e2d-89e2-5c62aa9c2b42"/></td></tr>
<tr><td> <em>Caption:</em> <p>When a user tries to go back after hitting logout, the website shows<br>a &quot;you are not logged in&quot; text. The nav bar also only provides<br>links to  login and register pages, suggesting that you have no access<br>to any other pages.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T03.02.21Roles%20table.png.webp?alt=media&token=acb9a745-93a7-48cf-8398-7dd94dac0414"/></td></tr>
<tr><td> <em>Caption:</em> <p>The roles table showcases a role, called Admin.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T03.12.20UserRolesAdmin.png.webp?alt=media&token=f8f4a4ce-6b3f-4717-95ac-1a96a0a1f46e"/></td></tr>
<tr><td> <em>Caption:</em> <p>The first entry is the Admin User, and is connected to a user<br>with the email, <a href="mailto:kings@gmail.com">kings@gmail.com</a><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td>Not provided</td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The navigation bar only shows link to home, profile, and list roles after<br>checking to see if user is logged in, using a defined is_logged_in() method.<br>When logged in, you are taken to the homepage whose nav bar replaces<br>the login and register links, with links to the other pages. So, these<br>are the login-protected pages as they can&#39;t be accessed by a non-registered user.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>(missing)</p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T03.46.45Profile%20page.png.webp?alt=media&token=c43de471-a0e3-4f8c-94fa-dd996fa615ae"/></td></tr>
<tr><td> <em>Caption:</em> <p>As you can see I styled the form and navigation bar to look<br>more clean. For the forms, every related html tag was place inside a<br>container class, which in then was used as CSS selector to make these<br>changes. The nav bar also went from bunch of links to an actual<br>horizontal bar, and the logout link was pushed to the right.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T03.54.26RegisterPage.png.webp?alt=media&token=69abfa6c-6212-4491-999c-d3d17af08877"/></td></tr>
<tr><td> <em>Caption:</em> <p>The same styling was done to login and register pages, since they share<br>a similar layout as the profile page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/am3657/IT202-am3657/pull/4">https://github.com/am3657/IT202-am3657/pull/4</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I chose to use a container class to create a box like structure,<br>in which the form will be placed into it, and it can get<br>alight at the center. I placed the input fields under each label using<br>a flex display for the form, which creates a vertical layout. Then made<br>minor adjustments to font, padding, margin, and even created a border that casts<br>a small shadow.&nbsp;<div>For the nav bar, the links were made to float next<br>to each other towards the left, and the display was shaped as a<br>block. Additionally, the links turn darker when hovering over them.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T04.19.06HTMLerror.png.webp?alt=media&token=94ce78dd-5074-4042-bd77-c4c7b0193c53"/></td></tr>
<tr><td> <em>Caption:</em> <p>These were errors that were designed to show directly from HTML, as a<br>requirement was placed for most of the form&#39;s input values.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T04.26.31JavasciptValidation.png.webp?alt=media&token=49e54c6c-80c9-4d75-8308-8c76647af1c4"/></td></tr>
<tr><td> <em>Caption:</em> <p>An error message that validates username and says that conveys that it is<br>practically empty<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/am3657/IT202-am3657/pull/5">https://github.com/am3657/IT202-am3657/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>If the messages are right in front of you, and you don&#39;t have<br>to go look for them, it can be greatly user friendly. So, I<br>made sure the client side validation messages ended up inside the box in<br>which the form is located, whether it be in the login, register or<br>profile page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707834-bf5a5b13-ec36-4597-9741-aa830c195be2.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T08.13.22ViewProfile.png.webp?alt=media&token=d3cc6e59-6093-484e-886c-d4865a41cbdb"/></td></tr>
<tr><td> <em>Caption:</em> <p>Picture of profile.php<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td>Not provided</td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The current username and email are automatically fetched from the session, and embedding<br>it into the form. The input fields username and email are followed by<br>a line of php code that echo a variable, which holds the current<br>information into the input field. For instance, $username was set to the user&#39;s<br>unchanged username using get_user_email(). Then $username was assigned to the value of input<br>field for username using php.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T07.43.38UsernameProfile.png.webp?alt=media&token=27f1e200-3d6c-4d68-be7a-b60b83b4c7d4"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows error that username, email, and password are invalid<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T07.59.21ExistingUserEmailProfile.png.webp?alt=media&token=4c12e547-94e4-4c12-9f1b-78260f96fcab"/></td></tr>
<tr><td> <em>Caption:</em> <p>Existing user/email error is shown on stop<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-16T22.06.28Users%20table%20before.png.webp?alt=media&token=83a81187-fc06-4c02-a799-18a684f99033"/></td></tr>
<tr><td> <em>Caption:</em> <p>I changed the last user&#39;s password and username, whose id number is 43.<br>It should be visible as the username is changed and password&#39;s hash value<br>is also modified. I did this through the profile page. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fam3657%2F2024-12-17T07.09.18ProfieChangeTable.png.webp?alt=media&token=8ee65280-2358-4018-9793-35d399dccf21"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username, email, and password were updated<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/am3657/IT202-am3657/pull/5">https://github.com/am3657/IT202-am3657/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>In the screenshots, I changed all the values of the user whose id<br>is 43. The input is first validated using javascript, and if the client-side<br>validation succeeds, then proceeds to PHP validation for the actual test. Username and<br>email are updated by using UPDATE sql query. The password is then validated<br>to check to see if the old password is correctly entered. If true,<br>it proceeds to check if old password and new password match. Finally, if<br>there were no problems, then the updates also happened.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707795-a9c94a71-7871-4572-bfae-ad636f8f8474.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td>Missing Image</td></tr>
<tr><td> <em>Caption:</em> (missing)</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td>Not provided</td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td>Not provided</td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-AR451-M2024/it202-milestone1-deliverable/grade/am3657" target="_blank">Grading</a></td></tr></table>