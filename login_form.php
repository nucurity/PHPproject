<?php
/**
 * Created by PhpStorm.
 * User: anvainman
 * Date: 2016-10-25
 * Time: 17:05
 */
?>



<div class="container">
    <h2>Sign in to your Personal Finance Manager Account </h2>
    <form>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default" onclick="location.href = 'form.php';">registration</button>
    </form>
</div>

