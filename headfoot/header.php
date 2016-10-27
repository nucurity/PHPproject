<?php
/**
 * Created by PhpStorm.
 * User: nucur
 * Date: 10/26/2016
 * Time: 12:17 PM
 */
?>
<script>
    function init() {
        window.addEventListener('scroll', function (e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 300,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header, "smaller");
            } else {
                if (classie.has(header, "smaller")) {
                    classie.remove(header, "smaller");
                }
            }
        });
    }
    window.onload = init();
</script>

<div id="wrapper">

    <header>
        <div class="container clearfix">
            <h1 id="logo">
                Pratik
            </h1>
        </div>
    </header><!-- /header -->





</div><!-- /#wrapper -->