<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .content {
            padding: 20px;
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

        .logout-link {
            display: block;
            text-align: center;
            margin: 20px 0;
        }

        .logout-link a {
            text-decoration: none;
            color: white;
            background-color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-link a:hover {
            background-color: #575757;
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
            <li><a href="staff.php">Exam Section</a></li>
            <li><a href="ApplyOnline.php">Log Out</a></li>
        </ul>
    </div>
    <h1>The details of submitted online form are here.</h1>
    <div class="logout-link">
        <a href="ApplyOnline.php">Click here to logout</a>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Contact Number</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>E-mail</th>
            <th>Class & Subject</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Temporary Address</th>
            <th>Permanent Address</th>
            <th>Previous School</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
      
<?php  
include('connection.php');
$sql = "SELECT * from its_form";
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $cnumber = $row['cnumber'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $email = $row['email'];
        $subject = $row['subject'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $taddress = $row['taddress'];
        $paddress = $row['paddress'];
        $pschool = $row['pschool'];

        echo "<tr>
                <td>{$name}</td>
                <td>{$age}</td>
                <td>{$cnumber}</td>
                <td>{$dob}</td>
                <td>{$gender}</td>
                <td>{$email}</td>
                <td>{$subject}</td>
                <td>{$fname}</td>
                <td>{$mname}</td>
                <td>{$taddress}</td>
                <td>{$paddress}</td>
                <td>{$pschool}</td>
                <td class='action-links'><a class='update-link' href='update_student.php?id={$id}'>Update</a></td>
                <td class='action-links'><a class='delete-link' href='delete_student.php?id={$id}'>Delete</a></td>
            </tr>";
    }
} else {
    echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
?>
    </table>
</body>
</html>
