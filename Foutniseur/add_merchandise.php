<link rel="stylesheet" href="style.css">
<?php
// Include database connection
include 'db_connect.php';
echo"<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            $label = $_POST['label'];
            $price = $_POST['price'];

            $sql = "INSERT INTO marchandise (label, price) VALUES ('$label', '$price')";

            if ($conn->query($sql) === TRUE) {
                echo "New merchandise added successfully";
            } else {
                echo "Error adding merchandise: " . $conn->error;
            }
        } elseif ($action == 'edit') {
            if (isset($_POST['code_marchandise'])) {
                $code_marchandise = $_POST['code_marchandise'];
                $label = $_POST['label'];
                $price = $_POST['price'];

                $sql = "UPDATE marchandise SET label = '$label', price = '$price' WHERE code_marchandise = '$code_marchandise'";

                if ($conn->query($sql) === TRUE) {
                    echo "Merchandise updated successfully";
                } else {
                    echo "Error updating merchandise: " . $conn->error;
                }
            } else {
                echo "Missing code_marchandise for edit operation";
            }
        } elseif ($action == 'delete') {
            if (isset($_POST['code_marchandise'])) {
                $code_marchandise = $_POST['code_marchandise'];

                $sql = "DELETE FROM marchandise WHERE code_marchandise = '$code_marchandise'";

                if ($conn->query($sql) === TRUE) {
                    echo "Merchandise deleted successfully";
                } else {
                    echo "Error deleting merchandise: " . $conn->error;
                }
            } else {
                echo "Missing code_marchandise for delete operation";
            }
        }
    }
}

$sql = "SELECT * FROM marchandise";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>All Merchandise</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Label</th><th>Price</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['code_marchandise'] . "</td>";
        echo "<td>" . $row['label'] . "</td>";
        echo "<td>$" . $row['price'] . "</td>";
        echo "<td>
                <form method='post' action='add_merchandise.php'>
                    <input type='hidden' name='code_marchandise' value='" . $row['code_marchandise'] . "'>
                    <input type='hidden' name='action' value='edit'>
                    <button type='submit'>Edit</button>
                </form>
                <form method='post' action='add_merchandise.php' onsubmit='return confirm(\"Are you sure you want to delete this merchandise?\");'>
                    <input type='hidden' name='code_marchandise' value='" . $row['code_marchandise'] . "'>
                    <input type='hidden' name='action' value='delete'>
                    <button type='submit'>Delete</button>
                </form>
            </td>";
        echo "</tr>";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'edit' && $_POST['code_marchandise'] == $row['code_marchandise']) {
            echo "<tr>";
            echo "<td colspan='4'>
                    <form method='post' action='add_merchandise.php'>
                        <input type='hidden' name='code_marchandise' value='" . $row['code_marchandise'] . "'>
                        <input type='hidden' name='action' value='edit'>
                        <label for='edit_label'>Label:</label>
                        <input type='text' id='edit_label' name='label' value='" . $row['label'] . "' required>
                        <label for='edit_price'>Price:</label>
                        <input type='number' id='edit_price' name='price' value='" . $row['price'] . "' step='0.01' min='0' required>
                        <button type='submit'>Save</button>
                    </form>
                </td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo" <a class='add' href=' add_merchandise_form.php'>Add product</a> <br>";

} else {
    echo "No merchandise found.";
}

// Close database connection
$conn->close();
?>
