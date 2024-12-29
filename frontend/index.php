<?php
    include "../backend/condb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h1 class="display-2">behaviour records</h1>
        <hr>
        <a href="add_student.php" class="btn btn-success">เพิ่มนักเรียน</a>
        <table class="table table-striped mt-3">
            <tr>
                <th>ไอดี</th>
                <th>ชื่อ-นามสกุล</th>
                <th>แผนกวิชา</th>
                <th>คะแนน</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
<?php
    $sql = "SELECT * FROM students_list";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
    ?>
            <tr>
            <td><?=$row['student_id']?></td>    
            <td><?=$row['name']?></td>    
            <td><?=$row['major']?></td>
            <td><?=$row['student_point']?></td>
            <td><a href="add_records.php?id=<?=$row['student_id']?>" class="btn btn-primary">ข้อมูลความประพฤติ</a></td>        
            <td><a href="edit_student.php?id=<?=$row['student_id']?>" class="btn btn-warning">แก้ไข</a></td>    
            <td><button onclick="confirmDelete(<?=$row['student_id']?>)" class="btn btn-danger">ลบข้อมูล</button></td>

        </tr>
        <?php
        }
        ?>
        </table>

    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
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
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../backend/delete_student.php?id=${id}`;
        }
    });
}</script>
</html>    