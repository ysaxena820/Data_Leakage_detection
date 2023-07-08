<?php
 $showAlert=false;
 $showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
   
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $userid=$_POST["userid"];
    $emailid=$_POST["emailid"];
    $exists=false;
    if($password==$cpassword && $exists==false){
        $sql="INSERT INTO register (username,userid,password,emailid) VALUES ('$username','$userid','$password','$emailid')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showAlert=true;

        }
    }
    else{
        $showError="Passwords do not match";
    }


}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has now been created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>' .$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    
    ?>

    <div class="container my-4">
        <h1 >Registration</h1>
        <form action="/Self_Project/signup.php" method="post">
            <div class="form-group col-md-6">
                <label for="username" >Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group col-md-6">
                <label for="userid" >UserId</label>
                <input type="text" class="form-control" id="userid" name="userid" placeholder="UserId">
            </div>
            <div class="form-group col-md-6">
                <label for="password" >Password</label>
                <textarea type="password" class="form-control" id="password" name="password" rows="1" placeholder="Enter Password"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="cpassword" >Confirm Password</label>
                <textarea type="password" class="form-control" id="cpassword" name="cpassword" rows="1" placeholder="Confirm Password"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="emailid" >Email Id</label>
                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email Id">
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>