<?php
include('connection.php');

$upload_dir = 'uploads';
if (!is_dir($upload_dir)) {
mkdir($upload_dir, 0755, true);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $post = $_POST['post'];
    $contact = $_POST['contact'];
    $facebook_url = $_POST['facebook_url'];
    $picture = '';

   
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

    $sql = "INSERT INTO teachers (name, post, contact, facebook_url, picture) VALUES ('$name', '$post', '$contact', '$facebook_url', '$picture')";
    
    if (mysqli_query($con, $sql)) {
        echo "Teacher added successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$sql = "SELECT * FROM teachers";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teachers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0px;
            background-color: #f4f4f4;
        }
        .navbar {
            width: 100%;
            background-color: #333;
            overflow: auto;
        }

        .navbar ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            justify-content: space-around;
        }

        .navbar ul li {
            float: left;
        }

        .navbar ul li a {
            display: block;
            padding: 14px 20px;
            text-decoration: none;
            color: white;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #575757;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .action-links a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .update-link {
            background-color: #4CAF50;
        }

        .update-link:hover {
            background-color: #45a049;
        }

        .delete-link {
            background-color: #f44336;
        }

        .delete-link:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>
<div class="navbar">
        <ul>
            <li><a href="admin_page.php">Dashboard</a></li>
            <li><a href="OnlineAdmission.php">Online Admission</a></li>
            <li><a href="ManageTeacher.php">Manage Teacher</a></li>
            <li><a href="#manage-students">Manage Students</a></li>
            <li><a href="#library-management">Library Management</a></li>
            <li><a href="#exam-section">Exam Section</a></li>
            <li><a href="ApplyOnline.php">Log Out</a></li>
        </ul>
    </div>
    <h1>Manage Teachers</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Post:</label>
        <input type="text" name="post" required>
        <label>Contact:</label>
        <input type="text" name="contact" required>
        <label>Facebook Profile URL:</label>
        <input type="url" name="facebook_url" required>
        <label>Picture:</label>
        <input type="file" name="picture" required>
        <input type="submit" value="Add Teacher">
    </form>

    <h2>Teachers List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Post</th>
            <th>Contact</th>
            <th>Facebook Profile</th>
            <th>Picture</th>
            <th>Update</th>
            <th>delete</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['post']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><a href="<?php echo $row['facebook_url']; ?>" target="_blank">View Profile</a></td>
                <td><img src="<?php echo $row['picture']; ?>" alt="Picture" width="100"></td>
                <td class='action-links'><a class='update-link' href='update_teacher.php?id=<?php echo $row['id']; ?>'>Update</a></td>
                <td class='action-links'><a class='delete-link' href='delete_teacher.php?id=<?php echo $row['id']; ?>'>Delete</a></td>
           
            </tr>
        <?php } ?>
    </table>

</body>
</html>

<?php
mysqli_close($con);
?>
