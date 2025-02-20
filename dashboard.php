<!-- หน้าสำหรับ user ทั่วไป  -->
<?php
/* ตรวจสอบว่า user ได้ล็อคอินมาจริงๆไหม ถ้าไม่ให้ไปที่หน้า login */
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
<div>
<div class="container shadow p-3 mt-5 bg-white rounded">
<nav class="navbar p-3" style="background: #831a1a">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand text-white" href="#" >
                ระบบตัดคะแนนพฤติกรรม
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  สวัสดี <?php echo $_SESSION['name'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                </ul>
              </div>
        </div>
        
    </nav>
    <div class="container">
    <div class="row">
    <div class="col">
        <label>รหัสประจำตัวนักศึกษา:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="id" value="<?=$_SESSION["id"]?>" disabled readonly > <!-- แสดงไอดี -->
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="name" value="<?=$_SESSION["name"]?>"  disabled readonly  > <!-- แสดงชื่อ -->
        <label>ระดับชั้น:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="name" value="<?=$_SESSION["vocation"]?>"  disabled readonly  > <!-- แสดงแผนก -->
        <label>ห้อง:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="name" value="<?=$_SESSION["room"]?>"  disabled readonly  > <!-- แสดงห้อง -->
        <label>สาขาวิชา:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="name" value="<?=$_SESSION["major"]?>"  disabled readonly  > <!-- แสดงสาขา -->
        <label>คะแนนคงเหลือ:</label>
        <input class="form-control form-control-lg mb-3  w-100" type="text" name="name" value="<?=$_SESSION["score"]?>/100"  disabled readonly  > <!-- แสดงคะแนน -->
        <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a></li>
    </div>
    <div class="col">
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
                    while($row = mysqli_fetch_array($result)){ //ทำการลูปเพื่อนำข้อมูลใของนักเรียนออกมาแสดง โดยอ้างอิงข้อมูลจากใน session
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
    </div>   
    
    </div>
       
    </div>
</div>   
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>