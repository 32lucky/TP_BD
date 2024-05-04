<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .form-box {
  max-width: 300px;
  background: #f1f7fe;
  overflow: hidden;
  border-radius: 16px;
  color: #010101;
}

.form {
  position: relative;
  display: flex;
  flex-direction: column;
  padding: 32px 24px 24px;
  gap: 16px;
  text-align: center;
}

/*Form text*/
.title {
  font-weight: bold;
  font-size: 1.6rem;
}

.subtitle {
  font-size: 1rem;
  color: #666;
}

/*Inputs box*/
.form-container {
  overflow: hidden;
  border-radius: 8px;
  background-color: #fff;
  margin: 1rem 0 .5rem;
  width: 100%;
}

.input {
  background: none;
  border: 0;
  outline: 0;
  height: 40px;
  width: 100%;
  border-bottom: 1px solid #eee;
  font-size: .9rem;
  padding: 8px 15px;
}

.form-section {
  padding: 16px;
  font-size: .85rem;
  background-color: #e0ecfb;
  box-shadow: rgb(0 0 0 / 8%) 0 -1px;
}

.form-section a {
  font-weight: bold;
  color: #0066ff;
  transition: color .3s ease;
}

.form-section a:hover {
  color: #005ce6;
  text-decoration: underline;
}

/*Button*/
.form button {
  background-color: #0066ff;
  color: #fff;
  border: 0;
  border-radius: 24px;
  padding: 10px 16px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color .3s ease;
}

.form button:hover {
  background-color: #005ce6;
}
</style>
<body>
<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tp_bd";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username and password from form
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password = $_POST['password'];

    // SQL query to check user credentials
    $sql = "SELECT * FROM client_table WHERE name = '$username' AND Password = '$password' AND Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, set session variables
        $_SESSION['name'] = $username;
        // Redirect to dashboard or any other authenticated page
        header("Location:merchendise.php");
        exit();
    } else {
        // Invalid credentials
        $errorMessage = "Invalid username or password";
    }

    // Close database connection
    $conn->close();
}
?>


<div class="form-box">
<form class="form" action="sign-client.php."  method="post">
    <span class="title">Log in</span>
    <div class="form-container">
    <input type="text" class="input" type="text" name="username" placeholder="Username" required>

			<input type="email" class="input"  name = "email" placeholder="Email" required>
			<input type="password" class="input" name="password" placeholder="Password" required>
    </div>
    <button type="submit" name="login">Sign up</button>
</form>
<div class="form-section">
<p id="errorText" class="error-message"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></p>
</div>
</div>
</body>
</html>