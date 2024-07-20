<?php 

session_start();
include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];

    if(!empty ($user_name)&&!empty($password)&&!is_numeric($user_name))
    {
        $query="SELECT * from signup where user_name = '$user_name' ";

       $result= mysqli_query($con,$query);

       if($result)
       {
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data=mysqli_fetch_assoc($result);
            if($user_data['password']==$password)
                {
                    $_SESSION['user_id']=$user_data['user_id'];
                    echo " Login Successfull";
                    header("Location: AdminPage\admin_page.php");
                    die;
                }
               
            }

        }
        
            // echo " Wrong username or password";
            ?>
            <script>
            alert('wrong username and password')
            
            </script>
            <?php

    }
    else{
       
        //echo "Please enter some valid information";
        ?>
        <script>
            alert('wrong username and password')
            
            </script>
            <?php
    }
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="applyonlinedetails.css">
    <title>Arunodaya</title>
    <script src="script.js"></script>
</head>
<body>

    <div class="navbar">
        <div class="logo">
        <img src="assets/schoolLogo.jpg" height="80" width="80">
            <div class="logoname">Shree Arunodaya Secondary School</div>
        </div>
        <div class="menu">
            <ul>
                <a href="index.html" ><li >Home</li></a>
                <a  href="staff.html"  >  <li>Staff</li></a>
                  <a href="Students.html"><li>Students</li></a>  
                <a href="aboutUs.html"><li>About Us</li></a>
               <a href="ApplyOnline.php"> <li>Apply Online</li></a>
                <a href="gallery.html"><li>Gallery</li></a>
            </ul>
        </div>
    </div>
    <h1>Online Form To Submit Your Details </h1>
    <h3>Please fill the follwoing form</h3>

    <div class="form" >

    <form action="form_data.php" method="POST" id="form1">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" placeholder="Enter your full name " required><br><br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" placeholder="Enter your Age" required><br><br>
        <label for="phohe">Contact Number:</label>
        <input type="tel" name="cnumber" id="cnumber" placeholder="Enter your Contact Number" required><br><br>
        <label for="dateofbirth">Date Of Birth:</label>
        <input type="date" name="dob" id="dob" required><br><br>
        <label for="gender">Gender:</label>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="gender" value='male' required>
        <label for="female">female</label>
        <input type="radio" name="gender" id="gender" value ='female' required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required><br><br>
        <label for="targetclass" r> which class do you want to read:</label>
       
        <select name="subject" id="subject" required>
            <option value="select" >Select</option>
            <option value="Class 9-General">Class 9-General</option>
            <option value="Class 9-Civil Engineering">Class 9-Civil Engineering</option>
            <option value="Class 11-Civil Engineering">Class 11-Civil Engineering</option>
            <option value="Class 11-Computer Science">Class 11-Computer Science</option>
            <option value="Class 11-Business Studies">Class 11-Business Studies</option>
            <option value="Class 11-Hotel Management">Class 11-Hotel Management</option>
        </select><br><br>
        <label for="Fname">Father's Name : </label>
        <input type="text" name="fname" id="fname" placeholder="Enter your Father's name " required><br><br>
        <label for="mname">Mother's Name : </label>
        <input type="text" name="mname" id="mname" placeholder="Enter your mother's name " required><br><br>
        <label for="taddress">Temprorary Address: </label>
        <input type="text" name="taddress" id="taddress" placeholder=" Temprorary Address " required><br><br>
        <label for="paddress">Permanent Address: </label>
        <input type="text" name="paddress" id="paddress" placeholder="Permanent Address "required><br><br>
        <label for="p_school">Previous School </label>
        <input type="text" name="pschool" id="pschool" placeholder="Enter your Previous School" required><br><br>
          <input type="submit" value="Submit" placeholder="Submit" id="submit">   
          <input type="reset" value="Reset" placeholder="Reset" id="reset">     
    </form>
    <div class="blank"></div>
    <div class="admin">This is for admin use only.<br>
        Others Don't Touch it<br><br>
        <form action="ApplyOnline.php" method="post" id="form2">
            <div style="font-size: 30px; margin: 20px; margin-left:70px;color: black;">Login</div>
            <input type="text" name="user_name" id="user_name"
            placeholder="Enter Username" required><br><br>
            <input type="password" name="password" id="password"
            placeholder="Enter Password" required><br><br>
            <input  action type="submit" value="Login" id="button" style="margin-left: 70px;" ><br>
            <a href="signup.php" style="margin-left: 70px;">Click To Signup</a>
        </form>
        
        



    </div>
</div>


   
</body>

</html>