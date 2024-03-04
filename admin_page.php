
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_page_style.css">
    <title>Admin Page</title>
</head>
<body>
    <h1>This is a admin Page.</h1>
    <h1>The details of submitted online form are here.</h1>
    <a href="ApplyOnline.php">Click here to logout</a>
    <br><br>
    <table >
        <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Contact Number</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>E-mail</th>
        <th>Class & subject</th>
        <th>Father's Name</th>
        <th>Mother's Name</th>
        <th>Temprorary Address</th>
        <th>Permanent Address</th>
        <Th>Previous School</Th>
        
      </tr>
      
      
<?php  

include('connection.php');
$sql="SELECT * from its_form";

$result=mysqli_query($con,$sql);
if($result)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $name=$row['name'];
        $age=$row['age'];
        $cnumber=$row['cnumber'];
        $dob=$row['dob'];
        $gender=$row['gender'];
        $email=$row['email'];
        $subject=$row['subject'];
        $fname=$row['fname'];
        $mname=$row['mname'];
        $taddress=$row['taddress'];
        $paddress=$row['paddress'];
        $pschool=$row['pschool'];

        ?>
        <tr>
            <td><?php echo $name?></td>
            <td><?php echo $age?></td>
            <td><?php echo $cnumber?></td>
            <td><?php echo $dob?></td>
            <td><?php echo $gender?></td>
            <td><?php echo $email?></td>
            <td><?php echo $subject?></td>
            <td><?php echo $fname?></td>
            <td><?php echo $mname?></td>
            <td><?php echo $taddress?></td>
            <td><?php echo $paddress?></td>
            <td><?php echo $pschool?></td>
            
        </tr>


<?php
    }
}
?>
       




    </table>
    
</body>
</html>