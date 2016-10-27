<?php
/**
 * Created by PhpStorm.
 * User: nucur
 * Date: 10/25/2016
 * Time: 6:16 PM
 */

session_start();
$firstName = null;
$lastName = null;
$email = null;
$phone = null;
$password = null;
$passwordConfirm = null;


include('validation.php');
include('database/dboperations.php');
$valid = new Validation();
$userAdd = new Dboperations();
$flag = false;
$flagp = false;


if (isset($_POST['firstName']) && !empty($_POST["firstName"])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    if ($valid->letterSp($firstName)) {
        $_SESSION['err_firstName'] = "* Enter Text Only";
        $flag = true;
    } else {
        $_SESSION['firstName'] = $firstName;
    }
} else {
    $_SESSION['err_firstName'] = "* Enter Your First Name";
    $flag = true;
}

if (isset($_POST['lastName']) && !empty($_POST["lastName"])) {
    $lastName = htmlspecialchars($_POST['lastName']);
    if ($valid->letterSp($lastName)) {
        $_SESSION['err_lastName'] = "* Enter Text Only";
        $flag = true;
    } else {
        $_SESSION['lastName'] = $lastName;
    }
} else {
    $_SESSION['err_lastName'] = "* Enter Your Last Name";
    $flag = true;
}

if (isset($_POST['email']) && !empty($_POST["email"])) {
    $email = htmlspecialchars($_POST['email']);
    if ($valid->email($email)) {
        $_SESSION['err_email'] = "* Email should be simple@name.com";
        $flag = true;
    } else {
        $_SESSION['email'] = $email;
    }
} else {
    $_SESSION['err_email'] = "* Enter email";
    $flag = true;
}

if (isset($_POST['phone']) && !empty($_POST["phone"])) {
    $phone = htmlspecialchars($_POST['phone']);
    if ($valid->phone($phone)) {
        $_SESSION['err_phone'] = "* Phone no should be 123-123-1212";
        $flag = true;
    } else {
        $_SESSION['phone'] = $phone;
    }
} else {
    $_SESSION['err_phone'] = "* Enter Phone No";
    $flag = true;
}

if (isset($_POST['password']) && !empty($_POST["password"])) {
    $password = htmlspecialchars($_POST['password']);
    if (!$valid->length($password, 6, 20)) {
        $_SESSION['err_password'] = "* Password should be not less then 6 symbols";
        $flag = true;
        $flagp = true;
    }
} else {
    $_SESSION['err_password'] = "* Enter password";
    $flag = true;
    $flagp = true;
}

if (isset($_POST['passwordConfirm']) && !empty($_POST["passwordConfirm"])) {
    $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
    if (!$valid->length($passwordConfirm, 6, 20)) {
        $_SESSION['err_passwordConfirm'] = "* Password should be not less then 6 symbols";
        $flag = true;
        $flagp = true;
    }
} else {
    $_SESSION['err_passwordConfirm'] = "* Enter password";
    $flag = true;
    $flagp = true;
}

if (!$flagp) {
    {
        if ($passwordConfirm != $password) {
            $_SESSION['err_general'] = "* Passwords should be the same";
            $flag = true;
        }
    }
}

if ($userAdd::CheckSameUser($email)) {
    $_SESSION['err_general'] = "* User with same email already exists";
    $flag = true;
}


if ($flag) {
    header("location: registration_form.php");
    die;
} else {
    $userAdd::SetNewUser($email, $firstName, $lastName, $phone, $password);
    include('index.php');
}




