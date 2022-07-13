<?php
    include("../init.php");

    $type = $_GET['t'];
    $idx = $_GET['i'];

    $result = mysqli_query($db, "select * from {$type} where idx={$idx}");
    $row = mysqli_fetch_assoc($result);

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename={$row['upName']}");

    if(strpos($row['upPath'],'../uploads/')==0)
    {
        $temp = preg_replace('../uploads/','',$row['upPath'])
        if(strpos($temp,'..')==false && strpos($temp,'/')==false && strpos($temp,'\\')==false)
        {
            echo file_get_contents($row['upPath']);
        }
    }