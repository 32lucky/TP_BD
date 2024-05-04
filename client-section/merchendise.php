<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
</head>
<body>
    <h2>Available Merchandise</h2>

    <?php
    // Include database connection
    include 'db_connect.php';

    // Query to fetch merchandise
    $sql = "SELECT * FROM marchandise";
    $result = $conn->query($sql);

    // Display merchandise
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['label'] . "</h3>";
            echo "<p>Price: $" . number_format($row['price'], 2) . "</p>"; // Display price formatted to 2 decimal places
            echo "<form method='post' action='add_to_cart.php'>";
            echo "<input type='hidden' name='merchandise_id' value='" . $row['code_marchandise'] . "'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No merchandise available.";
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
