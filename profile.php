<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
    header("location: login.php");
}
include "partials/_dbconnect.php"
?>

<?php include "partials/_nav.php"?>
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
.cover_img_con {
    position: relative;
}

.Profile_image {
    position: absolute;
    top: 73%;
    left: 26%;
    transform: translate(-50%, -50%);
    z-index: 0;
}

.full_profile_con {
    /* border: 2px solid green; */
    background-color: #e4e4e4;
}


.out_con_yourUpload {
    /* border: 2px solid green; */
    display: flex;
}

.con_for_pad_mar {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    /* border: 3px solid black; */
    max-width: 874px;
    margin: auto;
}

.yourImage_uploads_con {
    /* border: 2px solid red; */
    /* margin: auto; */
    /* display: flex */
}

.yourImage_uploads {
    /* border: 2px solid blue; */
    object-fit: cover;
    width: 200px;
    height: 200px;
    border-radius: 12px;
}
</style>

<body>
    <div class="full_profile_con">

        <div class="container ">
            <div class="row">
                <div class="cover_img_con col-md-12" style="display: flex;"><img class="col-md-12"
                        style="margin: auto; border-radius: 36px" src="images/346635-PAVK7F-810.jpg" alt="" height="500px">
                </div>

                <div class="Profile_image col-md-3">

                    <?php
                    $user_id = $_SESSION['user_id'];
                ?>
                    <?php
                    $sql="SELECT * FROM `user` WHERE id = $user_id";
                    $result=mysqli_query($conn,$sql);
                    $data = mysqli_fetch_array($result);
                ?>

                    <img data-toggle="modal" data-target="#updateProfile" class="profileImage ml-5"
                        src="<?php echo $data['profile_image'] ?>" alt="" width="180px"
                        style="border-radius: 50%; object-fit: cover;">

                    <!-- this is a modal included for updation -->


                </div>
                <?php include "update_profile.php"?>




                <div style="display: flex; justify-content: space-between;">
                    <div class="col-md-6  " style="display: flex; justify-content: end;">
                        <div class=" profile_name col-md-6" style="margin-right: 8%;"> <span  class=""
                                style="font-size: 20px; font-weight: bold;"><?php if (isset($_SESSION['firstname'])) { ?>
                                <?php echo $_SESSION['firstname'] ?><?php } ?>
                                <?php if (isset($_SESSION['lastname'])) { ?>
                                <?php echo $_SESSION['lastname'] ?><?php } ?>
                            </span>
                            <p>1000 Friends</p>
                        </div>
                    </div>



                    <div class="edit_profile_btn col-md-6 pt-5"
                        style=" display: flex; justify-content: end; align-items: end; gap: 22px;">
                        <button type="button" class="btn btn-primary mb-3">Add to story</button>
                        <button type="button" class="btn btn-light mb-3 mr-3" data-toggle="modal"
                                data-target="#updateProfile" style="background-color: #ffffff;;">Edit
                            Profile</button>
                    </div>
                </div>



                <div class="col-md-12 mt-4">
                    <hr>
                </div>

                <div class="down_mens  col-md-6  pb-3" style="display: flex;justify-content: space-around;">
                    <div class="menu_box">Post</div>
                    <div class="menu_box">About</div>
                    <div class="menu_box">Friends</div>
                    <div class="menu_box">Photos</div>
                    <div class="menu_box">Videos</div>
                    <div class="menu_box">Reels</div>
                    <div class="menu_box">More</div>
                </div>

                <div class="col-md-6 border" style="display: flex; justify-content: end; align-items: end;">
                    <div>Menu</div>
                </div>

            </div>
        </div>
    </div>


    <div class=" container border mt-5 mb-4" style="background-color: #e4e4e4; border-radius: 22px;">

        <div class="profile_item_con mt-4" style="display: flex; justify-content: space-between;">
            <div class="profile_item">
                <h4>Photos</h4><span></span>
            </div>
            <div class="profile_item "> <button type="button" class="btn btn-light mb-3 mr-3" data-toggle="modal"
                    data-target="#exampleModalCenter" style="background-color: #ffffff;;">Add Photos/Videos</button>
            </div>

        </div>

        <div class="photos_menu" style="display: flex; gap: 5%;">
            <p>Photos of you</p>
            <p>Your Photos</p>
            <p>Album</p>
        </div>


        

        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= =====================================================-->
        <!-- ================================= WE ARE USING GROUP BY TO STOP DUPLICATING ================================-->
        <div class="container out_con_yourUpload mt-4">
            <div class="con_for_pad_mar">
                <?php
            include "partials/_dbconnect.php";
            $user_id =$_SESSION['user_id'];
                        $sql="SELECT 
                        user.firstname, user.lastname, user.email, user.DOB, user.gender, 
                        upload_image.description,  upload_image.image
                        FROM 
                        user, upload_image
                        WHERE 
                        upload_image.user_id  =  $user_id
                        GROUP BY upload_image.id
                        ORDER BY upload_image.id desc";

                        $result=mysqli_query($conn,$sql);
                            
                        $num = mysqli_num_rows($result);
                        $nums=0;
                            
                        if($num>0){
                              
                        $n=1;
                        while($row =mysqli_fetch_array($result)){?>


                <div class="yourImage_uploads_con  mb-2">
                    <?php
                                // assuming $row['image'] contains the URL/path to the uploaded image/video
                                $fileType = pathinfo($row['image'], PATHINFO_EXTENSION);

                                if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png" || $fileType == "gif") {
                                    // render image tag for images
                                    echo '<img src="' . $row['image'] . '" alt="Uploaded image" class="yourImage_uploads">';
                                } else if ($fileType == "mp4" || $fileType == "avi" || $fileType == "mov" || $fileType == "wmv") {
                                    // render video tag for videos
                                    echo '<video controls class="yourImage_uploads">
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
                <?php }}?>


            </div>
            <?php include "upload_photos.php"?>
        </div>









        <!-- 
      <div class="b  mb-2" style=" display: flex; gap: 10px; justify-content: space-between; margin: auto; flex-wrap: wrap;">
        <img style=" object-fit: cover;" class="c col-md-" src="images/8331bbe0-aa52-4016-a3ec-08f8876c2d7f.jpg" alt="">
        <img style=" object-fit: cover;" class="c col-md-" src="images/background.png" alt="">
        <img style=" object-fit: cover;" class="c col-md-" src="images/8331bbe0-aa52-4016-a3ec-08f8876c2d7f.jpg" alt="">
        <img style=" object-fit: cover;" class="c col-md-" src="images/background.png" alt="">
        <img style=" object-fit: cover;" class="c col-md-" src="images/background.png" alt="">
      </div> -->





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