<?php
    include("../init.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $num = preg_match('/[0-9]/u', $password);
    $eng = preg_match('/[a-z]/u', $password);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$password);
 
    if(strlen($password) < 10 || strlen($password) > 30)
    {
        die("<script>alert('비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.');window.location.href='../';</script>");
    }
 
    if(preg_match("/\s/u", $password) == true)
    {
        die("<script>alert('비밀번호는 공백없이 입력해주세요.');window.location.href='../';</script>");
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        die("<script>alert('영문, 숫자, 특수문자를 혼합하여 입력해주세요.');window.location.href='../';</script>");
    }
    $sql = "insert into users (email, password) values (?, ?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    die("<script>alert('success');window.location.href='../';</script>");
