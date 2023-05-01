<?php

require 'partials/_dbconnect.php';

if(isset($_POST['submit'])){
 $user_id = $_GET['user_id'] ;


 $img_loc=$_FILES['profile_image']['tmp_name'];
 $img_name=$_FILES['profile_image']['name'];
 $img_des = "uploaded_Images/".$img_name;
 move_uploaded_file($img_loc, 'uploaded_Images/' .$img_name);






 $sql="UPDATE `user` SET `profile_image`='$img_des' WHERE id = '$user_id'";
 $result=mysqli_query($conn,$sql);
 if($result){
   header("location: index.php");
 }
 else{
    echo "Posted";
 }
}

?>



<!-- Modal -->
<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <!--Modal body=========================== -->
            <div class="modal-body">
                <div class="container border">

                    <div class="row">


                        <img src="images/credit-client.png" alt="" width="46px">
                        <span class="ml-2" style="font-size: 18px;color: black;font-weight: bold;">
                            <?php
                                    if(isset($_SESSION['firstname'], $_SESSION['lastname']) && !empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])){
                                        echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                                    } else {
                                        echo "Please sign up again";
                                    }
                                ?>
                        </span>



                        <!-- ============================================Form start========================2================================== -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- important when you want to select user id from session and use it as avariable -->
                        <?php 
                        $user_id = $_SESSION['user_id'];
                        ?>

                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->

                        <form action="update_profile.php?user_id=<?php echo $user_id ?>" method="post"
                            enctype='multipart/form-data'>

                            <div class="image_padding_box" style="padding: 55px 94px;">
                                <label for="media">Add Photos/Videos</label>
                                <input type="file" name="profile_image" value="<?php echo $data['profile_image'] ?>">
                                <img class="mt-3 border" src="<?php echo $data['profile_image'] ?>" width="200px"
                                    id="media" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="old_img" class="form-label"></label>
                                <input type="text" value="<?php echo $data['profile_image'] ?>" class="form-control"
                                    name="old_img" id="old_img">
                            </div>

                    </div>



                    <!-- <div class="form-group col-md-12">
                        <input type="text" name="description" class="form-control" id="DOB" placeholder="Description..">
                        <hr>
                    </div> -->


                    <div class="col-md-12 mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Post</button>
                    </div>
                    </form>
                    <!-- =====================================Form END=============================================================== -->
                </div>

            </div>
        </div>


    </div>
</div>
</div>

<script>
function handleMediaFiles(files) {
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var fileType = file.type.split("/")[0];
        if (fileType === "image") {
            // handle image file
            console.log("Image file selected: " + file.name);
        } else if (fileType === "video") {
            // handle video file
            console.log("Video file selected: " + file.name);
        } else {
            // handle other file types
            console.log("Invalid file type: " + file.name);
        }
    }
}
</script>