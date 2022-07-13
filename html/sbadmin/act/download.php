<?php
    include("../init.php");

    $type = bindSQL($_GET['t']);
    $idx = $_GET['i'];

    $sql = "select * from {$type} where idx=?";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("i", $idx);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);

    
    if(strpos($row['upPath'],'../uploads/')===0)
    {
        $temp = str_replace('../uploads/','',$row['upPath']);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename={$row['upName']}");
    }
    // {
        // if(strpos($temp,'..')===false && strpos($temp,'/')===false && strpos($temp,'\\')===false)
        // {
    //        echo file_get_contents($row['upPath']);
        // }
    // }