<?php

require 'partials/_dbconnect.php';

if(isset($_POST['submit'])){
 $user_id = $_GET['user_id'] ;
 $description=$_POST['description'];

 $img_loc=$_FILES['media']['tmp_name'];
 $img_name=$_FILES['media']['name'];
 $img_des = "uploaded_Images/".$img_name;
 move_uploaded_file($img_loc, 'uploaded_Images/' .$img_name);


//  ========Selecting id of a user to insert in upload_image
//  $sql="SELECT id FROM user";
//  $result = mysqli_query($conn, $sql);
//  if(mysqli_num_rows($result) > 0){
//      while($row = mysqli_fetch_assoc($result)){
//          $user_id = $row['id'];
//      }
//  } else {
//     $user_id = 0;
//  }
// ====>




 $sql="INSERT INTO `upload_image`(`user_id`,`description`, `image`) VALUES ('$user_id', '$description', '$img_des')";
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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

                    <?php
                    $user_id = $_SESSION['user_id'];
                ?>
                <?php
                    $sql="SELECT * FROM `user` WHERE id = $user_id";
                    $result=mysqli_query($conn,$sql);
                    $data = mysqli_fetch_array($result);
                ?>
                        <img class="ml-2 my-2" src="<?php echo $data['profile_image'] ?>" alt="" width="46px">
                        <span class="ml-2 my-3" style="font-size: 18px;color: black;font-weight: bold;">
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
                        $user_id =$_SESSION['user_id'];
                        ?>

                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->
                        <!-- ================================================================================================ -->

                        <form action="upload_photos.php?user_id=<?php echo $user_id ?>" method="post"
                            enctype='multipart/form-data'>
                            
                            <div class="image_padding_box" style="padding: 55px 94px;">
                                <label for="media">Add Photos/Videos</label>
                                <input type="file" name="media" id="media" accept="image/*,video/*"
                                    onchange="handleMediaFiles(this.files)" required>
                            </div>

                    </div>



                    <div class="form-group col-md-12">
                        <input type="text" name="description" class="form-control" id="DOB" placeholder="Description..">
                        <hr>
                    </div>


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