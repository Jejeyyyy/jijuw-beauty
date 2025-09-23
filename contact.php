<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Jijuw Beauty</title>
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
  <h2>Hubungi Kami</h2>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $message);
      $stmt->execute();
      echo "<p>Pesan berhasil dikirim!</p>";
  }
  ?>
  <form method="post">
    <input type="text" name="name" placeholder="Nama" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <textarea name="message" placeholder="Pesan Anda" required></textarea><br><br>
    <button type="submit" class="btn">Kirim</button>
  </form>
</section>

<footer>
  <p>&copy; 2025 Jijuw Beauty. All Rights Reserved.</p>
</footer>
</body>
</html>
