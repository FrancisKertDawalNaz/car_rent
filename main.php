<?php
// Start the session to use session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#"><i class="fas fa-car"></i> Available Cars</a>
        <a href="#"><i class="fas fa-history"></i> Booking History</a>
        <a href="#"><i class="fas fa-cogs"></i> Settings</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Welcome to the Car Rental Dashboard</h1>
        <p>Hello, <?php echo $_SESSION['user_email']; ?>! Use the sidebar to navigate through the available options.</p>

        <!-- Search Bar (Minimalist and Right-Aligned) -->
        <div class="search-bar">
            <form action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for cars" name="search">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <!-- 10 Boxes for Car Images and Descriptions -->
        <!-- 2 Boxes at the Top -->
        <div class="container mt-4">
            <div class="row">
                <!-- Box 1 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car1..webp" alt="Car 1" class="img-fluid">
                        <h5>Car Model 1</h5>
                        <p>This car is a sleek and stylish model, ideal for city drives. It offers great fuel efficiency and modern features.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 1">Book Now</button>
                    </div>
                </div>
                <!-- Box 2 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car2.png" alt="Car 2" class="img-fluid">
                        <h5>Car Model 2</h5>
                        <p>A perfect choice for long road trips, this car offers a comfortable ride and ample storage space.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 2">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- 2 Boxes per Row for the Middle Section -->
            <div class="row">
                <!-- Box 3 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/ca3.jpg" alt="Car 3" class="img-fluid">
                        <h5>Car Model 3</h5>
                        <p>This high-performance car is designed for those who enjoy speed, power, and luxury. A true road king!</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 3">Book Now</button>
                    </div>
                </div>
                <!-- Box 4 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car4..png" alt="Car 4" class="img-fluid">
                        <h5>Car Model 4</h5>
                        <p>A family-friendly car with great safety features and a smooth driving experience. Perfect for everyday use.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 4">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- 2 Boxes per Row for the Next Section -->
            <div class="row">
                <!-- Box 5 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car5...webp" alt="Car 5" class="img-fluid">
                        <h5>Car Model 5</h5>
                        <p>Compact and fuel-efficient, this car is great for city driving while maintaining a stylish exterior.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 5">Book Now</button>
                    </div>
                </div>
                <!-- Box 6 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car6...avif" alt="Car 6" class="img-fluid">
                        <h5>Car Model 6</h5>
                        <p>This car offers all-wheel drive for off-road adventures, perfect for weekend getaways to the mountains.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 6">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- 2 Boxes per Row for the Next Section -->
            <div class="row">
                <!-- Box 7 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car7.avif" alt="Car 7" class="img-fluid">
                        <h5>Car Model 7</h5>
                        <p>Luxury and comfort meet in this high-end sedan. Ideal for business trips and leisurely drives.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 7">Book Now</button>
                    </div>
                </div>
                <!-- Box 8 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car8.jpg" alt="Car 8" class="img-fluid">
                        <h5>Car Model 8</h5>
                        <p>Sporty and stylish, this car is built for those who love performance and looks. It delivers an unforgettable driving experience.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 8">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Last Row of 2 Boxes -->
            <div class="row">
                <!-- Box 9 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car9...avif" alt="Car 9" class="img-fluid">
                        <h5>Car Model 9</h5>
                        <p>A perfect blend of style and practicality. This car has advanced features and a comfortable cabin for a smooth ride.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 9">Book Now</button>
                    </div>
                </div>
                <!-- Box 10 -->
                <div class="col-md-6 mb-3">
                    <div class="car-box">
                        <img src="static/car10.avif" alt="Car 10" class="img-fluid">
                        <h5>Car Model 10</h5>
                        <p>This car is great for eco-conscious drivers, offering an electric-powered engine and zero emissions.</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal" data-car-name="Car Model 10">Book Now</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel">Book a Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to book <strong id="car-name"></strong>?</p>
                    <!-- Add additional booking form fields here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to update the modal with the car name
        var bookButtons = document.querySelectorAll('.btn[data-bs-target="#bookModal"]');
        bookButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var carName = button.getAttribute('data-car-name');
                document.getElementById('car-name').textContent = carName;
            });
        });
    </script>
</body>

</html>