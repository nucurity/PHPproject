<?php
/**
 * Created by PhpStorm.
 * User: nucur
 * Date: 10/13/2016
 * Time: 1:06 PM
 */
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Request Information</title>
    <style>
        #body_wrap {margin: auto;width: 80%;padding: 20px;background-color: white;}
        body {background-color: bisque;}
        #error_block {background-color: lightgray;text-align: center;}
    </style>
</head>
<body>

<div id="body_wrap">
    <h1>Error</h1>
    <p><?php echo $error; ?></p>
    <p><a href="form.php">Try again?</a></p>
</div>
</body>
</html>

