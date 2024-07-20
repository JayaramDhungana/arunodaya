<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM its_form WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Student not found.";
        exit;
    }
} else {
    echo "Invalid student ID.";
    exit;
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $cnumber = $_POST['cnumber'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $taddress = $_POST['taddress'];
    $paddress = $_POST['paddress'];
    $pschool = $_POST['pschool'];

    $sql = "UPDATE its_form SET 
            name='$name', 
            age='$age', 
            cnumber='$cnumber', 
            dob='$dob', 
            gender='$gender', 
            email='$email', 
            subject='$subject', 
            fname='$fname', 
            mname='$mname', 
            taddress='$taddress', 
            paddress='$paddress', 
            pschool='$pschool' 
            WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "Student updated successfully.";
        header("Location: OnlineAdmission.php");
    } else {
        echo "Error updating student: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
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
        }
        input[type="text"], input[type="email"], input[type="date"] {
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
    <h1>Update Student</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <label>Age:</label>
        <input type="text" name="age" value="<?php echo $row['age']; ?>" required>
        <label>Contact Number:</label>
        <input type="text" name="cnumber" value="<?php echo $row['cnumber']; ?>" required>
        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required>
        <label>Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <label>Class & Subject:</label>
        <input type="text" name="subject" value="<?php echo $row['subject']; ?>" required>
        <label>Father's Name:</label>
        <input type="text" name="fname" value="<?php echo $row['fname']; ?>" required>
        <label>Mother's Name:</label>
        <input type="text" name="mname" value="<?php echo $row['mname']; ?>" required>
        <label>Temporary Address:</label>
        <input type="text" name="taddress" value="<?php echo $row['taddress']; ?>" required>
        <label>Permanent Address:</label>
        <input type="text" name="paddress" value="<?php echo $row['paddress']; ?>" required>
        <label>Previous School:</label>
        <input type="text" name="pschool" value="<?php echo $row['pschool']; ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
