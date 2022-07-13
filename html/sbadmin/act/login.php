<?php
    include("../init.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email = ? and password = ?";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = mysqli_fetch_assoc($result);

    if (isset($row['idx'])){
        $_SESSION['uIdx'] = $row['idx'];
        $_SESSION['email'] = $row['email'];
        die("<script>window.location.href='../';</script>");
    } else {
        $_SESSION['hit'] += 1; // Only Increase on Failed Attempts
        $delays = array(1=>0, 2=>2, 3=>4, 4=>8, 5=>16); // Array of # of Attempts => Secs
        sleep($delays[$_SESSION['hit']]); // Sleep for that Duration.
        die("<script>alert('login failed');history.back(-1);</script>");
    }
  