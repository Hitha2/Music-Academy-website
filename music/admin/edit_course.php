<?php
include('authenticate.php');
include('db_config.php');

$id = $_GET['id'];
$query = "SELECT * FROM courses WHERE id='$id'";
$result = mysqli_query($conn, $query);
$course = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $update_query = "UPDATE courses SET name='$name', description='$description' WHERE id='$id'";
    mysqli_query($conn, $update_query);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Course</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= $course['name'] ?>" required>
        <textarea name="description" required><?= $course['description'] ?></textarea>
        <button type="submit">Update Course</button>
    </form>
</body>
</html>
