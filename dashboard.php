<?php
    session_start();
    include "condb.php"; //เชื่อมฐานข้อมูล
    if(!isset($_SESSION["email"]))
    header("location:login.php");
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM behaviour_log where student_id = '$id'";
    
    $result = mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container shadow p-3 mb-5 bg-white rounded">
<nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex justify-content-between">
        <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a></li>
        </div>
                  
        </div>
    </nav>
        <div class="container">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>เลขที่</th>
                    <th>คำอธิบาย</th>
                    <th>ณ วันที่</th>
                    <th>คะแนน</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($result)){ //ทำการลูปเพื่อนำข้อมูลในตารางlogของนักเรียนออกมาแสดง โดยอ้างอิง ID ที่แสดงจาก url ที่ส่งมา
                    ?>    
                <tr>
                    <td><?=$row['log_id']?></td>
                    <td><?=$row['log_des']?></td>
                    <td><?=$row['log_date']?></td>
                    <td><?=$row['point']?></td>
                </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>