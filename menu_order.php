<?php
$conn = new mysqli("localhost", "root", "", "myonlinemeal");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $order_details = $_POST['order_details'];

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, order_details) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $order_details);

    if ($stmt->execute()) {
        header("Location: thank_you.php");
        exit(); // always good to stop script after header redirect
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu & Order | MyOnlineMeal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f1f2f6;
        }

        nav {
            background-color: #0984e3;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        nav .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .menu-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }

        .menu-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .menu-item img {
            max-width: 100%;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
        }

        .menu-item h3 {
            margin: 15px 0 10px;
        }

        .order-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background: #00b894;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .order-btn:hover {
            background: #019875;
        }

        /* Popup Order Form */
        .popup {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .popup-content h2 {
            margin-top: 0;
        }

        .popup-content input, .popup-content textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }

        .submit-btn {
            background: #0984e3;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #74b9ff;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">MyOnlineMeal</div>
</nav>

<div class="menu-container">
    <?php
    $menuItems = [
        ["Cheese Pizza", "pizza.jpg", "Delicious cheesy pizza with herbs and veggies"],
        ["Veg Burger", "burger.jpg", "Juicy patty with fresh veggies and tangy sauces"],
        ["Red Sauce Pasta", "pasta.jpg", "Creamy and spicy pasta with Italian herbs"],
        ["Grilled Sandwich", "sandwich.jpg", "Toasted sandwich filled with paneer and veggies"],
        ["French Fries", "fries.jpg", "Crispy golden fries served with ketchup"],
        ["Veg Momos", "momos.jpg", "Steamed dumplings with spicy chutney"],
        ["Paneer Roll", "rolls.jpeg", "Stuffed paneer roll with green chutney"],
        ["Manchurian", "manchurian.jpg", "Spicy veg balls tossed in Indo-Chinese sauce"],
        ["Chow Mein", "chowmein.jpg", "Stir-fried noodles with veggies and sauces"],
        ["Masala Dosa", "dosa.jpg", "Crispy dosa with potato filling and chutneys"],
        ["Chole Bhature", "chole_bhature.jpg", "Puffy bhature served with spicy chickpeas"],
        ["Paneer Butter Masala", "paneer_butter.jpg", "Creamy paneer in rich tomato gravy"],
        ["Veg Biryani", "biryani.jpg", "Fragrant rice cooked with vegetables and spices"],
        ["Rajma Chawal", "rajma.jpg", "Red kidney beans curry served with rice"],
        ["Dal Makhani", "dal_makhani.jpg", "Rich black lentils cooked with cream"],
        ["Garlic Bread", "garlic_bread.jpg", "Toasted bread with garlic and cheese"],
        ["Veg Fried Rice", "fried_rice.jpg", "Rice stir-fried with vegetables and soy sauce"],
        ["Hakka Noodles", "hakka_noodles.jpg", "Chinese-style noodles with veggies"],
        ["Spring Rolls", "spring_rolls.jpg", "Crispy rolls stuffed with vegetables"],
        ["Tandoori Paneer", "tandoori_paneer.jpg", "Marinated paneer cubes grilled to perfection"],
        ["Aloo Tikki", "aloo_tikki.jpeg", "Spiced potato patties served with chutneys"],
        ["Pav Bhaji", "pav_bhaji.jpg", "Mashed veggies in spices served with buttered pav"],
        ["Samosa", "samosa.jpg", "Crispy triangle stuffed with spiced potatoes"],
        ["Dhokla", "dhokla.jpeg", "Soft and spongy steamed Gujarati snack"],
        ["Paneer Tikka", "paneer_tikka.jpg", "Chunks of marinated paneer grilled on skewers"],
        ["Vada Pav", "vada_pav.jpg", "Spicy potato fritter in a bun with chutneys"],
        ["Idli Sambhar", "idli.jpg", "Steamed rice cakes served with sambhar and chutneys"],
        ["Naan with Chole", "naan_chole.jpeg", "Soft naan with spicy chickpeas"],
        ["Cupcake", "cupcake.jpg", "Soft and creamy dessert treat"]
    ];

    foreach ($menuItems as $item) {
        echo "
        <div class='menu-item'>
            <img src='images/{$item[1]}' alt='{$item[0]}'>
            <h3>{$item[0]}</h3>
            <p>{$item[2]}</p>
            <button class='order-btn' onclick=\"openForm('{$item[0]}')\">Order Now</button>
        </div>";
    }
    ?>
</div>

<!-- Popup Form -->
<div class="popup" id="orderPopup">
    <div class="popup-content">
        <span class="close-btn" onclick="closeForm()">&times;</span>
        <h2>Place Your Order</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="order_details" id="orderDetails" placeholder="Your Order Details" required></textarea>
            <button type="submit" class="submit-btn">Submit Order</button>
        </form>
    </div>
</div>

<script>
    function openForm(itemName) {
        document.getElementById("orderPopup").style.display = "flex";
        document.getElementById("orderDetails").value = itemName;
    }

    function closeForm() {
        document.getElementById("orderPopup").style.display = "none";
    }
</script>

</body>
</html>
