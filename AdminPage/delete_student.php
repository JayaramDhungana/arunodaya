<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Confirm deletion
    if (isset($_POST['confirm_delete'])) {
        $sql = "DELETE FROM its_form WHERE id = $id";

        if (mysqli_query($con, $sql)) {
            echo "Student deleted successfully.";
            header("Location: OnlineAdmission.php");
        } else {
            echo "Error deleting student: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid student ID.";
    exit;
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
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
    <h1>Delete Student</h1>
    <div class="confirm-box">
        <p>Are you sure you want to delete this student?</p>
        <form method="POST">
            <input type="submit" name="confirm_delete" value="Yes, Delete">
        </form>
        <a href="OnlineAdmission.php">Cancel</a>
    </div>
</body>
</html>
