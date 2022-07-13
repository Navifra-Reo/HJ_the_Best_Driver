<?php
    ini_set("display_errors", true);

    session_start();

    $db = mysqli_connect("localhost", "webadmin", "webadmin2022!");
    mysqli_select_db($db, "webadmin");

    function isLogin(){
        if (isset($_SESSION['uIdx'])) return true;
        return false;
    }

    function bindSQL($type){
        if(strcmp($type, "notice") == 0) { return "notice"; }
        elseif(strcmp($type, "freeboard") == 0) { return "freeboard"; }
        return "pds";
    }

    function bindPages($page){
        if(strcmp($page, "board.php") == 0) { return "board.php"; }
        if(strcmp($page, "login.php") == 0) { return "login.php"; }
        if(strcmp($page, "logout.php") == 0) { return "logout.php"; }
        if(strcmp($page, "read.php") == 0) { return "read.php"; }
        if(strcmp($page, "register.php") == 0) { return "register.php"; }
        if(strcmp($page, "write.php") == 0) { return "write.php"; }
        return "home.php";
    }