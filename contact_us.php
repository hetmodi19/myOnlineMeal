<?php
// contact_us.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us & Support - MyOnlineMeal</title>
    <link rel="stylesheet" href="style.css"> <link rel="stylesheet" href="contact_us.css"> </head>
<body>

    <header>
        <div class="logo">
            <h1>MyOnlineMeal</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="food_page.php">Food Menu</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php" class="active">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main class="contact-support-page">
        <section class="contact-section">
            <h2>Contact Us</h2>
            <p class="intro-text">We'd love to hear from you! Please fill out the form below or use the contact information provided.</p>
            <div class="contact-grid">
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Our Contact Information</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Main Street, Anytown, India</p>
                    <p><i class="fas fa-phone"></i> +91 9876543210</p>
                    <p><i class="fas fa-envelope"></i> support@myonlinemeal.com</p>
                    <p><i class="fas fa-clock"></i> Monday - Sunday: 9:00 AM to 10:00 PM</p>
                </div>
            </div>
        </section>

        <section class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        How do I place an order?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>To place an order, simply browse our Food Menu, select the items you'd like to purchase, add them to your cart, and proceed to checkout. You'll be guided through the payment and delivery process.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        What are your delivery hours?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Our standard delivery hours are from 10:00 AM to 9:00 PM, Monday to Sunday. Please note that delivery times may vary based on your location and order volume.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        What payment methods do you accept?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>We currently accept major credit cards (Visa, MasterCard, American Express), debit cards, and online payment gateways like PayPal and PayTM.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        What is your cancellation policy?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>You can cancel your order within 30 minutes of placing it, provided that the preparation has not already begun. Please contact our support team immediately to request a cancellation.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        What if I have a food allergy?
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>We take food allergies very seriously. Please indicate any allergies or dietary restrictions in the special instructions section during checkout. For severe allergies, we recommend contacting us directly before placing your order.</p>
                    </div>
                </div>
                </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> MyOnlineMeal. All Rights Reserved.</p>
    </footer>

    <script>
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentNode;
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');

                faqItem.classList.toggle('active');
                answer.classList.toggle('open');
                icon.classList.toggle('rotate');
            });
        });
    </script>

</body>
</html>