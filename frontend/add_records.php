<?php
    include "../backend/condb.php"; //เชื่อมฐานข้อมูล
    $id = $_GET['id']; //ดึงไอดีของข้อมูลที่ต้องการจะแก้ที่ส่งกับURLมาเก็บไว้ในตัวแปร
    $sql = "SELECT * FROM students_list WHERE student_id = '$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล
    $sql2 = "SELECT * FROM behaviour_log WHERE student_id ='$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล

    $result = mysqli_query($conn,$sql); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $result2 = mysqli_query($conn,$sql2); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $row = mysqli_fetch_array($result); //นำคำสั่งที่จะกระทำกับฐานข้อมูลมาแปลงให้้เป็นแถว


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
        <form method="POST" action="../backend/update_records.php">
        <label>รหัสประจำตัวนักศึกษา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" disabled readonly > <!-- แสดงไอดี -->
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>ระดับชั้น:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['vocation']?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>ห้อง:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['room']?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>สาขาวิชา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['major']?>"  disabled readonly  > <!-- แสดงชื่อ -->
        </form>


             <!-- pop-up สำหรับการเพิ่มข้อมูลพฤติกรรม -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            เพิ่มข้อมูลความประพฤติ
            </button>

             <!-- ตัว body ของ pop-up สำหรับการเพิ่มข้อมูลพฤติกรรม -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../backend/insert_records.php" method="POST"> <!-- แบบฟอร์มสำหรับกรอกข้อมูลที่ต้องการจะเพิ่มไปที่ฐานข้อมูล-->
                <div class="modal-body">
                    <div class="form-group mb-3 ">
                        <label for="">รหัสประจำตัวนักศึกษา:</label>
                        <input class="form-control form-control-lg mb-3  w-20" type="text" name="id" value="<?=$row['student_id']?>" readonly> <!-- ดึงข้อมูล ID สำหรับการอ้างอิงถึงนักเรียนที่ต้องการจะเพิ่มข้อมูล -->
                    </div>
                    <div class="form-group mb-3">
                        <label for="">ระบุคำอธิบายเพิ่มเติม:</label>
                        <textarea class="form-control" placeholder="คำอธิบาย...." name="description" style="height: 300px" required></textarea> <!-- กรอกรายละเอียดของข้อมูล -->
                    </div>

                    <div class="form-group mb-3">
                        <label for="">คะแนนที่หักลบ, เพิ่ม:</label>
                        <input type="number" class="form-control" name ="score" placeholder = "จำนวนคะแนน....." required> <!-- จำนวนคะแนนที่ต้องการจะลบ -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button> <!-- ปุ่มบันทึกข้อมูล --> 
                </div>
                </div>
                </form>
            </div>
            </div>
            <a href="index.php" class="btn btn-secondary">กลับ</a>
        <div class="container">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>เลขที่</th>
                    <th>คำอธิบาย</th>
                    <th>ณ วันที่</th>
                    <th>คะแนน</th>
                    <th>ลบข้อมูล</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row2 = mysqli_fetch_array($result2)){ //ทำการลูปเพื่อนำข้อมูลในตารางlogของนักเรียนออกมาแสดง โดยอ้างอิง ID ที่แสดงจาก url ที่ส่งมา
                    ?>    
                <tr>
                    <td><?=$row2['log_id']?></td>
                    <td><?=$row2['log_des']?></td>
                    <td><?=$row2['log_date']?></td>
                    <td><?=$row2['point']?></td>
                    <td><a href="../backend/delete_records.php?id=<?=$row2['log_id']?>&point=<?=$row2['point']?>&sid=<?=$row['student_id']?>" class="btn btn-danger">ลบข้อมูล</a></td> <!-- ส่งคะแนนที่จะลบ,เพิ่ม ID นักเรียนผ่าน url ไปที่ backend -->
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