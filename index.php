<?php
session_start();
include "condb.php";
if(!isset($_SESSION["email"]))
header("location:login.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> <!-- ดึง bootstrap มาใช้งาน -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- ดึง sweetlalert มาใช้งาน -->
</head>
<body>
    <div class="container"> 
        <h1 class="display-2">ระบบจัดการคะแนนพฤติกรรม</h1>
        <hr>
        <a href="add_student.php" class="btn btn-success">เพิ่มนักเรียน</a>
        <!-- ปุ่มเด้ง pop-up รายชื่อผู้จัดทำ -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        รายชื่อผู้จัดทำ
        </button>

        <!-- ตัว body ของ pop-up -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <div class="container d-flex">
            <div class="card m-2" style="width: 25rem;">
            <img src="img/418643656_1835159836943885_7502355402834492248_n.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">นายกตัญญู เรืองวงษ์</h5>
                <p class="card-text">รหัสนักศึกษา:66309010013<br>สาขาวิชา:เทคโนโลยีสารสนเทศ<br>สาขางาน:โปรแกรมคอมพิวเตอร์</p>
            </div>
            </div>

            <div class="card m-2 " style="width: 25rem;">
            <img src="img/f4296d32-f9fa-431d-a0bb-ab94548601d3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">นางสาวกังสดาล บุญสอน</h5>
                <p class="card-text">รหัสนักศึกษา:66309010022<br>สาขาวิชา:เทคโนโลยีสารสนเทศ<br>สาขางาน:โปรแกรมคอมพิวเตอร์</p>
            </div>
            </div>
            </div>
        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a> 
        <table class="table table-striped mt-3"> <!-- ตารางแสดงข้อมูล -->
            <tr>
                <th>รหัสประจำตัวนักศึกษา</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ระดับชั้น</th>
                <th>ห้อง</th>
                <th>สาขาวิชา</th>
                <th>คะแนน</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
<?php
    $sql = "SELECT * FROM students_list WHERE status = 0"; //ภาษา sql สั่งฐานข้อมูล
    $result = mysqli_query($conn,$sql); //สั่งใช้งาน sql
    while($row=mysqli_fetch_array($result)){ //ดึงข้อมูลจากฐานข้อมูลมาแสดงผล
    ?>
            <tr>
            <td><?=$row['student_id']?></td>    <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['name']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['vocation']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['room']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['major']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['student_point']?></td>
            <td><a href="add_records.php?id=<?=$row['student_id']?>" class="btn btn-primary">ข้อมูลความประพฤติ</a></td>   <!-- ลิงค์ไปที่หน้าเพิ่มข้อมูลความประพฤตินักเรียน อ้างอิงถึงข้อมูลนักเรียนที่ต้องการจะเพิ่ม ด้วย ID ที่ส่งผ่าน URL-->     
            <td><a href="edit_student.php?id=<?=$row['student_id']?>" class="btn btn-warning">แก้ไข</a></td>       <!-- ลิงค์ไปที่หน้าแก้ไขข้อมูลนักเรียน อ้างอิงถึงข้อมูลนักเรียนที่ต้องการจะแก้ไข ด้วย ID ที่ส่งผ่าน URL-->
            <td><button onclick="confirmDelete(<?=$row['student_id']?>)" class="btn btn-danger">ลบข้อมูล</button></td> <!-- สั่งใช้งาน script เมื่อมีการ click ที่ปุ่มๆนี้ให้แสดง pop-up ของ sweetalert เพื่อแสดงหน้าต่างสั่งลบข้อมูล-->

        </tr>
        <?php
        }
        ?>
        </table>

    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script> <!-- เด้ง pop-up เพื่อยืนยันว่าจะลบข้อมูลนี้หรือไม่ -->
<script>function confirmDelete(id) {
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "การลบข้อมูลนี้ไม่สามารถกู้คืนได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ลบข้อมูล',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => { // เมื่อเงื่อนไขสั่งลบเป็นจริงให้ทำการสั่งลบ
        if (result.isConfirmed) {
            window.location.href = `delete_student.php?id=${id}`;
        }
    });
}</script>
</html>    