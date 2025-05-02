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
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        // Hash the password before saving it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the users table
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // Redirect to login page after successful signup
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
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
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h2><i class="fas fa-user-plus"></i> Sign Up</h2> <!-- Added icon next to the title -->
      
      <!-- Display error message if there is any -->
      <?php if (!empty($error_message)) { echo '<div class="alert alert-danger">' . $error_message . '</div>'; } ?>
      
      <form action="signup.php" method="POST">
        <div class="mb-3">
          <label for="emailInput" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="passwordInput" class="form-label">Password</label>
          <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Create a password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPasswordInput" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPasswordInput" name="confirm_password" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-success w-100"><i class="fas fa-check-circle"></i> Sign Up</button> <!-- Added icon to button -->
      </form>

      <div class="mt-3">
        <p>Already have an account? <a href="login.php" class="text-primary"><i class="fas fa-sign-in-alt"></i> Login here</a></p> <!-- Added icon next to "Login here" -->
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
