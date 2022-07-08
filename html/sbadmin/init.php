<?php
    ini_set("display_errors", true);

    session_start();

    $db = mysqli_connect("localhost", "webadmin", "webadmin2022!");
    mysqli_select_db($db, "webadmin");

    function isLogin(){
        if (isset($_SESSION['uIdx'])) return true;
        return false;
    }
