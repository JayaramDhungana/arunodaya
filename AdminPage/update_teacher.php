<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Get current teacher data
    $sql = "SELECT * FROM teachers WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $teacher = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $post = $_POST['post'];
        $contact = $_POST['contact'];
        $facebook_url = $_POST['facebook_url'];
        $picture = $teacher['picture']; // Default to current picture

        // Handle file upload
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['picture']['name']);
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
                $picture = $target_file;
            } else {
                echo "Error uploading file.";
            }
        }

        $sql = "UPDATE teachers SET name = '$name', post = '$post', contact = '$contact', facebook_url = '$facebook_url', picture = '$picture' WHERE id = $id";
        
        if (mysqli_query($con, $sql)) {
            header("Location: ManageTeacher.php");
            exit;
        } else {
            echo "Error updating teacher: " . mysqli_error($con);
        }
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
    <title>Update Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="text"], input[type="url"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Update Teacher</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $teacher['name']; ?>" required>
        <label>Post:</label>
        <input type="text" name="post" value="<?php echo $teacher['post']; ?>" required>
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $teacher['contact']; ?>" required>
        <label>Facebook Profile URL:</label>
        <input type="url" name="facebook_url" value="<?php echo $teacher['facebook_url']; ?>" required>
        <label>Picture:</label>
        <input type="file" name="picture">
        <input type="submit" value="Update Teacher">
    </form>
</body>
</html>
