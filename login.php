<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (blank)
$dbname = "car_rent_tb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, start session
            session_start();
            $_SESSION['user_email'] = $email; // Store email in session
            // Redirect to main.php
            header("Location: main.php");
            exit();
        } else {
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "No user found with that email!";
    }
}

// Close connection
$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Adding Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h2>Login</h2>
      <!-- Display error message if there is any -->
      <?php if (!empty($error_message)) { echo '<div class="alert alert-danger">' . $error_message . '</div>'; } ?>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="emailInput" class="form-label">
            <i class="fas fa-envelope"></i> Email
          </label>
          <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="passwordInput" class="form-label">
            <i class="fas fa-lock"></i> Password
          </label>
          <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-2">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>
      </form>

      <hr>

      <!-- Sign Up Link -->
      <div class="mt-3">
        <p>I don't have an account <a href="signup.php" class="text-primary">sign up here</a></p>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
