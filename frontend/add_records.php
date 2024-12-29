<?php
    include "../backend/condb.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM students_list WHERE student_id = '$id'";
    $sql2 = "SELECT * FROM behaviour_log WHERE student_id ='$id'";

    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($result);


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
        <div class="alert alert-success p-3" role="alert">
            ข้อมูลความประพฤติ
        </div>
        <form method="POST" action="../backend/update_records.php">
        <label>ไอดี:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" disabled readonly >
        <label>ชื่อ:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  disabled readonly  >
        </form>


             <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            เพิ่มข้อมูลความประพฤติ
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../backend/insert_records.php" method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="">ไอดี:</label>
                        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" placeholder="คำอธิบาย...." name="description" style="height: 300px"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">คะแนนที่หักลบ, เพิ่ม:</label>
                        <input type="number" class="form-control" name ="score" placeholder = "จำนวนคะแนน.....">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
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
                    while($row2 = mysqli_fetch_array($result2)){
                    ?>    
                <tr>
                    <td><?=$row2['log_id']?></td>
                    <td><?=$row2['log_des']?></td>
                    <td><?=$row2['log_date']?></td>
                    <td><?=$row2['point']?></td>
                    <td><a href="../backend/delete_records.php?id=<?=$row2['log_id']?>&point=<?=$row2['point']?>&sid=<?=$row['student_id']?>" class="btn btn-danger">ลบข้อมูล</a></td>
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