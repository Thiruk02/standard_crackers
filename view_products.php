<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Connect to your InfinityFree database
$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765", "if0_39529878_standard_crackers");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all orders
$sql = "SELECT id, customer_name, customer_email, product_name, quantity, total_price, order_date, customer_mobile, customer_address FROM orders ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders - Standard Crackers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px 12px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 14px;
        }
        th {
            background-color: #006666;
            color: #fff;
        }
    </style>
</head>
<body>

<h2>Customer Orders - Standard Crackers</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Price (₹)</th>
        <th>Order Date</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['customer_name']}</td>
                <td>{$row['customer_email']}</td>
                <td>{$row['customer_mobile']}</td>
                <td>{$row['customer_address']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['total_price']}</td>
                <td>{$row['order_date']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No orders found.</td></tr>";
    }
    ?>
</table>
<a href="index.php" class="btn btn-secondary mt-3">⬅️ Back to Home</a>
</body>
</html>

<?php $conn->close(); ?>
