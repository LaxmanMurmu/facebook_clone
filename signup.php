<?php
 $showAlert = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){          //when form is post method this will start running
   
// ========================================================DATABASE CONNECTION CALLED(INCLUDE)========================================    
include 'partials/_dbconnect.php';                

// Storing data 
 $firstname = $_POST['firstname'];                   
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $password = $_POST['password'];                   
 $DOB = $_POST['DOB'];
 $gender = $_POST['gender'];

 $profile_image = 'images/user.png';

 $existSql = "SELECT * FROM `user` WHERE email = '$email'";
 $result = mysqli_query($conn, $existSql);
 $numExistRows = mysqli_num_rows($result);
 if($numExistRows > 0){
     $showError = " Email already been registered";
 }
 else{
     $hash = password_hash($password, PASSWORD_DEFAULT);
     $sql = "INSERT INTO `user`(`firstname`, `lastname`, `email`, `password`, `DOB`, `gender`, `profile_image`) VALUES ('$firstname','$lastname','$email','$hash','$DOB','$gender','$profile_image')";
     $result = mysqli_query($conn, $sql);
     if($result){
       header("location: login.php");
         $showAlert = true;
     }
 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<style>
body {
    background-color: #e2e2e2;
}

.container {
    max-width: 443px;
    background-color: white;
    border-radius: 7px;
}

.form-group {
    border-radius: 10px;
}
</style>

<body>
    <div class="img my-4" style="display: flex;"><img style="margin: auto;" src="images/fb_logo_name.png" alt=""
            width="220vw"></div>
    </div>
    <!-- ======================================================FORM================================================================ -->
    <div class="container  mt-3" style="box-shadow: 2px 3px 3px 4px rgb(172, 172, 172);">
        <form action="signup.php" method="post">
            <div class="row">

                <div class="form-group col-md-12 mt-3">
                    <div class="" style="text-align: center;">
                        <h3>Create a new account</h3>
                        <p>It's quick and easy.</p>
                    </div>
                    <hr>
                </div>

                <div class="form-group col-md-6">
                    <!-- <label for="exampleInputEmail1 ">First name</label> -->
                    <input type="text" name="firstname" class="form-control" id="first_name"
                        aria-describedby="emailHelp" placeholder="First name">
                </div>

                <div class="form-group col-md-6">
                    <input type="text" name="lastname" class="form-control" id="last_name" aria-describedby="emailHelp"
                        placeholder="Surname">
                </div>


                <div class="form-group col-md-12">
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Email address">
                </div>

                <div class="form-group col-md-12">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                </div>

                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1 ">Date of birth</label>
                    <input type="date" name="DOB" class="form-control" id="DOB" placeholder="">
                </div>

                <div class="form-group  col-md-6">
                    <label for="exampleInputEmail1 ">Gender</label>
                    <select name="gender" class="form-control" id="select" required>
                        <option value="unselet gender">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                    </select>
                </div>


               

            



                <div class="rule_desc_con col-md-12 my-2">
                    <p class="rule_desc" style="font-size: 12px;">People who use our service may have uploaded your
                        contact information to Facebook. Learn more. <br>
                        By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive
                        SMS notifications from us and can opt out at any time.</p>
                </div>


                <div class="form-group col-md-12" style="text-align: center;">

                    <button type="submit" name="submit" class="btn btn-success col-md-6">Submit</button>

                    <a href="login.php">
                        <p class="my-3" style="font-size: 15px;">Already have an account?</p>
                    </a>
                    <div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>