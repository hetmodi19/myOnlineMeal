<?php
// about_us.php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MyOnlineMeal</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your external CSS -->
</head>
<body>

    <header>
        <div class="logo">
            <h1>MyOnlineMeal</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu_order.php">Food Menu</a></li>
                <li><a href="about_us.php" class="active">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <section class="about-container">
        <div class="about-header">
            <h2>About Us</h2>
            <p>Welcome to MyOnlineMeal! We bring delicious, healthy, and convenient meals directly to your doorstep.</p>
        </div>

        <div class="about-content">
            <div class="about-info">
                <h3>Who We Are</h3>
                <p>At MyOnlineMeal, we are committed to offering fresh, healthy, and diverse meal options for everyone. Our mission is to provide great food without the hassle of cooking!</p>
            </div>
            <div class="about-info">
                <h3>Our Mission</h3>
                <p>Our goal is simple: we want to offer convenient, delicious meals at affordable prices. We deliver the best food experience directly to your door.</p>
            </div>
        </div>

        <div class="team-section">
            <h3>Meet Our Team</h3>
            <div class="team-container">
                <div class="team-member">
                    <img src="chef.jpg" alt="Team Member 1">
                    <h4>John Doe</h4>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="chef2.jpg" alt="Team Member 2">
                    <h4>Jane Smith</h4>
                    <p>Chef & Culinary Expert</p>
                </div>
                <div class="team-member">
                    <img src="chef3.jpg" alt="Team Member 3">
                    <h4>Sam Wilson</h4>
                    <p>Operations Manager</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 MyOnlineMeal. All Rights Reserved.</p>
    </footer>

</body>
</html>
