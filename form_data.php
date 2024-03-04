<?php  

include('connection.php');

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=$_POST['name'];
    $age=$_POST['age'];
    $cnumber=$_POST['cnumber'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    echo $gender;
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $taddress=$_POST['taddress'];
    $paddress=$_POST['paddress'];
    $pschool=$_POST['pschool'];


    echo "name is " . $name;
    $a="INSERT into its_form(name,age,cnumber,dob,gender,email,subject,
    fname,mname,taddress,paddress,pschool) VALUES ('$name','$age','$cnumber','$dob','$gender',
    '$email','$subject','$fname','$mname','$taddress','$paddress','$pschool' )";

    $result=mysqli_query($con,$a);
    if($result)
    {
        header('Location:ApplyOnline.php');
    }

}




?>