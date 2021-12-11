<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a></button>
        <table class="table bg-success">
            <thead>
                <tr>
                    <th scope="col">SI no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql="select * from crud ";
$result=mysqli_query($con,$sql);
if($result)
{
  while($row=mysqli_fetch_assoc($result))
  {
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $password=password_hash($row['password'],PASSWORD_DEFAULT);
   echo ' <tr>
   <th scope="row">'.$id.'</th>
   <td>'.$name.'</td>
   <td>'.$email.'</td>
   <td>'.$mobile.'</td>
   <td>'.$password.'</td>
   <td>
   <button class="btn btn-primary"><a href="update.php? updateid='.$id.'"class="text-light">Update</a></button>
<button class="btn btn-danger my-3"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
</td>
 </tr>';
}
} ?>
            </tbody>
        </table>
    </div>
</body>

</html>