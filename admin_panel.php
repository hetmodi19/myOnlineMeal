<?php
session_start();

// Check if the logout request is received
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Destroy the session and logout
    session_destroy();
    header("Location: admin_login.php"); // Redirect to login page
    exit(); // Stop further execution
}

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "myonlinemeal"; // Update as per your DB

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch orders
$sql_orders = "SELECT * FROM orders ORDER BY created_at DESC";
$result_orders = $conn->query($sql_orders);

// Fetch contact submissions
$sql_contacts = "SELECT * FROM contact_us ORDER BY submitted_at DESC";
$result_contacts = $conn->query($sql_contacts);

if ($result_contacts === false) {
    die("Error fetching contact submissions: " . $conn->error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myonlinemeal"; // Adjust this to your actual DB name

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the contact_us table
    $sql = "INSERT INTO contact_us (name, email, phone, message, submitted_at) 
            VALUES ('$name', '$email', '$phone', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a thank you page or back to the admin panel
        header("Location: admin_panel.php?status=success");
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Orders & Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f6fa;
        }

        header {
            background: #2d3436;
            color: white;
            padding: 15px 20px;
            text-align: center;
            font-size: 1.5rem;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: white;
        }

        th,
        td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #0984e3;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {

            table,
            th,
            td {
                font-size: 14px;
            }
        }

        .back-btn {
            display: inline-block;
            margin: 10px 20px;
            text-decoration: none;
            padding: 10px 20px;
            background: #00b894;
            color: white;
            border-radius: 5px;
        }

        .back-btn:hover {
            background: #019875;
        }
    </style>
</head>

<body>
    <header>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span>Admin Panel - Order & Contact Management</span>
            <a href="?logout=true" class="back-btn" style="padding: 10px 15px;">Logout</a>
        </div>
    </header>

    <a class="back-btn" href="index.php">← Back to Home</a>

    <!-- Orders Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Order</th>
            <th>Status</th>
            <th>Placed At</th>
        </tr>
        <?php
        if ($result_orders->num_rows > 0) {
            while ($row = $result_orders->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['customer_name']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['order_details']}</td>
                    <td>
                        <form method='post' action='update_status.php'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <select name='status'>
                                <option value='Pending' " . ($row['order_status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                <option value='Processing' " . ($row['order_status'] == 'Processing' ? 'selected' : '') . ">Processing</option>
                                <option value='Delivered' " . ($row['order_status'] == 'Delivered' ? 'selected' : '') . ">Delivered</option>
                            </select><br>
                            <button type='submit'>Update</button>
                        </form>
                    </td>
                    <td>{$row['created_at']}</td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No orders found.</td></tr>";
        }
        ?>
    </table>

    <!-- Contact Us Submissions Table -->
    <h2 style="text-align:center;">Contact Us Submissions</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result_contacts->num_rows > 0) {
            while ($row = $result_contacts->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['submitted_at']}</td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No contact submissions found.</td></tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
// Close the connection
$conn->close();
?>