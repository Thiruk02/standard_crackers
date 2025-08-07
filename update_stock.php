<?php
$conn = new mysqli("sql313.infinityfree.com", "if0_39529878", "thirumalai98765", "if0_39529878_standard_crackers");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update stock if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    foreach ($_POST['stock'] as $id => $stock) {
        $id = (int)$id;
        $stock = (int)$stock;
        $conn->query("UPDATE products SET stock = $stock WHERE id = $id");
    }
    echo "<div class='alert alert-success text-center'>✅ Stock updated successfully!</div>";
}

// Get products list
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>🛠️ Update Stock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
<div class="container my-5">
    <h2 class="mb-4">📦 Manage Product Stock</h2>
    <form method="POST">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Current Stock</th>
                    <th>Update Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td>
                            <input type="number" class="form-control" name="stock[<?php echo $row['id']; ?>]" value="<?php echo $row['stock']; ?>" min="0">
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" name="update" class="btn btn-success w-100">💾 Update Stock</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">⬅️ Back to Home</a>
</div>
</body>
</html>