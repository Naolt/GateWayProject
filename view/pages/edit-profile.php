<?php
include '../../controller/session.php';
include '../../model/database.php';
if(($_SESSION['ID']) && $_SESSION['admin']){
$id = $_GET['id'];
echo $id;

// for fetching devices
$query="SELECT 
udl.ID,
d.deviceName,
udl.serialNumber,
DATE_FORMAT(MAX(udl.entryDate),'%Y-%m-%d %h:%i %p') as lastEntry,
DATE_FORMAT(MAX(udl.exitDate),'%Y-%m-%d %h:%i %p') as lastExit
FROM user_device_log udl
INNER JOIN device d
ON udl.serialNumber = d.serialNumber
WHERE udl.ID = '$id'
GROUP BY serialNumber
";

$device_result = mysqli_query($connection,$query);
$query = "SELECT 
u.ID,
u.firstName,
u.lastName,
u.gender,
u.user_level,
u.user_type,
u.imgUrl
FROM user u
WHERE u.ID ='$id'
";
 $result = mysqli_query($connection,$query);

 $numofrow = mysqli_num_rows($result);
 $row1;
 if($numofrow > 0){
     while($row = mysqli_fetch_assoc($result)){
        $row1 = $row;
        break;
     }
 }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin-student.css">
        <link rel="stylesheet" href="../css/edit-profile.css">
        <link rel="stylesheet" href="../css/student-search.css">
        <!-- <link rel="stylesheet" href="../css/view-profile.css"> -->
        <script defer src="../js/edit-profile.js"></script>
        <script defer src="../js/script.js"></script>
        <script defer src="../js/admin-script.js"></script>
        <script defer src="../js/device.js"></script>


        <title>Accounts</title>
    </head>

    <body>

    <?php
include_once('../include/sidebar.php');

?>

            <div class="content-body ">
                <div class="burger-menu-container">

                    <img src="../images/burger-menu-white.png" alt="burger menu" id="burgerMenu">
                </div>
                <div class="edit-profile-header">
                    <h2>Edit Profile</h2>
                    <div class="small-nav">
                        <a href="../../view/pages/admin-student.php">Student</a> > <a>Edit profile</a>
                    </div>
                </div>

                <form class="edit-profile-user-profile" id="edit-profile-user-profile" enctype="multipart/form-data">
                    <div class="user-img">
                        <img src="../../view/images/upload/<?php echo $row1['imgUrl']?>" alt="User">
                        <div class="user-img-btn-box">

                            <input type="file" name="user-img" id="user-img-hidden" class="hidden1">
                            <button class="change-profile" id="changeProfileBtn" onclick="btnclick('user-img-hidden')">Change</button>
                        </div>
                    </div>

                    <ul class="other-info">
                        <li class="label-input">
                            <label for="firstName">First Name</label>
                            <input required type="text" name="firstName" value="<?php echo $row1['firstName'] ?>">
                        </li>
                        <li class="label-input">
                            <label for="lastName">Last Name</label>
                            <input required type="text" name="lastName" value="<?php echo $row1['lastName'] ?>">
                        </li>
                        <li class="label-input">
                            <label for="id">Id</label>
                            <input required type="text" name="id" value="<?php echo $row1['ID'] ?>" readonly>
                        </li>
                        <li class="label-input">
                            <label for="gender">Gender</label>
                            <select name="gender" id="edit-gender">
                            <option value="male" <?php if($row1['gender']=='male') echo 'selected'?> >Male</option>
                            <option value="female" <?php if($row1['gender']=='female') echo 'selected'?> >Female</option>
                        </select>
                        </li>
                        <li class="label-input">
                            <label for="level">Education Level</label>
                            <select name="level" id="edit-level">
                            <option value="degree" <?php if($row1['user_level']=='degree') echo 'selected'?> >Degree</option>
                            <option value="masters" <?php if($row1['user_level']=='masters') echo 'selected'?> >Masters</option>
                            <option value="phd" <?php if($row1['user_level']=='phd') echo 'selected'?> >Phd</option>
                            <option value="other" <?php if($row1['user_level']=='other') echo 'selected'?> >Other</option>
                        </select>
                        </li>
                        <li class="label-input">
                            <label for="type">Type</label>
                            <select name="type" id="edit-type">
                            <option value="student" <?php if($row1['user_type']=='student') echo 'selected'?> >Student</option>
                            <option value="staff" <?php if($row1['user_type']=='staff') echo 'selected'?> >Staff</option>
                            <option value="security" <?php if($row1['user_type']=='security') echo 'selected'?> >Security</option>
                            <option value="other" <?php if($row1['user_type']=='other') echo 'selected'?> >Other</option>
                        </select>
                        </li>

                        

                    </ul>
                    <div class="error_box" id="edit_user_error">

                    </div>
                    <div class="btn-box">
                            <input type="submit" name="submit" class="edit-btn_save" value="Save">
                        </div>
</form>

<div class="device_container">
                <!-- title of the info section -->
                <h2>Registered Devices </h2>
                    <!-- <button class='btn-add-device' id='open-btn'>Add</button> </h2> -->

                <ul class="device_header">
                    <li class="device_id"><span> ID</span></li>
                    <li class="device_name"><span>Device Name</span></li>
                    <li class="device_serial"><span>Serial Number</span></li>
                    <li class="device_entry"><span>Last Entry </span></li>
                    <li class="device_exit"><span>Last Exit </span></li>
                    <li class="action"><span>Action </span></li>
                </ul>

                <!-- Devices registered for the user -->
                <div class="device_list_container">
                    <?php    
                            $count = 1;
                            
                             while($device = mysqli_fetch_assoc($device_result)){

                                
                    ?>



                    <div >
                        <ul class="device_list">
                            <li class="device_id"><span><?php echo $count ?></span></li>
                            <li class="device_name"><span><?php echo $device['deviceName'] ?></span></li>
                            <li class="device_serial"><span><?php echo $device['serialNumber'] ?></span></li>
                            <li class="device_entry"><span><?php echo $device['lastEntry'] ?></span></li>
                            <li class="device_exit"><span><?php echo $device['lastExit'] ?></span></li>
                            <li class="action"> <input type="submit" name='edit' value="Edit" onclick="editDevice(`<?php echo $device['deviceName']?>`,`<?php echo $device['serialNumber']?>`)">
                            <?php if($_SESSION['admin']){?>
                            <input type="submit" name="delete" value="Delete" onclick="deleteDevice(`<?php echo $device['serialNumber']?>`,`<?php echo $row['ID']?>`)">
                            <?php }?>

                            </li>

                        </ul>
                             </div>

                    <?php
                        $count = $count + 1;
                        }
                        ?>

                </div>

            </div>


            </div>
            <div class=" box-container add-device-container" id="edit_device_container">
                <form class="add-device-box" id="edit-device-box">
                    <span class='add-device-heading'>Edit Device</span>
                    <input type="text" class="hidden" name="id" value="<?php echo $row['ID']?>">
                    <input type="text" class="hidden" name="orginalSerial" id="orginalSerial" >
                    <div class="input-label">
                        <label for="deviceName">Device Name</label>
                        <input type="text" name="deviceName" placeholder="Device Name" id="toedit_device_name">
                    </div>

                    <div class="input-label">
                        <label for="deviceSerial">Serial Number</label>
                        <input type="text" name="deviceSerial" placeholder="Serial Number" id="toedit_serial">
                    </div>
                    <div class="error_box" id="edit_device_error">

                    </div>
                    <div class="btn-box">
                        <input type="submit" name="update" id="edit_device_btn" class="btn btn_save" value="Update">
                        <button class="btn btn_cancel" id="cancel_edit_btn">Cancel</button>
                    </div>
                    
                </form>
            </div>
            <div class="delete-account-container" id="delete-account-container">
                <form id="personal-delete-device" class="personal-delete-account">
                    <h4 class='personal_setting_header delete'>
                        Delete Device
                    </h4>
                    <div class="change-password-box">

                        <div class="delete-warning-box">
                            <p>Make sure you want to do this.</p>
                        </div>
                        <input type="text" id="to-be-delete-id" name="stdID" required class="hidden">
                        <input type="text" value="" id='to-be-delete-serial' name="serialNumber" required class="hidden">
                        <div class="input-label">
                            <label for="delete-admin-password">
                                    
                                </label>
                            <input type="password" name="delete-admin-password" id="delete-admin-password" placeholder="Adminstrator Password">
                        </div>

                        <div class="error-section" id="delete-device-error">

                        </div>
                        <div class="change-btn-box">
                            <button class="btn btn_white" id="deleteDeviceCancel">Cancel</button>
                            <input type="submit" name="deleteDevice" id="deleteDevice" value="Delete Device" class="btn btn_cancel">
                        </div>



                    </div>



                </form>


            </div>
        </main>



    </body>

    </html>
    <?php 
    }
    else{
        header("Location: ../../index.php ");
    }
?>