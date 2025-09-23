<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk - Jijuw Beauty</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>🌸 Jijuw Beauty</h1>
  <nav>
    <a href="index.php">Home</a>
    <a href="products.php">Produk</a>
    <a href="contact.php">Kontak</a>
  </nav>
</header>

<section class="section">
  <h2>Daftar Produk</h2>
  <div class="product-list">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while($row = $result->fetch_assoc()) {
      echo "<div class='product-card'>
              <img src='images/".$row['image']."' alt='".$row['name']."'>
              <h3>".$row['name']."</h3>
              <p>".$row['description']."</p>
              <p><b>Rp ".number_format($row['price'],0,',','.')."</b></p>
            </div>";
    }
    ?>
  </div>
</section>

<footer>
  <p>&copy; 2025 Jijuw Beauty. All Rights Reserved.</p>
</footer>
</body>
</html>
