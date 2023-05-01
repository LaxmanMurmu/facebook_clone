<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
    header("location: login.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/regular.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <title>Facebbok</title>

</head>
<style>
.middle_inner_margin {
    background-color: #e0e6e5;
}
</style>

<body>

    <?php include "partials/_nav.php"?>
    <?php include "partials/_dbconnect.php"?>
    <!-- ==============================================================Content  Body All Box======================================================================= -->
    <div class="body_container mt-4">
        <div class="row inner_body_container" style="margin-top: 100px;">

            <!-- ======================================================Left Box============================================================= -->



            <div class="left_inner_body_con col-md-3">
                <div class="left_scroll col-md-3" style="position: fixed">


                    <div class="user_image_div ml-1 my-3">
                        <a href="profile.php">
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- ===================== -->
                            <!-- user default image used -->
                            <?php
                                    $user_id = $_SESSION['user_id'];
                                ?>
                            <?php
                                    $sql="SELECT * FROM `user` WHERE id = $user_id";
                                    $result=mysqli_query($conn,$sql);
                                    $data = mysqli_fetch_array($result);
                                ?>
                            <img src="<?php echo $data['profile_image'] ?>" alt="" width="46px">




                            <span class="ml-2" style="font-size: 18px;color: black;font-weight: bold;">
                                <?php
                                    if(isset($_SESSION['firstname'], $_SESSION['lastname']) && !empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])){
                                        echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                                    } else {
                                        echo "Please sign up again";
                                    }
                                ?>
                            </span>
                        </a>
                    </div>

                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/users.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/group.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Groups</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/shopping-cart.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Market Place</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/zoom.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Watch</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/sand-clock.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Menories</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/bookmark.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Saved</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/facebook-page.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Pages</span> </a> </div>

                    <div class=" col-md-12" style="border: 0.5px solid rgb(205, 205, 205);"></div>

                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="" alt="" width="46px"><span
                                class="ml-2" style="font-size: 20px;color: black ;font-weight: bold;">Settings</span>
                        </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/users.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/group.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Groups</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/shopping-cart.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Market Place</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/zoom.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Watch</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/sand-clock.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Menories</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/bookmark.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Saved</span> </a> </div>
                    <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/facebook-page.png" alt=""
                                width="46px"><span class="ml-2"
                                style="font-size: 18px;color: grey ;font-weight: bold;">Pages</span> </a> </div>
                </div>
            </div>


            <!-- ======================================================Middle Box============================================================= -->
            <div class="middle_inner_body_con col-md-6">


                <div class="middle_inner_margin mt-3" style="background-color: #e0e6e5;">

                    <!-- Stories & Reels Heading -->
                    <div class="mid_box_col1 col-md-12" style="box-shadow: 2px 1px 2px rgb(172, 172, 172);">
                        <div class="stories_reels_head py-2">
                            <h2>Stories</h2>
                            <h2>Reels</h2>
                        </div>
                        <hr>
                    </div>

                    <!-- stories -->


                    <div class="mid_box_col2 col-md-12" style="box-shadow: 2px 1px 2px rgb(172, 172, 172);">
                        <div class="stories_images py-3 pb-3">
                            <div class="story">

                                <div><a href="stories_reels.php">
                                        <div style="text-align: center;"><img class="story_img" src="images/laxman.jpg"
                                                class="" alt="Responsive image" width="190px" height="230px">
                                        </div>
                                        <div style="text-align: center;"><i class="fa-solid fa-circle-plus mt-2"
                                                style="font-size:48px;color:rgb(5 147 255); background-color: white;"></i>
                                        </div>
                                    </a>
                                </div>


                                <img class="story_img" src="images/status1.jpg" class="" alt="Responsive image"
                                    width="190px" height="285px">
                                <img class="story_img" src="images/status2.jpg" class="" alt="Responsive image"
                                    width="190px" height="285px">
                                <img class="story_img" src="images/status3.jpg" class="" alt="Responsive image"
                                    width="190px" height="285px">
                                <img class="story_img" src="images/8331bbe0-aa52-4016-a3ec-08f8876c2d7f.jpg" class=""
                                    alt="Responsive image" width="190px" height="285px">
                            </div>
                        </div>
                    </div>





                    <?php
                                    $user_id = $_SESSION['user_id'];
                                    $sql="SELECT * FROM `user` WHERE id = $user_id";
                                    $result=mysqli_query($conn,$sql);
                                    $row = mysqli_fetch_array($result);
                                ?>


                    <div class="mid_box_col3 mt-3 col-md-12"
                        style="box-shadow: 2px 1px 2px rgb(172, 172, 172); border-radius: 12px;">
                        <div class="user_img_search py-2">
                            <div class="user_image_div"><img src="<?php echo $row['profile_image'] ?>" alt=""
                                    width="50px"></div>
                            <div class="search_con">
                                <input class="searchbox2 p-2 ml-2 mt-2"
                                    style="width: 35vw; padding: 20px; border-radius: 30px;" type="text"
                                    value="Search Facebook Friends">
                            </div>
                        </div>


                        <hr>
                        <div class="live_photo_feeling_container pb-2"
                            style="display: flex; justify-content: around; align-items: center;">
                            <div class="item"><a href=""><img src="images/live.png" style="width :35px;color: black"
                                        alt=""></a>
                            </div>


                            <!-- Upload Photos modal==================== -->

                            <div class="item"><a href=""><img src="images/feelings.png" style="width :35px;color: black"
                                        alt=""></a>
                            </div>

                            <div class="item"> <img data-toggle="modal" data-target="#exampleModalCenter"
                                    src="images/upload.png" style="width :35px; cursor: pointer;" alt="">
                                <?php include "upload_photos.php"?>
                            </div>



                        </div>
                    </div>


                    <!-- ===============================================Photos are upoaded================================================================ -->
                    <div class="uploads mt-3" style="box-shadow: 2px 1px 2px rgb(172, 172, 172);">
                        <?php
                        $sql="SELECT 
                        user.firstname, user.lastname, user.email, user.DOB, user.gender, user.profile_image,
                        upload_image.description,  upload_image.image
                            FROM 
                                user,  upload_image
                            WHERE 
                            user.id = upload_image.user_id 
                        ORDER BY upload_image.id desc";

                            $result=mysqli_query($conn,$sql);
                            
                            $num = mysqli_num_rows($result);
                            $nums=0;
                            
                            if($num>0){
                        $n=1;
                        while($row =mysqli_fetch_array($result)){?>



                        <div style=" background-color: #e0e6e5;" class="space py-1">
                            <hr>
                        </div>
                        <div class="first_line_con mt-4">
                            <div class="user_uploadName py-2">
                                <div class="user_name_disc ml-3"> <img style="border-radius: 50%;"
                                        src="<?php echo $row['profile_image'] ?>" alt="" width="50px">
                                    <span><?php echo $row['firstname'].' '. $row['lastname'];?></span>
                                </div>
                            </div>
                            <div class="user_upload_desc ml-5">
                                <p><?php echo $row['description']?></p>
                            </div>
                        </div>




                        <div class="user_image col-md-12">
                            <div class="img-fluid">
                                <?php
                                // assuming $row['image'] contains the URL/path to the uploaded image/video
                                $fileType = pathinfo($row['image'], PATHINFO_EXTENSION);

                                if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png" || $fileType == "gif") {
                                    // render image tag for images
                                    echo '<img src="' . $row['image'] . '" alt="Uploaded image" class="img-fluid">';
                                } else if ($fileType == "mp4" || $fileType == "avi" || $fileType == "mov" || $fileType == "wmv") {
                                    // render video tag for videos
                                    echo '<video controls class="img-fluid">
                                            <source src="' . $row['image'] . '" type="video/mp4">
                                            <source src="' . $row['image'] . '" type="video/avi">
                                            <source src="' . $row['image'] . '" type="video/mov">
                                            <source src="' . $row['image'] . '" type="video/wmv">
                                        </video>';
                                } else {
                                    // handle other file types or errors
                                }
                              ?>
                            </div>
                        </div>


                        <div class="upluads_row col-md-12 my-3 mb-3 ml-4">
                            <p>Liked by krishna and 90 others</p>
                        </div>

                        <hr>
                        <div class="like_comment_logo">
                            <div><i class="fa-solid fa-thumbs-up" style="font-size:30px;color:black;"></i></div>
                            <div><i class="fa-solid fa-comment" style="font-size:30px;color:black;"></i></div>
                            <div><i class="fa-solid fa-share" style="font-size:30px;color:black;"></i></div>
                        </div>

                        <hr>
                        <div class="user_img_search py-1 ml-3 ">
                            <div class="user_image_div"> <img src="<?php echo $data['profile_image'] ?>" alt=""
                                    width="50px"> </div>
                            <input class="searchbox2 p-2 ml-2 mt-2 mb-3"
                                style="width: 35vw; padding: 20px; border-radius: 30px;" type="text" value="Comment">
                        </div>

                        <?php }}?>
                    </div>

                    <!-- =============================================== End Photos are upoaded====================================================== -->

                </div>
                <!-- div for padding -->
                <!-- col-md-6 -->

                <!-- ======================================end middle box======================== -->




                <!-- ========================================================Right box===================================================== -->

                <div class="right_body_con col-md-3">
                    <div class="right_scroll col-md-3" style="position: fixed;">
                        <h4 class="ml-4 my-3" style="color: green;">Online.</h4>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Groups</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Market Place</span> </a>
                        </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Watch</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Menories</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Saved</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Pages</span> </a> </div>

                        <hr>

                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey;font-weight: bold;">Friends</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Groups</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Market Place</span> </a>
                        </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Watch</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Menories</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Saved</span> </a> </div>
                        <div class="user_image_div ml-3 my-3"> <a href=""> <img src="images/credit-client.png" alt=""
                                    width="46px"><span class="ml-2"
                                    style="font-size: 18px;color: grey ;font-weight: bold;">Pages</span> </a> </div>


                    </div>
                </div>





















            </div>
        </div>


        <!-- ==============================================================Content Middle Body======================================================================= -->



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