<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765", "if0_39529878_standard_crackers");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $stock = $_POST['stock'];

  $conn->query("INSERT INTO products (name, price, image, stock) VALUES ('$name', '$price', '$image', '$stock')");
  echo "<div style='color: green;'>Product added successfully!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product - Standard Crackers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
  <h2>Add New Product</h2>
  <form method="POST">
    <div class="mb-3">
      <label>Product Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Price (₹)</label>
      <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Image URL</label>
      <input type="text" name="image" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Stock Quantity</label>
      <input type="number" name="stock" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-warning">Add Product</button>
  </form>
</div>

</body>
</html>
