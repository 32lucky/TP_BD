<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Merchandise</title>
</head>
<body>
    <h2>Add New Merchandise</h2>
    <form action="add_merchandise.php" method="post">
        <label for="label">Label:</label>
        <input type="text" id="label" name="label" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0" required><br><br>

        <input type="hidden" name="action" value="add"> <!-- Hidden input for 'action' parameter -->

        <input type="submit" value="Add Merchandise">
    </form>
</body>
</html>
