<?php
    include("../init.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email=? where userld = ?'";
    $stmt = $db->prepare($sql)
    $stmt->bind_param("sss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = mysqli_fetch_assoc($result);

    if (isset($row['idx'])){
        $_SESSION['uIdx'] = $row['idx'];
        $_SESSION['email'] = $row['email'];
        die("<script>window.location.href='../';</script>");
    } else {
        die("<script>alert('login failed');history.back(-1);</script>");
    }
  