<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();
$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765", "if0_39529878_standard_crackers");

if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}
$customer_name = $_POST['name'] ?? '';
$customer_email = $_POST['email'] ?? '';
$customer_mobile = $_POST['mobile'] ?? '';
$customer_address = $_POST['address'] ?? '';

if (!$customer_name || !$customer_email) {
    die("❌ Missing customer name or email");
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    die("❌ Cart is empty");
}

foreach ($_SESSION['cart'] as $item) {
    $product_id = $item['id'];  // 👈 This is key!
    $quantity = $item['quantity'];


    $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
    if ($result->num_rows == 0) continue;

    $product = $result->fetch_assoc();
    $product_name = $product['name'];
    $price = $product['price'];
    $total_price = $price * $quantity;

    if ($product['stock'] < $quantity) {
        die("❌ Not enough stock for $product_name");
    }

$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, customer_mobile, customer_address, product_name, quantity, total_price, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

$stmt->bind_param("sssssid", $customer_name, $customer_email, $customer_mobile, $customer_address, $product_name, $quantity, $total_price);

    if ($stmt->execute()) {
        echo "✅ Saved $product_name x $quantity<br>";
        $conn->query("UPDATE products SET stock = stock - $quantity WHERE id = $product_id");
    } else {
        echo "❌ Failed to insert order for $product_name<br>";
    }
}

unset($_SESSION['cart']);
echo "<h2>🎉 Order Placed Successfully!</h2><a href='products.php'>Back to Shop</a>";
?>
