<?php
$conn = new mysqli('localhost', 'root', '', 'food_order');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM food_items WHERE id=$id";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order - <?php echo $item['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Order <?php echo $item['name']; ?></h2>
    <p>Price: <?php echo $item['price']; ?></p>
    <form action="process_order.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="text" name="address" placeholder="Delivery Address" required><br><br>
        <button type="submit" class="button">Place Order</button>
    </form>
</div>
</body>
</html>
