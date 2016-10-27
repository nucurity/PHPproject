<?php
/**
 * Created by PhpStorm.
 * User: anvainman
 * Date: 2016-10-25
 * Time: 16:37
 */
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="main">
    <div class="container">

        <h2>Create an account </h2>
        <form method="post" action="addUser.php">
            <div class="form-group">
                <span id="error">
                    <?php if(isset($_SESSION['err_general'])){ echo $_SESSION['err_general']; }?>
                </span>
            </div>
            <div class="form-group">
                <label for="fname">First name:</label><span id="error"><?php if(isset($_SESSION['err_firstName'])){ echo $_SESSION['err_firstName']; }?></span>
                <input type="text" class="form-control" id="fname" name="firstName" placeholder="Enter your first name" value="<?php if(isset($_SESSION['firstName'])){ echo $_SESSION['firstName']; }?>">
            </div>
            <div class="form-group">
                <label for="lname">Last name:</label><span id="error"><?php if(isset($_SESSION['err_lastName'])){ echo $_SESSION['err_lastName']; }?></span>
                <input type="text" class="form-control" id="lname" name="lastName" placeholder="Enter your last name" value="<?php if(isset($_SESSION['lastName'])){ echo $_SESSION['lastName']; }?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label><span id="error"><?php if(isset($_SESSION['err_email'])){ echo $_SESSION['err_email']; }?></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label><span id="error"><?php if(isset($_SESSION['err_phone'])){ echo $_SESSION['err_phone']; }?></span>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone '123-123-1212'" value="<?php if(isset($_SESSION['phone'])){ echo $_SESSION['phone']; }?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label><span id="error"><?php if(isset($_SESSION['err_password'])){ echo $_SESSION['err_password']; }?></span>
                <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" >
            </div>
            <div class="form-group">
                <label for="pwdConf">Confirm password:</label><span id="error"><?php if(isset($_SESSION['err_passwordConfirm'])){ echo $_SESSION['err_passwordConfirm']; }?></span>
                <input type="password" class="form-control" id="pwdConf" name="passwordConfirm"
                       placeholder="Confirm password" >
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <?php
    session_destroy();
    ?>
</div>
</body>
</html>

