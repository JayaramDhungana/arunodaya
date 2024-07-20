<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (isset($_POST['confirm_delete'])) {
        $stmt = $con->prepare("DELETE FROM teachers WHERE id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ManageTeacher.php");
            exit;
        } else {
            echo "Error deleting teacher: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "Invalid teacher ID.";
    exit;
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .confirm-box {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .confirm-box form {
            display: inline-block;
            margin: 10px;
        }
        .confirm-box input[type="submit"] {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .confirm-box input[type="submit"]:hover {
            background-color: #da190b;
        }
        .confirm-box a {
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .confirm-box a:hover {
            background-color: #575757;
        }
    </style>
</head>
<body>
    <h1>Delete Teacher</h1>
    <div class="confirm-box">
        <p>Are you sure you want to delete this teacher?</p>
        <form method="POST">
            <input type="submit" name="confirm_delete" value="Yes, Delete">
        </form>
        <a href="ManageTeacher.php">Cancel</a>
    </div>
</body>
</html>
