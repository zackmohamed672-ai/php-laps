JAMHURIYA UNIVERSITY - PHP & MySQL CHAPTER 4 ASSIGNMENT

Files:
- index.php: student registration form and server-side validation
- result.php: displays submitted information in Bootstrap tables
- uploads/: uploaded student images are stored here

How to run with XAMPP:
1. Extract the student_registration folder into C:\xampp\htdocs\
2. Start Apache in the XAMPP Control Panel.
3. Open http://localhost/student_registration/index.php
4. Complete all required fields and upload a JPG, JPEG, PNG, GIF, or WEBP image.
5. Click Register Student. Successful submissions redirect to result.php.

Notes:
- PHP session is used to pass the submitted data to result.php.
- This assignment version does not save information to MySQL because the instructions mainly request a form and display page.
- Bootstrap styling is loaded from a CDN, so an internet connection is needed for the styling.
- The uploads folder must be writable by PHP.
- Server-side checks validate required fields, names, email, image MIME type, and image size.
