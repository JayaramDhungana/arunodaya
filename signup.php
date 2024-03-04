<?php 

session_start();
include("connection.php");
include("function.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
   //Something was posted
   $user_name=$_POST['user_name'];
  $password= $_POST['password'];
  

  if(!empty($user_name)&& !empty($password) && !is_numeric($user_name))
  {
    //Save to database
    $user_id=random_num(20);
    $query = "INSERT into signup (user_id,user_name,password) values('$user_id','$user_name','$password')";
    mysqli_query($con,$query);
    header("Location:ApplyOnline.php");
    die;
  }
  else
  {
   echo " Plese enter some valid information";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .signup{
            background-color: grey;
            width: 300px;
            margin:auto;
            padding: 20px;
        }
        #user_name,#password{
    height:25px;
    border-radius:5px;
    padding:4px;
    border:solid thin #aaa;
    width: 100%;
 }
 #button{
    padding:10px;
    width: 100px;
    color:white;
    background-color: lightblue;
    border:none;
 }
    </style>
</head>
<body>
    
    <div class="signup">
        <h1>Signup Before login</h1>
        <p>Signup</p>
        <form method="POST">
        <input type="text" name="user_name" id="user_name" placeholder="Set Username"><br><br>
        <input type="password" name="password" id="password" placeholder="Set Password"><br><br>
        <input type="submit" value="Signup" id="button">
        <a href="ApplyOnline.php">Click to go login page</a>

        </form>



    </div>
</body>
</html>