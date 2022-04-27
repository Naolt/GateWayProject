<?php
include '../../model/database.php';


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin-student.css">
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

                <div class="accounts_section">
                    <div class="accounts_list_header">
                        <div class="accounts-info">
                            <h3>Students List</h3>
                            <p>View and manage registered students here.</p>
                        </div>
                        <div class="account-actions">
                            <button class="add-account" id='create-account-btn'>Add Student</button>
                        </div>
                        <div class="create-account-container ">
                            <div class="create-account ">

                                <h2>Fill student profile
                                    <img src="../images/cancel.png " id='close-btn' "></img>
                            </h2>

                            <div class="label-input ">

                                <label for="firstName ">First Name</label>
                                <input type="text " name="firstName " required>
                            </div>
                            <div class="label-input ">

                                <label for="lastname "> Last Name</label>
                                <input type="text " name="lastname " required>

                            </div>

                            <div class="label-input ">

                                <label for="id ">Id</label>
                                <input type="text " name="id " required>

                            </div>

                            <div class="label-input ">

                                <label for="gender ">Gender</label>
                                <select name="gender " id="std-gender " required>
									<option value="male ">Male</option>
									<option value="female ">Female</option>
								</select>

                            </div>
                            <div class="label-input ">

                                <label for="level ">Education Level</label>
                                <select name="level " id="level ">
									<option value="degree ">Degree</option>
									<option value="masters ">Masters</option>
									<option value="phd ">Phd</option>
									<option value="0 ">None of the above</option>
								</select>

                            </div>
							<div class="label-input ">

                                <label for="level ">Image Url</label>
                               <input type="file " name="imgUrl " >

                            </div>


                            <button type="submit ">Create</button>
                        </div>
                    </div>
                </div>
                <div class="accounts-list ">
                    <div class="searchbar ">
                       <select name="searchby " id='searchby'>
                           <option value='ID'>Id</option>
                           <option value='firstName' selected>Name</option>
                       </select>  
                       <input type="search " name="search_std " id="search_std " placeholder="search " onkeyup="getStd(this.value) " >
                    </div>
                    <ul class="list-header ">
                        <li></li>
                        <li>Name</li>
                        <li>ID</li>
                        <li>Gender</li>
                        <li>Education Level</li>
                        <li></li>
                    </ul>
                    <div class="list-content-container " >
                                    <?php 
$query = "SELECT * FROM user ";
$result = mysqli_query($connection,$query);
if($result){
    while($row1 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        
        ?>
                                    <ul class="list-content ">
                                        <li><img src="../images/profile.png " alt="profile "></li>
                                        <li class="user-name ">
                                            <?php  echo $row1['firstName']." ".$row1['lastName']  ?>
                                        </li>
                                        <li class="user-id ">
                                            <?php  echo $row1['ID'];  ?>
                                        </li>
                                        <li class="user-gender ">
                                            <?php  echo $row1['gender'];  ?>
                                        </li>
                                        <li class="user-level ">
                                            <?php  echo $row1['level'];  ?>
                                        </li>
                                        <li class="actions ">
                                            <img src="../images/sidemore.png " alt="menu " id="three-dots-<?php echo $row1[ 'ID'] ?> " onmouseover="openmenu(this.id) ">
                                    <form method="post " action="../../controller/view-profile.php " class="menu-choice " id="form-<?php echo $row1[ 'ID'] ?>" onmouseleave="closemenu(this.id) ">
                                        <div class="choice1 " onclick="setAction( 'view','form-<?php echo $row1[ 'ID'] ?>') ">View profile</div>
                                        <div class="choice2 " onclick="setAction( 'edit','form-<?php echo $row1[ 'ID'] ?>') ">Edit profile</div>
                                        <select name="click-action " id='select-<?php echo $row1[ ' ID '] ?>' style="display: none; ">
                                    <option value='view'></option>
                                    <option value='edit'></option>
                                </select>
                                        <input type="submit" name="action-submit" id="<?php echo $row1[ 'ID'] ?>btn">
                                    </form>

                                    </li>
                                    </ul>

                                    <?php 
        }
    }
    
    
    ?>
                            </div>
                            <!-- search area -->



                            <!-- 
                        <ul class="list-content ">
                            <li><img src="../images/profile.png " alt="profile "></li>
                            <li class="user-name ">Martha Mekow</li>
                            <li class="user-id ">ETS 0923/33</li>
                            <li class="user-gate ">Female</li>
                            <li class="user-last-login ">Masters</li>
                            <li class="actions " >
								<img src="../images/sidemore.png " alt="menu " id="three-dots-menu2 " onmouseover="openmenu(this.id) " >
								<div class="menu-choice " id="menu-choice2 "  onmouseleave="closemenu(this.id) ">
									<div class="choice1 ">View profile</div>
									<div class="choice2 ">Edit profile</div>
								   </div>
							</li>
                        </ul> -->

                        </div>

                    </div>

        </main>



    </body>

    </html>