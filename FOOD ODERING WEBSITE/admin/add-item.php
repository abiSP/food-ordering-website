<?php
$conn = new mysqli('localhost', 'root', '', 'food_order');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $sql = "INSERT INTO food_items (name, price, description) VALUES ('$name', '$price', '$description')";
    $conn->query($sql);
    header("Location: ../menu.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
<div class="container">
    <h2>Add Food Item</h2>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="text" name="price" placeholder="Price" required><br><br>
        <textarea name="description" placeholder="Description"></textarea><br><br>
        <button type="submit" class="button">Add Item</button>
    </form>
</div>
</body>
</html>
