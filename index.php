<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyOnlineMeal | Delicious Food Delivered</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <nav id="navbar">
        <div id="logo"><img src="logo.jpeg" alt="MyOnlineMeal.com"></div>
        <ul>
            <li class="item"><a href="#home">Home</a></li>
            <li class="item"><a href="#services-container">Services</a></li>
            <li class="item"><a href="about_us.php">About Us</a></li>
            <li class="item"><a href="#contact">Contact</a></li>
            <li class="item"><a href="#client-section">Clients</a></li>
            <li class="item"><a href="menu_order.php" class="btn-order">Order Food</a></li>
            <li class="item"><a href="admin_panel.php">Admin Panel</a></li>
        </ul>
    </nav>

    <section id="home">
        <h1 class="primary">Welcome to MyOnlineMeal 🍕</h1>
        <p>Fresh meals delivered to your doorstep in minutes. Taste the goodness!</p>
        <a href="menu_order.php" class="btn">Order Now</a>
    </section>

    <section id="services-container">
        <h1 class="h-primary center">Our Services</h1>
        <div id="services">
            <div class="box">
                <img src="cater.jpg" alt="Catering">
                <h2 class="h-secondary">Food Catering</h2>
                <p>Delicious catering for all your events. Professional service guaranteed.</p>
            </div>
            <div class="box">
                <img src="thali.jpg" alt="Bulk Order">
                <h2 class="h-secondary">Bulk Ordering</h2>
                <p>Planning a party or office lunch? Order in bulk with special discounts!</p>
            </div>
            <div class="box">
                <img src="delivery.jpg" alt="Ordering">
                <h2 class="h-secondary">Quick Delivery</h2>
                <p>Hot meals delivered in record time, right to your door!</p>
            </div>
        </div>
    </section>

    <section id="client-section">
        <h1 class="h-primary center">Our Clients</h1>
        <div id="clients">
            <?php
            $clients = ['client4.jpeg', 'client3.jpeg', 'client2.jpeg', 'client1.jpeg', 'img.jpg'];
            foreach ($clients as $client) {
                echo "<div class='client-item'><img src='$client' alt='Our Client'></div>";
            }
            ?>
        </div>
    </section>

    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <div id="contact-box">
            <form action="contact_proccess.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required placeholder="Your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required placeholder="you@example.com">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" name="phone" id="phone" required placeholder="10-digit mobile">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" rows="5" required placeholder="Write your message..."></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="center">
            &copy; <?php echo date("Y"); ?> MyOnlineMeal.com. All rights reserved.
        </div>
    </footer>
    <script>
        window.addEventListener("load", function() {
            document.getElementById("preloader").style.display = "none";
        });
    </script>


</body>

</html>