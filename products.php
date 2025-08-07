<?php
// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765","if0_39529878_standard_crackers");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Close if query fails
if (!$result) {
  die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🎆 All Crackers - Standard Crackers 🎆</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #fff;
    }
    .card {
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 15px #ff0;
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
    .btn-back {
      position: fixed;
      top: 20px;
      left: 20px;
    }
  </style>
</head>
<body>

<a href="index.php" class="btn btn-warning btn-sm btn-back">⬅ Back to Home</a>

<div class="container my-5">
  <h2 class="text-center mb-4">🎇 Available Crackers 🎇</h2>
  <div class="row">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-md-4 mb-4">
        <div class="card bg-light text-dark">
          <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
            <p class="card-text">💰 Price: ₹<?php echo number_format($row['price'], 2); ?></p>
            <p class="card-text">📦 Stock: <?php echo $row['stock']; ?> available</p>
            <form method="post" action="add_to_cart.php">
              <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
              <input type="number" name="quantity" value="1" min="1" max="<?php echo $row['stock']; ?>" class="form-control mb-2" required>
              <button type="submit" class="btn btn-success w-100">🛒 Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

</body>
</html>
