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
  
<div class="container">
        <div class="alert alert-success p-3" role="alert"> <!-- แบบฟอร์มแสดงข้อมูลนักเรียน -->
            ข้อมูลความประพฤติ
        </div>
        <form method="POST" action="update_records.php">
        <label>รหัสประจำตัวนักศึกษา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$_SESSION["id"]?>" disabled readonly > <!-- แสดงไอดี -->
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$_SESSION["name"]?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>ระดับชั้น:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$_SESSION["vocation"]?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>ห้อง:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$_SESSION["room"]?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>สาขาวิชา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$_SESSION["major"]?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>คะแนนคงเหลือ:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$_SESSION["score"]?>/100"  disabled readonly  > <!-- แสดงชื่อ -->
        </form>

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