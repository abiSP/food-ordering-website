<?php
$conn = new mysqli('localhost', 'root', '', 'food_order');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT * FROM food_items";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Menu</h2>
    <?php while ($row = $result->fetch_assoc()): ?>
    <div class="food-item">
        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['price']; ?></p>
        <a href="order.php?id=<?php echo $row['id']; ?>" class="button">Order Now</a>
    </div>
    <?php endwhile; ?>
</div>
</body>
</html>
