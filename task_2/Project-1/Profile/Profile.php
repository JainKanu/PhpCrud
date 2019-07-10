<?php




    require("Cards.php");


    if(isset($_GET["action"])) 
    switch ($_GET["action"]) {
        case 'file':
                uploadFile();
            break;
        
        case 'delete':
                deleteFile();
            break;
        
        default:
            # code...
            break;
    }
    function deleteFile(){
        if(unlink("img/profilePic/".$_SESSION["profile"]["username"]."_profilepic.jpg") === 1)
            {
                echo "File Deleted";
            }
    }
    function uploadFile(){
        if(isset($_FILES["profilePic"])){
            $target_file = "img/profilePic/".$_SESSION["profile"]["username"]."_profilepic.jpg";
            $ext_type = array('gif','jpg','jpe','jpeg','png');
            $ext = pathinfo($_FILES["profilePic"]["name"],PATHINFO_EXTENSION);
            // print_r($_FILES);
            if(in_array($ext,$ext_type))
            {
                // echo "Valid format";
                if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                    echo "<P>FILE UPLOADED TO: $target_file</P>";
                } else {
                    echo "<P>MOVE UPLOADED FILE FAILED!</P>";
                    print_r(error_get_last());
                } 
            }
            else{
                    echo "Invalid format";
            }
        }

        updateDetail();

    }

    function changePhoto(){
       
        ?>
            <form method="post" enctype="multipart/form-data" action="?page=profile&action=changePhoto&action=file">
                <input type="file" value="" name="profilePic" />
                <input type="hidden" value="" name="profilename" />
                <img src='<?php echo "img/profilePic/".$_SESSION["profile"]["username"]."_profilepic.jpg"; ?>' width="15%">
                <?php
                    address();
                ?>
            </form>
            <a href="?page=profile&action=changePhoto&action=delete">deleteFile</a>

        <?php
    }

    function address(){


        ?>
            <form method="post" action="?page=profile&action=changePhoto&action=file">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="Address" value="<?php echo $_SESSION["profile"]["Address"] ?>" class="form-control" placeholder="Enter Address">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="City" value="<?php echo $_SESSION["profile"]["City"] ?>" class="form-control" placeholder="Enter City">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text"  name="State" value="<?php echo $_SESSION["profile"]["State"] ?>" class="form-control" placeholder="Enter State">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Contect No.</label>
                    <input type="number" name="ContectNo" value="<?php echo $_SESSION["profile"]["ContectNo"] ?>" class="form-control" placeholder="Enter Contect No.">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="hidden" name="id" value="<?php echo $_SESSION["profile"]["id"] ?>" class="form-control">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        <?php
    }

    function updateDetail(){
        include("utils/DbConn.php");
        $DB = new DbConn();
        // $DB->
        $res = $DB->conn->query("UPDATE `user` SET `Address` = '$_POST[Address]', `City` = '$_POST[City]', `State` = '$_POST[State]', `ContectNo` = '$_POST[ContectNo]' WHERE `user`.`id` = '$_POST[id]'");
    }

    $path = "img/profilePic/".$_SESSION["profile"]["username"]."_profilepic.jpg";
?>

    <div class="row">
    <div class="col-lg-3 d-flex justify-content-center">
    <img src='<?php echo $path; ?>' width="55%">
    </div>
        <div class="d-flex justify-content-start col-lg-9">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h3 class="card-title mt-0 mb-5">Profile</h3>
              <p class="card-text pb-5">Click on button to Update Profile</p>
              <a href="?page=profile&action=changePhoto" class="btn btn-primary">Update Profile</a>
            </div>
          </div>
        </div>
    </div>
    <form method="post" action="?page=profile&action=changePhoto&action=file">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" readonly value="<?php echo $_SESSION["profile"]["Address"] ?>" class="form-control-plaintext" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" readonly value="<?php echo $_SESSION["profile"]["City"] ?>" class="form-control-plaintext" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" readonly value="<?php echo $_SESSION["profile"]["State"] ?>" class="form-control-plaintext" placeholder="Enter State">
                </div>
                <div class="form-group">
                    <label>Contect No.</label>
                    <input type="number" readonly value="<?php echo $_SESSION["profile"]["ContectNo"] ?>" class="form-control-plaintext" placeholder="Enter Contect No.">
                </div>
    </form>
<!-- <a class="btn btn-primary" href="?page=profile&action=changePhoto">Upload Pic</a>
<a class="btn btn-primary" href="?page=Home">Home</a> -->
