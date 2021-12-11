<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="select *from crud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];


if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
 $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
 $sql="update crud set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";
 $result=mysqli_query($con,$sql);
 if($result)
 {
 //  echo "Updated sucessfully";
   header('location:display.php');
 }
 else{
  die(mysqli_error($con));
 }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <title>Crud operation</title>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script>
 $(document).ready(function(){
    $("#alert").hide();   
   $("#update").click(function(){
  $("#alert").show();
});
}); 
</script>
</head>
<body>
    <div class="container my-5">
    <div class="alert alert-primary" role="alert" id="alert">
  Update page sucessfully
</div>
        <form method="post" action="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off"value=<?php echo $name;?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter the email" name="email" autocomplete="off"value=<?php echo $email;?>>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="number" class="form-control" placeholder="Enter your mobile number" name="mobile"autocomplete="off" value=<?php echo $mobile;?>>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value=<?php echo $password;?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="update">Update</button>
        </form>
    </div>

</html>