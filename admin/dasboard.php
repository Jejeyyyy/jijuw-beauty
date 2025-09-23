<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "../config.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
  <h1>Dashboard Admin</h1>
  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<section class="section">
  <h2>Kelola Produk</h2>
  <!-- Tambah produk -->
  <form method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nama Produk" required><br><br>
    <textarea name="description" placeholder="Deskripsi" required></textarea><br><br>
    <input type="number" name="price" placeholder="Harga" required><br><br>
    <input type="text" name="image" placeholder="Nama File Gambar (di folder images/)" required><br><br>
    <button type="submit" class="btn">Tambah Produk</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $desc = $_POST['description'];
      $price = $_POST['price'];
      $image = $_POST['image'];

      $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssds", $name, $desc, $price, $image);
      $stmt->execute();
      echo "<p>Produk berhasil ditambahkan!</p>";
  }
  ?>

  <h3>Daftar Produk</h3>
  <div class="product-list">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while($row = $result->fetch_assoc()) {
      echo "<div class='product-card'>
              <h3>".$row['name']."</h3>
              <p>".$row['description']."</p>
              <p>Rp ".number_format($row['price'],0,',','.')."</p>
            </div>";
    }
    ?>
  </div>
</section>
</body>
</html>
