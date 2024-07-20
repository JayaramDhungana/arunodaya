<?php
include('connection.php');

$sql = "SELECT * FROM teachers";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Staffs of Civil Department</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .navbar {
            width: 100%;
            background-color: #0044cc;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 80px;
            width: 80px;
            margin-right: 10px;
        }

        .logoname {
            font-size: 24px;
        }

        .menu ul {
            list-style: none;
            display: flex;
            margin: 0;
        }

        .menu ul li {
            margin-right: 20px;
        }

        .menu ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu ul li a:hover {
            background-color: #0056e0;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #0044cc;
            margin: 20px 0;
        }

        .principlesir {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 40px;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .pimage img {
            border-radius: 50%;
            margin-right: 20px;
        }

        .pname {
            font-size: 20px;
            color: #333;
        }

        .pflink {
            margin-top: 10px;
        }

        .pflink a img {
            height: 24px;
            width: 24px;
        }

        .pname a {
            text-decoration: none;
            color: #0044cc;
        }

        .pname a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="assets/schoolLogo.jpg" height="80" width="80">
            <div class="logoname">Shree Arunodaya Secondary School</div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="staff.php">Staff</a></li>
                <li><a href="Students.html">Students</a></li>
                <li><a href="aboutUs.html">About Us</a></li>
                <li><a href="ApplyOnline.php">Apply Online</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>
        </div>
    </div>

    <h1>All Staffs of Civil Department</h1>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="principlesir">
            <div class="pimage">
                <img src="<?php echo $row['picture']; ?>" width="100px" height="100px">
            </div>
            <div class="pname">
                <?php echo $row['name']; ?>
                <br>Post: <?php echo $row['post']; ?><br>
                Contact: <?php echo $row['contact']; ?>
                <div class="pflink"> 
                    Facebook: 
                    <a href="<?php echo $row['facebook_url']; ?>" target="_blank">
                        <img src="assets/flogo.png" height="40px" width="40px">
                    </a>
                </div>
            </div>
        </div>
        <br>
    <?php } ?>

</body>
</html>

<?php
mysqli_close($con);
?>
