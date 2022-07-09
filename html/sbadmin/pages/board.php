<?php
    $type = $_GET['t'];
?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$type?></h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>TITLE</th>
                                        <th>regDt</th>
                                        <th>hit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "select * from ? order by idx desc";
                                        $stmt = $db->prepare($sql)
                                        $stmt->bind_param("sss", $type);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        while($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <tr style="cursor:pointer;" onclick="window.location.href='?p=read.php&t=<?=$type?>&i=<?=$row['idx']?>';">
                                        <td><?=$row['idx']?></td>
                                        <td><?=$row['title']?></td>
                                        <td><?=$row['regDt']?></td>
                                        <td><?=$row['hit']?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($type!="notice" || $_SESSION['uIdx'] == 1): ?>
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='?p=write.php&t=<?=$type?>';">write</button>
                        </div>
                        <?php endif; ?>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <style>
                tbody td, thead th {text-align:center;}
            </style>
