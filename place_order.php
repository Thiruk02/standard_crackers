<?php
session_start();
$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765", "if0_39529878_standard_crackers");


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Cart is empty.");
  }

  foreach ($_SESSION['cart'] as $item) {
    $product_name = $item['product_name'];
    $quantity = $item['quantity'];
    $total_price = $item['product_price'] * $quantity;

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, product_name, quantity, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $name, $email, $product_name, $quantity, $total_price);
    $stmt->execute();
  }

  // Clear cart
  unset($_SESSION['cart']);

  echo "<h2 style='color:green;'>🎉 Order placed successfully!</h2>";
  echo "<a href='products.php'>🛒 Shop More</a>";
}
?>