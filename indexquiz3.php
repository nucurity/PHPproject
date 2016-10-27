<?php
require_once('database.php');
include('DBoperations.php');
$select = new DBoperations();
$products = $select::select('insproducts');

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
    <h1>Request for Information Form</h1>
    <b>To receive information on our products and services by email, please complete the form below.</b>
    <form method="post" action="add_sub.php">
        <table>
            <tr>
                <td>First name</td>
                <td><input type="text" name="firstname" value="asd"/></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="lastname" value="asd"/></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postalcode" value="J1A 1A2"/></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="text" name="phone" value="123-1231212"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="asd@ad.ca"/></td>
            </tr>
            <tr>
                <td>Please send me<br> information on the <br> following product </td>
                <td>
                    <?php foreach ($products as $product) : ?>
                        <input type="radio" name="insrancetype" value="<?php echo $product['product'] ?>" /> <?php echo $product['product'] ?> <br />
                    <?php endforeach; ?>

                </td>
            </tr>
            <tr>
                <td><input type="submit" name="btnsubmit" value="Submit" /></td>
            </tr>
        </table>

</div>
</body>
</html>
