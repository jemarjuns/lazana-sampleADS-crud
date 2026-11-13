<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE records SET name=?, description=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM records WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Record</title></head>
<body>
    <h2>Edit Record</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>
        Description: <input type="text" name="description" value="<?= htmlspecialchars($row['description']) ?>" required><br><br>
        <button type="submit">Update</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>