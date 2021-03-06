
<?php
include '../GateWayProject/controller/session.php';
include '../GateWayProject/model/database.php';

if(isset($_SESSION['ID'])){
    header('Location: ../GateWayProject/view/pages/admin-search.php');
}else{



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/signin.css">
    <script defer src="view/js/signin.js"></script>
    <title>Sign in</title>
</head>

<body>
    <div class="form-container">
        <form class="signin-box" id="signin-box">
            <h2 class="signinAs">Sign In As</h2>
            <div class="login-type">

                <select name="login-type" id="login-type">
                    <option value="employee">Default</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="input-section">
                <label for="username">
                   <span> Username</span>
                    <div class="input-field">
                 
            <input type="text" name="username" required></div>
			</label>
                <label for="password">
                   <span> Password </span>
                    <div class="input-field">
				
            <input type="password" name="password" required>
			<div class="show-password">
				<img src="../images/eye.png" alt="eye" id="eye">
				<img src="../images/hide.png" alt="hide" id="hide">
			</div>
            </div>
            
			</label>

            </div>
            <div class="forgot-pass">
                <span onclick="openBox('forgot-pass-box','signin-box')">Forgot Password</span>
            </div>

            <div class="error_box" id="signin_error_box">

            </div>
            <input type="submit" name='signin' value="Login" class="btn signin-btn">
        </form>
        <form action="controller/password-recovery.php" method="post" class="signin-box forgot-pass" id="forgot-pass-box">
            <span>Password Recovery</span>
            <input type="email" placeholder="   Email" name="email" required>
            <div class="error_box" id="signin_recover_error">

</div>
            <input type="submit" name="submit" value="Next" class="btn btn_save">
            <input type="button" name="cancelRecover" value="Cancel" class="btn btn_cancel" onclick="openBox('signin-box','forgot-pass-box')">
        </form>
    </div>

</body>

</html>

<?php 
}
?>