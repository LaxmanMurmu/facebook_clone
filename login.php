<?php
 $login = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){          //when form is post method this will start running
   
// ========================================================DATABASE CONNECTION CALLED(INCLUDE)========================================    
include 'partials/_dbconnect.php';                

// Storing data 
  
 $email = $_POST['email'];                     
 $password = $_POST['password'];




 // $sql = "Select * from users8201 where username = '$username' AND password = '$password'";
    $sql = "Select * from user where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      while($row = mysqli_fetch_assoc($result)){               //fetch
        if(password_verify($password, $row['password'])){      //hash password verify
          $login = true;
          session_start();
          $_SESSION['login'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['firstname'] =$row['firstname'];
          $_SESSION['lastname'] =$row['lastname'];
          $_SESSION['DOB'] =$row['DOB'];
          $_SESSION['user_id'] =$row['id'];
          $_SESSION['profile_image'] = 'images/user.png';
          header("location: index.php");
        }
        else{
          $showError = "Password do not match";
        }
      }
    }
     
  else{
    $showError = "Enter the email correctly";
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
html {
    background-color: rgb(188, 188, 188);
}

.main-con {
    max-width: 355px;
    border-radius: 5px;
}

.foot {
    background-color: rgb(188, 188, 188);
}
</style>

<body>

    <!-- ---------------------------------------------------------------Alert if sucess--------------------------------------------------------     -->
    <?php
 if($login){
   echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS </strong>You Are logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div> ';
   }
// ---------------------------------------------------------------Error if password do not match-------------------------------------
   if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error! </strong> '. $showError .'
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </div> ';
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
        background-color: #f9f9f9;
    }

    html {

        background-color: #f9f9f9;
    }

    .container {
        /* border: 2px solid red; */
        background-color: #f9f9f9;
    }

    .form_container {
        /* border: 2px solid black; */
    }

    .box_container {
        /* border: 2px solid black; */
        display: flex;
        align-items: center;
    }

    .box1 {
        /* border: 2px solid yellow; */
    }

    .log_in_to_fb {
        text-align: center;
    }

    .foot_desc {
        padding: 30px 22px;
    }

    .footer {
        margin-top: 110px;
    }
    </style>

    <body>
        <div class="container mt-5">
            <div class="row box_container">
                <div class="box1 col-md-6"><img class="col-md-12" src="images/mobile.png" alt=""></div>
                <div class="box2  col-md-6">
                    <div class="facebook_logo">
                        <div class="img my-3" style="display: flex;"><img style="margin: auto;"
                                src="images/fb_logo_name.png" alt="" width="220vw"></div>
                    </div>
                    <!-- ============================================================Form=========================================== -->
                    <form action="login.php" method="post" class="row form_container"
                        style="background-color: white; border-radius: 9px; box-shadow: 7px 7px 7px 7px rgb(172, 172, 172);">

                        <div class="form-group col-md-12 log_in_to_fb mt-3">
                            <h5>Log in to Facebbok</h5>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="email" name="email" class="form-control p-3"
                                style="border-radius: 9px; box-shadow: 1px 1px 2px rgb(172, 172, 172);" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="password" name="password" class="form-control p-3"
                                style="border-radius: 9px; box-shadow: 1px 1px 2px rgb(172, 172, 172);" id="password"
                                placeholder="Password">
                        </div>




                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-primary col-md-12 p-3">Submit</button>
                        </div>

                        <div class="form-group row col-md-12 mt-1">
                            <div class="con col-md-6"><a style="display: flex;" href="forget_pass.php"><span class=""
                                        style="margin: auto; color: blue;"> Forgot account? </span></a> </div>
                            <div class="con col-md-6 mb-2" style="display: flex;"><a style="display: flex;"
                                    href="signup.php"><span class="" style="margin: auto; color: blue;"> Sign up for
                                        Facebook </span></a> </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="footer " style="background-color: rgb(237 237 237); text-align: center;">
            <p class="foot_desc" style="color: black; bottom: 0; "> English (UK) हिन्दी
                ਪੰਜਾਬੀ
                اردو
                ગુજરાતી
                मराठी
                বাংলা
                தமிழ்
                తెలుగు
                മലയാളം
                ಕನ್ನಡ <br>
                Sign UpLog inMessengerFacebook LiteWatchPlacesGamesMarketplaceMeta PayMeta StoreMeta
                QuestInstagramBulletinFundraisersServicesVoting Information CentrePrivacy PolicyPrivacy
                CentreGroupsAboutCreate adCreate PageDevelopersCareersCookiesAdChoicesTermsHelpContact uploading and
                non-usersSettingsActivity log
                Meta © 2023</p>
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