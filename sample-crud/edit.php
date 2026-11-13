<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $course, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required><br><br>
        Course: <input type="text" name="course" value="<?= htmlspecialchars($row['course']) ?>" required><br><br>
        <button type="submit">Update Student</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>