<?php
    include("../init.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "insert into users (email, password) values (?, ?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    die("<script>alert('success');window.location.href='../';</script>");
