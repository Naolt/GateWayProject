<?php
include '../../model/database.php';
// fetch the users profile
$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id='$id'";
echo $query;
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);

// for fetching date
$query = "SELECT
u.ID,
DATE_FORMAT(ul.lastEntry,'%d-%m-%Y %h:%i %p') as lastEntry,
DATE_FORMAT(ul.lastExit,'%d-%m-%Y %h:%i %p') as  lastExit
FROM user u
INNER JOIN user_log ul
ON u.ID = ul.ID
WHERE u.ID = '$id'
";
$firstRow;
$result = mysqli_query($connection,$query);
    while($val = mysqli_fetch_assoc($result)){
        if(!($val['lastEntry'] && $val['lastExit'])){
            $firstRow = array('lastEntry'=>$val['lastEntry'],'lastExit'=>$val['lastExit']);
        }else{
            $firstRow = $val;
        }
        

        break;
        
    };

// for fetching devices
// $query="SELECT 
// ud.ID,
// d.deviceName,
// ud.serialNumber,
// DATE_FORMAT(ud.lastEntry,'%Y-%m-%d %h:%i %p') as lastEntry,
// DATE_FORMAT(ud.lastExit,'%Y-%m-%d %h:%i %p') as lastExit
// FROM user_log ud
// INNER JOIN device d
// ON ud.serialNumber = d.serialNumber
// WHERE ID = '$id'
// ";
// $result = mysqli_query($connection,$query);




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin-student.css">
        <link rel="stylesheet" href="../css/view-profile.css">
        <link rel="stylesheet" href="../css/student-search.css">
        <script defer src="../js/admin-script.js"></script>
        <script defer src="../js/script.js"></script>

        <title>Accounts</title>
    </head>

    <body>

        <div class="sidebar">
            <div class="nav-logo">
                <img src="../images/aastu.png" alt="aastu logo">
                <span id="system-name">AASTU GMS</span>
            </div>
            <div class="user-profile">
                <img src="../images/profile.png" alt="aastu logo" width="50px" height="50px">
                <span>John Doe</span>
            </div>

            <ul class="sidebar-nav">
                <li class="side-links"><img src="../images/search-white.png" alt="search icon">
                    <a href="." class="sidenav-link">Search</a>
                </li>

                <li class="side-links"><img src="../images/student-white.png" alt="search icon">
                    <a href="." class="sidenav-link">Student</a>
                </li>

                <li class="side-links"><img src="../images/teacher-white.png" alt="search icon">
                    <a href="." class="sidenav-link">Staff</a>
                </li>

                <li class="side-links"><img src="../images/securityWhite.png" alt="search icon">
                    <a href="admin-security.html" class="sidenav-link">Gate Managers</a>
                </li>


                <li><img src="../images/account.png" alt="search icon" width="50px" height="50px">
                    <a href="." class="sidenav-link">Manage Account</a>
                </li>

                <li class="side-links"><img src="../images/report-white.png" alt="search icon">
                    <a href="." class="sidenav-link">Daily Report</a>
                </li>

                <li><img src="../images/logout-white.png" alt="search icon" width="50px" height="50px">
                    <a href="." class="sidenav-link">Log Out</a>
                </li>

            </ul>
        </div>
        <main class="header_body">

            <div class="header">
                <img src="../images/profile.png" alt="avatar">
                <span>Admin</span>
            </div>

            <div class="content-body ">
                <div class="burger-menu-container">

                    <img src="../images/burger-menu-white.png" alt="burger menu" id="burgerMenu">
                </div>
                <div class="view-profile-header">
                    <h2>Viewing <?php echo $row['firstName'].' '.$row['lastName'].'\'s ' ?>Profile</h2>
                    <div class="small-nav">
                        <a href=".">Home</a> > <a href="../../view/pages/admin-student.php">Student</a> > <a href="#"><?php echo $row['firstName'].' '.$row['lastName'].'' ?></a>
                    </div>
                </div>
                <div class="edit-profile-btn-container">
                    <button>Edit Profile</button>
                </div>

                <div class="view-profile-user-profile">
                    <div class="user-img">
                        <img src="../images/avatar1.jpg" alt="User">
                    </div>

                    <ul class="other-info">
                        <li class="user-name"><span>Full Name</span> <?php echo $row['firstName'].' '.$row['lastName'] ?></li>
                        <li class="user-id"><span>Id</span> <?php echo $row['ID'] ?></li>
                        <li class="user-gender"><span>Gender</span> <?php echo $row['gender']?></li>
                        <li class="user-edu-level"><span>Educational Level</span> <?php echo $row['level']?></li>
                        <li class="user-last-entry"><span>Last Entry</span> <?php if($firstRow['lastEntry']){ echo $firstRow['lastEntry'];}
                        else{
                        echo "kdjkjdf";} ?></li>
                        <li class="user-last-exit"><span>Last Exit</span> <?php echo $firstRow['lastExit'] ?></li>


                    </ul>

                </div>

                <div class="device_container">
                    <!-- title of the info section -->
                    <h2>Registered Devices </h2>

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
                            while($device = mysqli_fetch_assoc($result)){
                                
                    ?>
                    
                    
                    
                        <form action="">
                            <ul class="device_list">
                                <li class="device_id"><span><?php echo $count ?></span></li>
                                <li class="device_name"><span><?php echo $device['deviceName'] ?></span></li>
                                <li class="device_serial"><span><?php echo $device['serialNumber'] ?></span></li>
                                <li class="device_entry"><span><?php echo $device['lastEntry'] ?></span></li>
                                <li class="device_exit"><span><?php echo $device['lastExit'] ?></span></li>
                                <li class="action"> <input type="submit" name='submit' value="Edit"> </li>

                            </ul>
                        </form>

                        <?php
                        $count = $count + 1;
                        }
                        ?>

                    </div>

                </div>



            </div>
        </main>



    </body>

    </html>