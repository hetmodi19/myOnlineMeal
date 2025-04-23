<?php
$conn = new mysqli("localhost", "root", "", "myonlinemeal");
if ($conn->connect_error) die("Connection failed");

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: admin_panel.php");
exit();
