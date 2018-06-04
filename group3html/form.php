
<!DOCTYPE html>
<html>
<head>
<title> Simple PHP contact form with MySQL and Form Validation </title>
</head>
<body>
<h3>Contact Us</h3>
<form action="thankyou.php" method="POST">
	
 Name:
  <input type="text" name="name" required><br>
 
  Email:
  <input type="email" name="email" required><br>
 
Message:<br>
  <input type="text" name="comment" required><br>
  <input type="submit" value="Submit"><br>
</form>
</body>
</html>
