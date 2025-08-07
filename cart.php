<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>🛒 Your Cart</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

<div class="container my-5">
  <h2 class="mb-4">🛒 Your Cart</h2>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th>Product</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $total = 0;
        foreach ($_SESSION['cart'] as $item): 
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
        ?>
          <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>₹<?php echo $item['price']; ?></td>
            <td>₹<?php echo $subtotal; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h4>Total: ₹<?php echo $total; ?></h4>

    <a href="products.php" class="btn btn-secondary">⬅️ Back</a>

    <!-- ✅ Place Order Form Here -->
    <h3 class="mt-4">📝 Enter Your Details to Place Order</h3>
    <form method="post" action="checkout.php">
       <div class="mb-3">
    <label for="name" class="form-label">👤 Name</label>
    <input type="text" class="form-control" name="name" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">📧 Email</label>
    <input type="email" class="form-control" name="email" required>
</div>

<div class="mb-3">
    <label for="mobile" class="form-label">📱 Mobile Number</label>
    <input type="text" class="form-control" name="mobile" required>
</div>

<div class="mb-3">
    <label for="address" class="form-label">🏠 Address</label>
    <textarea class="form-control" name="address" rows="3" required></textarea>
</div>
<button type="submit" class="btn btn-success w-100">✅ Confirm Order</button>
    </form>
   
  <?php else: ?>
    <p>Your cart is empty.</p>
    <a href="products.php" class="btn btn-success">🧨 Shop Crackers</a>
  <?php endif; ?>
</div>

</body>
</html>
