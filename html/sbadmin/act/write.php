<?php
    include("../init.php");

    $uIdx = $_SESSION['uIdx'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $upPath = "";
    $upName = "";
    $type = bindSQL($_POST['type']);

    if (isset($_FILES['upload']) && !empty($_FILES['upload']['name'])){
        $upName = $_FILES['upload']['name'];
        $ext = explode($upName);
        if(preg_match("/.jpg|.png|.bmp|.gif/i", $ext))
        {
            $upPath = "../uploads/".$_FILES['upload']['name'];
            move_uploaded_file($_FILES['upload']['tmp_name'], $upPath);
        }
        else
        {
            die("<script>alert('사진 파일만 업로드할 수 있습니다.');history.back(-1);</script>");
        }
    }

    $sql = "insert into {$type} (uIdx, title, contents, upPath, upName) values (?, ?, ?, ?, ?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("issss", $uIdx, $title, $contents, $upPath, $upName);
    $stmt->execute();
    $result = $stmt->get_result();

    die("<script>alert('업로드 완료');window.location.href='../';</script>");
